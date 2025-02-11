<?php

// Connect to the database
include_once '../config.php';

// Get the publication ID from the URL
$id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? (int)$_GET['id'] : 0;

// Delete the publication from the database
$query = "DELETE FROM publications WHERE id=$id";
$result = $db->query($query);

if ($result) {
  // Publication deleted successfully
  echo json_encode(['status'=> 'okay']);
} else {
  // Error deleting publication
  echo 'Error: ' . $db->error;
}

?>