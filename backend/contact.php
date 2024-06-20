<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    // Validate input
    if (!empty($name) && !empty($email) && !empty($message)) {
        $to = 'rgahlot_be22@thapar.edu.com'; // Change to the recipient's email address
        $headers = 'From: ' . $email . "\r\n" .
                   'Reply-To: ' . $email . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();
        
        $fullMessage = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        // Send email
        if (mail($to, $subject, $fullMessage, $headers)) {
            echo 'Email sent successfully!';
        } else {
            echo 'Failed to send email.';
        }
    } else {
        echo 'Please fill in all required fields.';
    }
}
?>
