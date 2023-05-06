<?php
  // ini_set('display_errors', true);
  // error_reporting(E_ALL ^ E_NOTICE);
  error_reporting(0);
  include('../database.php');

  session_start();
  $error_arr = array();

  if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirm = mysqli_real_escape_string($db, $_POST['confirm']);

    if (empty($username)) {
      array_push($error_arr, "Username not provided");
    }
    if (empty($email)) {
      array_push($error_arr, "Email not provided");
    }
    if (empty($password)) {
      array_push($error_arr, "Password not provided");
    }
    if ($password != $confirm) {
      array_push($error_arr, "The passwords do not match");
    }

    $sql_user = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $sql_query = mysqli_query($db, $sql_user);
    $user = mysqli_fetch_assoc($sql_query);

    if ($user) {
      if ($user['username'] === $username) {
        array_push($error_arr, "Username already exists");
      }
      if ($user['email'] === $email) {
        array_push($error_arr, "Email already exists");
      }
    }

    if (count($error_arr) ==  0) {
      $password = md5($password); // md5 hash the password
      $insert_user = "INSERT INTO users (username, email, password)
                      VALUES('$username', '$email', '$password')";
      mysqli_query($db, $insert_user);
      $_SESSION['username'] = $username;
      header("location: ../home/index.php");
    }
  }
?>
<html>
  <head>
    <title>Register | E-Commerce Clothes</title>
    <!-- Include bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS for all auth pages -->
    <link rel="stylesheet" href="assets/auth_pages.css">
  </head>

  <body class='text-center'>
    <form class='user-input' method='post' action='register.php'>
      <a href="../home/index.php"><img class='mb-4' src='assets/sample_icon.png' alt='tshirt icon' width='256' height='248'></a>
      <!-- <h1 class='h3 mb-3'>Register</h1> -->
      <?php include('errors.php'); ?>

      <input id='usernameEntry' name='username' type='username' class='user-input top-input entry' placeholder='Username' minlength="4" required autofocus>
      <br></br>
      <input id='emailEntry' name='email' type='email' class='user-input entry' placeholder='Email Address' minlength="4" required>
      <br></br>
      <input id='passwordEntry' name='password' type='password' class='user-input entry' placeholder='Password' minlength="4" required>
      <br></br>
      <input id='confirmEntry' name='confirm' type='password' class='user-input confirm entry' placeholder='Confirm Password' minlength="4" required>

      <button class='btn btn-primary btn-lg btn-block' type='submit' name='reg_user'>Register</button>
      <div class='under-text'>
        <p>Already have an account? <a href='login.php'>Login</a></p>
      </div>
    </form>

    <!-- Some javascript to tell user when confirm matches password -->
    <script>
      let password = document.getElementById('passwordEntry');
      let confirm = document.getElementById('confirmEntry');

      function validatePassword() {
        if (password.value != confirm.value) {
          confirm.setCustomValidity('Passwords don\'t match');
        } else {
          confirm.setCustomValidity('');
        }
      }
      password.onchange = validatePassword;
      confirm.onkeyup = validatePassword;
    </script>
  </body>
</html>
