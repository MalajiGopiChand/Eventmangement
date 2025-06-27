x<?php
// Database configuration
$host = "localhost"; // Database host
$dbname = "event_management"; // Database name
$username = "root"; // Database username
$password = ""; // Database password

// Create connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Set default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    // For production, you would want to log this instead of displaying it
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Function to sanitize user input
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to get event by ID
function getEventById($pdo, $eventId) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM events WHERE id = :id");
        $stmt->bindParam(':id', $eventId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    } catch(PDOException $e) {
        // Log the error and return false
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

// Function to get all events
function getAllEvents($pdo, $limit = null, $offset = 0, $category = null, $search = null) {
    try {
        $query = "SELECT * FROM events WHERE 1=1";
        $params = [];
        
        if ($category) {
            $query .= " AND category = :category";
            $params[':category'] = $category;
        }
        
        if ($search) {
            $query .= " AND (title LIKE :search OR description LIKE :search)";
            $params[':search'] = "%$search%";
        }
        
        $query .= " ORDER BY date DESC";
        
        if ($limit) {
            $query .= " LIMIT :limit OFFSET :offset";
            $params[':limit'] = $limit;
            $params[':offset'] = $offset;
        }
        
        $stmt = $pdo->prepare($query);
        
        // Bind parameters
        foreach ($params as $key => $value) {
            if ($key == ':limit' || $key == ':offset') {
                $stmt->bindValue($key, $value, PDO::PARAM_INT);
            } else {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }
        }
        
        $stmt->execute();
        return $stmt->fetchAll();
    } catch(PDOException $e) {
        // Log the error and return an empty array
        error_log("Database error: " . $e->getMessage());
        return [];
    }
}

// Function to create a new user
function createUser($pdo, $name, $email, $password, $role = 'user') {
    try {
        // Check if user with this email already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            return ['success' => false, 'message' => 'Email already in use'];
        }
        
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert the new user
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role, created_at) VALUES (:name, :email, :password, :role, NOW())");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->execute();
        
        return ['success' => true, 'user_id' => $pdo->lastInsertId()];
    } catch(PDOException $e) {
        // Log the error and return false
        error_log("Database error: " . $e->getMessage());
        return ['success' => false, 'message' => 'Database error occurred'];
    }
}

// Function to verify user login
function verifyLogin($pdo, $email, $password) {
    try {
        $stmt = $pdo->prepare("SELECT id, name, email, password, role FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            
            if (password_verify($password, $user['password'])) {
                // Password is correct, return user info without the password
                unset($user['password']);
                return ['success' => true, 'user' => $user];
            }
        }
        
        return ['success' => false, 'message' => 'Invalid email or password'];
    } catch(PDOException $e) {
        // Log the error and return false
        error_log("Database error: " . $e->getMessage());
        return ['success' => false, 'message' => 'Database error occurred'];
    }
}

// Function to register for an event
function registerForEvent($pdo, $userId, $eventId, $ticketType, $quantity, $specialRequests = '') {
    try {
        $stmt = $pdo->prepare("INSERT INTO registrations (user_id, event_id, ticket_type, quantity, special_requests, registration_date, status) 
                              VALUES (:user_id, :event_id, :ticket_type, :quantity, :special_requests, NOW(), 'confirmed')");
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':event_id', $eventId, PDO::PARAM_INT);
        $stmt->bindParam(':ticket_type', $ticketType, PDO::PARAM_STR);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':special_requests', $specialRequests, PDO::PARAM_STR);
        $stmt->execute();
        
        return ['success' => true, 'registration_id' => $pdo->lastInsertId()];
    } catch(PDOException $e) {
        // Log the error and return false
        error_log("Database error: " . $e->getMessage());
        return ['success' => false, 'message' => 'Database error occurred'];
    }
}

// Function to create a new event
function createEvent($pdo, $title, $description, $date, $location, $category, $image, $organizer_id) {
    try {
        $stmt = $pdo->prepare("INSERT INTO events (title, description, date, location, category, image, organizer_id, created_at, status) 
                              VALUES (:title, :description, :date, :location, :category, :image, :organizer_id, NOW(), 'active')");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':location', $location, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->bindParam(':organizer_id', $organizer_id, PDO::PARAM_INT);
        $stmt->execute();
        
        return ['success' => true, 'event_id' => $pdo->lastInsertId()];
    } catch(PDOException $e) {
        // Log the error and return false
        error_log("Database error: " . $e->getMessage());
        return ['success' => false, 'message' => 'Database error occurred'];
    }
}

// Function to update an event
function updateEvent($pdo, $eventId, $title, $description, $date, $location, $category, $image = null, $status = 'active') {
    try {
        if ($image) {
            $stmt = $pdo->prepare("UPDATE events SET title = :title, description = :description, date = :date, 
                                  location = :location, category = :category, image = :image, status = :status 
                                  WHERE id = :id");
            $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        } else {
            $stmt = $pdo->prepare("UPDATE events SET title = :title, description = :description, date = :date, 
                                  location = :location, category = :category, status = :status 
                                  WHERE id = :id");
        }
        
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':location', $location, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':id', $eventId, PDO::PARAM_INT);
        $stmt->execute();
        
        return ['success' => true];
    } catch(PDOException $e) {
        // Log the error and return false
        error_log("Database error: " . $e->getMessage());
        return ['success' => false, 'message' => 'Database error occurred'];
    }
}

// Function to delete an event
function deleteEvent($pdo, $eventId) {
    try {
        $stmt = $pdo->prepare("DELETE FROM events WHERE id = :id");
        $stmt->bindParam(':id', $eventId, PDO::PARAM_INT);
        $stmt->execute();
        
        return ['success' => true];
    } catch(PDOException $e) {
        // Log the error and return false
        error_log("Database error: " . $e->getMessage());
        return ['success' => false, 'message' => 'Database error occurred'];
    }
}

// Function to process contact form submission
function submitContactForm($pdo, $name, $email, $subject, $message) {
    try {
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message, submission_date, status) 
                              VALUES (:name, :email, :subject, :message, NOW(), 'unread')");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->execute();
        
        return ['success' => true, 'message_id' => $pdo->lastInsertId()];
    } catch(PDOException $e) {
        // Log the error and return false
        error_log("Database error: " . $e->getMessage());
        return ['success' => false, 'message' => 'Database error occurred'];
    }
}

// Function to subscribe to newsletter
function subscribeToNewsletter($pdo, $email) {
    try {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM newsletter_subscribers WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            return ['success' => false, 'message' => 'Email already subscribed'];
        }
        
        // Add new subscriber
        $stmt = $pdo->prepare("INSERT INTO newsletter_subscribers (email, subscribed_at) VALUES (:email, NOW())");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        return ['success' => true];
    } catch(PDOException $e) {
        // Log the error and return false
        error_log("Database error: " . $e->getMessage());
        return ['success' => false, 'message' => 'Database error occurred'];
    }
}