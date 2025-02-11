<?php
// Connect to the database
include_once '../config.php';

// Retrieve the publication data from the database
$query = "SELECT * FROM gallerys WHERE id=$id";
$result = $db->query($query);
$gallery = $result->fetch_assoc();