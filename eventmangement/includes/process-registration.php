<?php
session_start();
require_once 'db-config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = sanitize($_POST['firstName']);
    $lastName = sanitize($_POST['lastName']);
    $email = sanitize($_POST['email']);
    $phone = isset($_POST['phone']) ? sanitize($_POST['phone']) : '';
    $eventId = isset($_POST['event_id']) ? (int)$_POST['event_id'] : 0;
    $ticketType = sanitize($_POST['ticketType']);
    $quantity = (int)$_POST['quantity'];
    $specialRequests = isset($_POST['specialRequests']) ? sanitize($_POST['specialRequests']) : '';
    
    // Check if terms were accepted
    if (!isset($_POST['terms'])) {
        header('Location: ../register.php?event_id=' . $eventId . '&error=You must agree to the terms and conditions');
        exit;
    }
    
    // Validate required fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($ticketType) || $quantity <= 0 || $eventId <= 0) {
        header('Location: ../register.php?event_id=' . $eventId . '&error=Please fill in all required fields');
        exit;
    }
    
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        // User is not logged in, store registration data in session and redirect to login/signup
        $_SESSION['registration_data'] = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'phone' => $phone,
            'eventId' => $eventId,
            'ticketType' => $ticketType,
            'quantity' => $quantity,
            'specialRequests' => $specialRequests
        ];
        
        header('Location: ../login.php?redirect=registration');
        exit;
    }
    
    // User is logged in, proceed with registration
    $userId = $_SESSION['user_id'];
    
    // Register for the event
    $result = registerForEvent($pdo, $userId, $eventId, $ticketType, $quantity, $specialRequests);
    
    if ($result['success']) {
        // Registration successful
        header('Location: ../registration-confirmation.php?id=' . $result['registration_id']);
        exit;
    } else {
        // Registration failed
        header('Location: ../register.php?event_id=' . $eventId . '&error=' . urlencode($result['message']));
        exit;
    }
} else {
    // Not a POST request, redirect to events page
    header('Location: ../events.php');
    exit;
}