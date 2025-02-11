<?php
include_once '../config.php';

// Retrieve the list of publications
$query = "SELECT id, title, photo FROM gallerys";
$result = $db->query($query);