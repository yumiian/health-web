<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-6.9.1/src/Exception.php';
require 'PHPMailer-6.9.1/src/PHPMailer.php';
require 'PHPMailer-6.9.1/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
    $subject = filter_input(INPUT_POST, "subject", FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($name) || empty($email) || empty($phone) || empty($subject) || empty($message)) {
        echo "All fields are required.";
    } else {
        include "database.php";

        $sql = "INSERT INTO contact (name, email, phone, subject, message) VALUES ('$name', '$email', '$phone', '$subject', '$message')";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            die("Could not execute query!");
        } else {
            // Send email
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->SMTPAuth = true;

                $mail->Host = "smtp.elasticemail.com";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // SMTP server info
                $mail->Username = "mmulow6@gmail.com";
                $mail->Password = "F799C1F12C19EB8716F13FA4743C6F206654";

                // Recipients
                $mail->setFrom("mmulow6@gmail.com");
                $mail->addAddress($email);

                // Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = "Name: $name<br>Email: $email<br>Phone: $phone<br>Message: $message";

                $mail->send();

                header("Location: success.php");
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }

        mysqli_close($conn);
    }
}
