<?php
include_once '../config.php';

// Check for form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data safely
    $title = $db->real_escape_string($_POST['title']);
    $intro = $db->real_escape_string($_POST['intro']);
    $body = $db->real_escape_string($_POST['body']);

    $publication_dir = '../assets/images/publication/';

    // Ensure an image is uploaded
    if (!empty($_FILES['photo']['name'])) {
        // Generate a unique filename
        $file_name = uniqid() . '-' . basename($_FILES['photo']['name']);
        $target_file = $publication_dir . $file_name;

        // Allowed image formats
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        
        if (in_array($_FILES['photo']['type'], $allowed_types)) {
            // Insert the new publication into the database with timestamps
            $query = "INSERT INTO publications (title, body, intro, photo, created_at, updated_at) 
                      VALUES ('$title', '$body', '$intro', '$file_name', NOW(), NOW())";
            $result = $db->query($query);
        
            if ($result) {
                // Move uploaded file to the publication directory
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                    $success = "Publication successfully created!";
                    header('Location: /admin/publications.php?success=' . urlencode($success));
                    exit;
                } else {
                    echo 'Error uploading image.';
                }
            } else {
                echo 'Error: ' . $db->error;
            }
        } else {
            echo 'Invalid file type. Only JPG, PNG, and GIF are allowed.';
        }
    } else {
        echo 'Please upload an image for the publication.';
    }
}
?>
