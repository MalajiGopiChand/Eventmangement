<?php
session_start();
require_once 'db-config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = sanitize($_POST['email']);
    $password = $_POST['password']; // Don't sanitize password before verification
    $remember = isset($_POST['remember']) ? true : false;
    $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : '';
    
    // Validate input
    if (empty($email) || empty($password)) {
        header('Location: ../login.php?error=Please fill in all fields');
        exit;
    }
    
    // Verify login
    $result = verifyLogin($pdo, $email, $password);
    
    if ($result['success']) {
        // Login successful
        $user = $result['user'];
        
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        
        // If remember me is checked, set cookies (30 days)
        if ($remember) {
            $token = bin2hex(random_bytes(32)); // Generate a secure token
            
            // Store token in database
            $stmt = $pdo->prepare("UPDATE users SET remember_token = :token, token_expiry = DATE_ADD(NOW(), INTERVAL 30 DAY) WHERE id = :id");
            $stmt->bindParam(':token', $token, PDO::PARAM_STR);
            $stmt->bindParam(':id', $user['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            // Set cookies
            setcookie('remember_user', $user['id'], time() + (86400 * 30), '/'); // 30 days
            setcookie('remember_token', $token, time() + (86400 * 30), '/'); // 30 days
        }
        
        // Redirect based on role and redirect parameter
        if ($redirect === 'admin' && $user['role'] === 'admin') {
            header('Location: ../admin/index.php');
        } else {
            header('Location: ../dashboard.php');
        }
        exit;
    } else {
        // Login failed
        header('Location: ../login.php?error=' . urlencode($result['message']));
        exit;
    }
} else {
    // Not a POST request, redirect to login page
    header('Location: ../login.php');
    exit;
}