<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Validate inputs
    if (empty($name) || empty($email) || empty($message)) {
        die("Please fill all required fields!");
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format!");
    }
    
    // Set recipient email (CHANGE THIS TO YOUR EMAIL)
    $to = "akulbudimir@gmail.com";
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email";
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong.";
    }
    
} else {
    // If not a POST request, redirect
    header("Location: /contact.html");
    exit;
}
?>