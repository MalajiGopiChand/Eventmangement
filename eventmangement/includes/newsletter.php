<?php
require_once 'db-config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = sanitize($_POST['email']);
    
    // Validate email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Bad email format, determine redirect based on where form was submitted from
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../index.php';
        header("Location: $referer?newsletter_error=Please enter a valid email address");
        exit;
    }
    
    // Subscribe to newsletter
    $result = subscribeToNewsletter($pdo, $email);
    
    // Determine redirect based on where form was submitted from
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../index.php';
    
    if ($result['success']) {
        // Subscription successful
        header("Location: $referer?newsletter_success=Thank you for subscribing to our newsletter!");
    } else {
        // Subscription failed
        header("Location: $referer?newsletter_error=" . urlencode($result['message']));
    }
    exit;
} else {
    // Not a POST request, redirect to home page
    header('Location: ../index.php');
    exit;
}