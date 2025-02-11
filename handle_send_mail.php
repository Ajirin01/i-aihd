<?php

$email_to = "contact@iaihd.org"; 
$email_from = "webmaster@iaihd.org"; 
$email_subject = "Contact Form Submitted";

if(isset($_POST['email']))
{
    function return_error($error)
    {
        echo json_encode(array('success' => 0, 'message' => $error));
        die();
    }

    // Check for required fields
    if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['message'])) {
        return_error('Please fill in all required fields.');
    }

    // Sanitize form input
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return_error('Please enter a valid email address.');
    }

    // Prepare email message
    $email_message = "Form details below.\n\n";
    $email_message .= "Name: ".$name."\n";
    $email_message .= "Email: ".$email."\n";
    $email_message .= "Message: ".$message."\n";

    // Create email headers
    $headers = "From: $email_from\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send email
    if (mail($email_to, $email_subject, $email_message, $headers)) {
        echo json_encode(array('success' => 1, 'message' => 'Form submitted successfully.'));
    } else {
        return_error('An error occurred while sending your message. Please try again later.');
    }
} 
else 
{
    return_error('Invalid form submission.');
}
?>
