<?php 
    $email = "admin@aihhfoundation.org";
    $password = "1234";

    echo password_hash($password, PASSWORD_BCRYPT);
?>