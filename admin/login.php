<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>I-AIHD &mdash; Initiative for the Advancement of Improved Health and Development</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><img src="/images/logo.png" alt="logo" width="100" height="100" style="margin-top: -100px"></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="/admin/login.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <input type="hidden" name="login" value="login">
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>


<?php
  session_start();
  include_once '../config.php';

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
              header('Location: /admin');
              exit;
          } else {
              echo '<script>alert("Invalid password. Please try again.");</script>';
          }
      } else {
          echo '<script>alert("Email not found. Please check your credentials.");</script>';
      }
  }
?>