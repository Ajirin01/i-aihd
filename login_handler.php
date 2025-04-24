<?php
  session_start();
  include_once 'config.php';

  // echo password_hash("admin1234", PASSWORD_BCRYPT);

  if (isset($_POST['login'])) {
      $email = $db->real_escape_string($_POST['email']);
      $password = $db->real_escape_string($_POST['password']);

      // Query the database for the user
      $query = "SELECT * FROM accounts WHERE email='$email'";
      $result = $db->query($query);

      // Check if the query was successful and returned a row
      if ($result && $result->num_rows > 0) {
          $user = $result->fetch_assoc();

          // Verify the password
          if (password_verify($password, $user['password'])) {
              $_SESSION['user'] = json_encode($user);
              header('Location: /');
              exit;
          } else {
              echo '<script>alert("Invalid password. Please try again.");</script>';
              header('Location: /login');
              exit;
          }
      } else {
          echo '<script>alert("Email not found. Please check your credentials.");</script>';
          header('Location: /login');
            exit;
      }
  }
?>