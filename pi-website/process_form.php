<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $to = "info@financialgroup.com"; // Replace with your email address
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    $email_body = "You have received a new message from your website contact form.\n\n" .
        "Name: $name\n" .
        "Email: $email\n" .
        "Subject: $subject\n" .
        "Message:\n$message";

    if (mail($to, $subject, $email_body, $headers)) {
        echo "Thank you for your message. We will get back to you soon.";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    echo "There was a problem with your submission, please try again.";
}

