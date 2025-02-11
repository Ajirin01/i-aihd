<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Ensure PHPMailer is installed via Composer
include_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Fetch subscribers
    $query = "SELECT email FROM subscribers";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        $mail = new PHPMailer(true);

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host       = 'mail.ajirinibi.com.ng'; // Replace with SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'sin2@+cos2@1'; // Replace with your email
            $mail->Password   = 'info@ajirinibi.com.ng'; // Replace with your email password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 465;

            // Sender details
            $mail->setFrom('isholaajirin01@gmail.com', 'I-AIHD Newsletters');

            // Add recipients
            while ($row = $result->fetch_assoc()) {
                $mail->addBCC($row['email']); // Send individually to avoid exposing emails
            }

            // Email content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = nl2br($message);

            // print_r($mail);
            // exit;

            // Send email
            if ($mail->send()) {
                echo "<script>alert('Newsletter sent successfully!'); window.location.href='newsletter.php';</script>";
            } else {
                echo "<script>alert('Failed to send newsletter!'); window.location.href='newsletter.php';</script>";
            }

        } catch (Exception $e) {
            echo "<script>alert('Mailer Error: {$mail->ErrorInfo}'); window.location.href='newsletter.php';</script>";
        }
    } else {
        echo "<script>alert('No subscribers found!'); window.location.href='newsletter.php';</script>";
    }
}
?>
