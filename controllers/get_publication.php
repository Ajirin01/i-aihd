<?php
// Connect to the database
include_once '../config.php';

// Retrieve the publication data from the database
$query = "SELECT * FROM publications WHERE id=$id";
$result = $db->query($query);
$publication = $result->fetch_assoc();