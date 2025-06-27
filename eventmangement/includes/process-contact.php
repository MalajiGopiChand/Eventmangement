<?php
require_once 'db-config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $subject = sanitize($_POST['subject']);
    $message = sanitize($_POST['message']);
    
    // Check if privacy policy was accepted
    if (!isset($_POST['privacy'])) {
        header('Location: ../contact.php?error=You must agree to the privacy policy');
        exit;
    }
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        header('Location: ../contact.php?error=Please fill in all required fields');
        exit;
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../contact.php?error=Please enter a valid email address');
        exit;
    }
    
    // Submit contact form
    $result = submitContactForm($pdo, $name, $email, $subject, $message);
    
    if ($result['success']) {
        // Submission successful
        
        // Send notification email to admin (in a real application)
        // mail('admin@example.com', 'New Contact Form Submission', "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message");
        
        // Redirect to thank you page
        header('Location: ../contact-thankyou.php');
        exit;
    } else {
        // Submission failed
        header('Location: ../contact.php?error=' . urlencode($result['message']));
        exit;
    }
} else {
    // Not a POST request, redirect to contact page
    header('Location: ../contact.php');
    exit;
}