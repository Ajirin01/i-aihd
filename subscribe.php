<?php
include_once 'config.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email address.']);
        exit;
    }

    // Check if email already exists
    $stmt = $db->prepare("SELECT id FROM subscribers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email already subscribed.']);
        exit;
    }

    // Insert email into the database
    $stmt = $db->prepare("INSERT INTO subscribers (email) VALUES (?)");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Subscription successful!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Subscription failed. Try again.']);
    }
}
?>
