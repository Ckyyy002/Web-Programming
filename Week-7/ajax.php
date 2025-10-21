<?php
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {

    // Sanitize inputs
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = nl2br(htmlspecialchars(trim($_POST['message'])));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<span style='color:red; font-weight:bold;'>Invalid email address format.</span>";
        exit;
    }

    // Email details
    $to      = "lucky.h.p.936@gmail.com"; 
    $subject = "New Contact Form Message from $name";
    
    $body = "
        <html>
        <body style='font-family: Arial, sans-serif;'>
            <h3>New message received</h3>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        </body>
        </html>
    ";

    // Set headers
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: {$name} <{$email}>" . "\r\n";
    $headers .= "Reply-To: {$email}" . "\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<span style='color:green; font-weight:bold;'>
        Thank you for contacting us, we will get back to you shortly.
        </span>";
    } else {
        echo "<span style='color:red; font-weight:bold;'>
        Sorry! Your form submission failed. Please try again later.
        </span>";
    }

} else {
    echo "<span style='color:red; font-weight:bold;'>
    Please fill in all required fields.
    </span>";
}
?>
