<?php

$email_to = "contact@iaihd.org"; 
$email_from = "webmaster@iaihd.org"; 
$email_subject = "New Donation Notification";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    function return_error($error)
    {
        echo json_encode(['success' => 0, 'message' => $error]);
        exit;
    }

    // Required fields
    if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['amount'])) {
        return_error('Please fill in all required fields.');
    }

    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $amount = htmlspecialchars(trim($_POST['amount']), ENT_QUOTES, 'UTF-8');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return_error('Invalid email address.');
    }

    $message = "A donor has submitted their details:\n\n";
    $message .= "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Amount: $amount\n";

    $headers = "From: $email_from\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    if (mail($email_to, $email_subject, $message, $headers)) {
        echo json_encode(['success' => 1, 'message' => 'Donation info submitted.']);
    } else {
        return_error('Email sending failed.');
    }
} else {
    return_error('Invalid request method.');
}
?>
