<?php
session_start();
include_once 'config.php';

if (isset($_POST['register'])) {
    // Get user inputs and sanitize them
    $name = trim($db->real_escape_string($_POST['name']));
    $email = trim($db->real_escape_string($_POST['email']));
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Check for empty fields
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        echo '<script>alert("All fields are required."); window.location.href="/register.php";</script>';
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email format."); window.location.href="/register.php";</script>';
        exit;
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo '<script>alert("Passwords do not match."); window.location.href="/register.php";</script>';
        exit;
    }

    // Check if email already exists
    $check_email_query = "SELECT id FROM accounts WHERE email = ?";
    $stmt = $db->prepare($check_email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo '<script>alert("Email is already registered. Please log in."); window.location.href="/login.php";</script>';
        exit;
    }
    $stmt->close();

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert new user into the database
    $insert_query = "INSERT INTO accounts (name, email, password) VALUES (?, ?, ?)";
    $stmt = $db->prepare($insert_query);
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        echo '<script>alert("Registration successful. Please log in."); window.location.href="/login.php";</script>';
        exit;
    } else {
        echo '<script>alert("An error occurred. Please try again."); window.location.href="/register.php";</script>';
        exit;
    }

    $stmt->close();
}
?>
