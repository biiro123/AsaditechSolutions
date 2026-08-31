<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "biiroasadi804@gmail.com";  // Your Gmail address
    $subject = "New Message from AsadiTech Website";
    $body = "You have received a new message:\n\n" .
            "Name: $name\n" .
            "Email: $email\n" .
            "Message:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<h2 style='color: green; text-align:center;'>Message sent successfully! Thank you, $name.</h2>";
    } else {
        echo "<h2 style='color: red; text-align:center;'>Sorry, something went wrong. Please try again.</h2>";
    }
}
?>
