<?php
// Connect to the database
include_once '../config.php';

// Check for form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $id = $db->real_escape_string($_POST['id']);
    $title = $db->real_escape_string($_POST['title']);
    $intro = $db->real_escape_string($_POST['intro']);
    $body = $db->real_escape_string($_POST['body']);

    $publication_dir = '../assets/images/publication/';

    // Check if a new image is uploaded
    if (!empty($_FILES['photo']['name'])) {
        // Generate a unique file name
        $file_name = uniqid() . '-' . basename($_FILES['photo']['name']);
        $target_file = $publication_dir . $file_name;

        // Allowed image formats
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        
        if (in_array($_FILES['photo']['type'], $allowed_types)) {
            // Update publication with new image
            $query = "UPDATE publications SET title='$title', intro='$intro', body='$body', photo='$file_name', updated_at=NOW() WHERE id=$id";
            $result = $db->query($query);

            if ($result) {
                // Move the uploaded file to the publications directory
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                    $success = "Publication successfully updated!";
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
        // Update publication without changing the image
        $query = "UPDATE publications SET title='$title', intro='$intro', body='$body', updated_at=NOW() WHERE id=$id";
        $result = $db->query($query);

        if ($result) {
            $success = "Publication successfully updated!";
            header('Location: /admin/publications.php?success=' . urlencode($success));
            exit;
        } else {
            echo 'Error: ' . $db->error;
        }
    }
}
?>
