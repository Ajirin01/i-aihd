<?php

// Connect to the database
include_once '../config.php';

// Get the gallery ID from the URL
$id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? (int)$_GET['id'] : 0;

// Delete the gallery from the database
$query = "DELETE FROM gallerys WHERE id=$id";
$result = $db->query($query);

if ($result) {
  // Gallery deleted successfully
  echo json_encode(['status'=> 'okay']);
} else {
  // Error deleting gallery
  echo 'Error: ' . $db->error;
}

?>