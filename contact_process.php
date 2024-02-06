<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Set recipient email address
    $to = "sajibchakrobarty92@gmail.com"; // Replace with your email address

    // Set email headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";

    // Compose email message
    $email_message = "
        <html>
        <body>
            <h2>New Contact Form Submission</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong> $message</p>
        </body>
        </html>
    ";

    // Send email
    $mail_success = mail($to, $subject, $email_message, $headers);

    if ($mail_success) {
        echo "Thank you for contacting us! Your message has been sent.";
    } else {
        echo "Error: Unable to send the email. Please try again later.";
    }
} else {
    // If the form is not submitted via POST method, redirect to the form page
    header("contact.html"); // Replace with the actual form page URL
    exit();
}
?>
