<?php
include_once '../config.php';

// Retrieve the list of publications
$query = "SELECT id, title FROM publications";
$result = $db->query($query);