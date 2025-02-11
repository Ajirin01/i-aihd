<?php
include_once '../config.php';
// Check for form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Set the upload directory and allowed file types
    $gallery_dir = '../assets/images/gallery/';
    $gallery_thumbnail_dir = '../assets/images/gallery/thumb/';

    $title = $_POST['title'];

    $allowed_types = array('image/jpeg', 'image/png', 'image/gif');

    // Check if the file has been uploaded
    if (isset($_FILES['photo']['name']) && in_array($_FILES['photo']['type'], $allowed_types)) {
        // Generate a new file name
        $file_name = uniqid() . '-' . $_FILES['photo']['name'];

        // get and upload base64 thumbnail
        $data = base64_decode(explode(',',$_POST['thumbnail'])[1]);

        // Insert the new gallery into the database
        $query = "INSERT INTO gallerys (title, photo) VALUES ('$title', '$file_name')";
        $result = $db->query($query);
    
        if ($result) {
            //   Gallerys added successfully
            //   Upload thumbnail and gallery to folders then Redirect to the Gallerys list page

            // move thumbnail to folder
            file_put_contents($gallery_thumbnail_dir. $file_name, $data);

            // Move the uploaded file to the gallery directory
            move_uploaded_file($_FILES['photo']['tmp_name'], $gallery_dir . $file_name);

            $success = "Gallery successfully created!";
            echo $success;
            // header('Location: /admin/gallerys.php?success='.$success);
            // header('Location: /partial_templates/admin/gallerys.php?success='.$success);
            exit;
        } else {
          // Error adding gallery
          echo 'Error: ' . $db->error;
        }
    }
}