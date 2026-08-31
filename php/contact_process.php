<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Get form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

if (empty($name) || empty($email) || empty($message)) {
    die("Please fill in all fields.");
}

$mail = new PHPMailer(true);

try {
    // SMTP settings for Gmail
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    
    // 👉 ENTER YOUR GMAIL HERE
    $mail->Username   = 'yourgmail@gmail.com';  // your Gmail
    $mail->Password   = 'your_app_password';    // Gmail App Password (see below)
    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Email details
    $mail->setFrom($email, $name);
    $mail->addAddress('yourgmail@gmail.com', 'AsadiTech Website'); // where you receive the messages

    $mail->isHTML(true);
    $mail->Subject = 'New Contact Message from ' . $name;
    $mail->Body    = "<strong>Name:</strong> $name <br>
                      <strong>Email:</strong> $email <br>
                      <strong>Message:</strong><br>$message";

    $mail->send();
    echo "✅ Message sent successfully!";
} catch (Exception $e) {
    echo "❌ Message could not be sent. Error: {$mail->ErrorInfo}";
}
?>
