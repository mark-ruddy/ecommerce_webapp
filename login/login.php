<?php
  // Uncomment to see PHP errors in browser
  // ini_set('display_errors', true);
  // error_reporting(E_ALL ^ E_NOTICE);
  error_reporting(0);
  include('../database.php');
  session_start();

  $error_arr = array();

  // If user is still logged in and goes back to login page
  // send them to the logged in screen
  if (isset($_SESSION['username'])) {
    header("location: ../home/index.php");
  }

  if ($_SESSION['msg'] == 'from_cart') {
    array_push($error_arr, "Please log in to view your cart");
    $_SESSION['msg'] = 'to_cart';
  } else if ($_SESSION['msg'] == 'from_review') {
    array_push($error_arr, "Please log in to place reviews");
    $_SESSION['msg'] = 'to_product';
  } else if ($_SESSION['msg'] == 'from_misc') {
    array_push($error_arr, "Please log in to view that page");
    $_SESSION['msg'] = '';
  }

  if (isset($_POST['login_user'])) {
    // POST form sent from user
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $remember = isset($_POST['remember']);

    if (empty($username)) {
      array_push($error_arr, "Username not provided");
    }
    if (empty($password)) {
      array_push($error_arr, "Password not provided");
    }

    if (count($error_arr) == 0) {
      $password = md5($password); // Passwords in DB are md5 hashed

      $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
      $result_query = mysqli_query($db, $sql);

      // If user row exists with that username and password
      if (mysqli_num_rows($result_query) == 1) {
        $_SESSION['username'] = $username;

        // if remember me checkbox checked, save session cookie for 5 days
        if ($remember) {
          $param = session_get_cookie_params();
          setcookie(session_name(), $_COOKIE[session_name()], time() + 60*60*24*5,
                    $param['path'], $param['domain'], $param['secure'], $param['httponly']);
        }
        if ($_SESSION['msg'] == 'to_cart') {
          // If user was sent to login from cart, send them back to cart
          $_SESSION['msg'] = '';
          header("location: ../cart/cart.php");
        } else if ($_SESSION['msg'] == 'to_product') {
          // If unauthenticated user tried to place a review on products page
          // send them back to products page
          $_SESSION['msg'] = '';
          header("location: ../product/mens-clothing.php");
        } else {
          // clear msg to avoid the same message appearing multiple times
          $_SESSION['msg'] = '';
          header("location: ../home/index.php");
        }
      } else {
        array_push($error_arr, "Incorrect username or password");
      }
    }
  }
?>

<html>
  <head>
    <title>Login | E-commerce Clothes</title>
    <!-- Include bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS for all auth pages -->
    <link rel="stylesheet" href="assets/auth_pages.css">
  </head>

  <body class='text-center'>
    <form class='user-input' method='post' action='login.php'>
      <a href="../home/index.php"><img class='mb-4'  src='assets/sample_icon.png' alt='tshirt icon' width='256' height='248'></a>
      <!-- <h1 class='h3 mb-3'>Login</h1> -->
      <?php include('errors.php'); ?>

      <input id='usernameEntry' name='username' type='text' class='user-input top-input entry' style="margin-top: 0px;" placeholder='Username' required autofocus>
      <br></br>
      <input id='passwordEntry' name='password' type='password' class='user-input confirm entry' placeholder='Password' required>

      <div class='mb-3'>
        <label id='remember-label'>
          <input type='checkbox' id='remember-checkbox' name='remember'>
          Remember me
        </label>
      </div>

      <button class='btn btn-primary btn-lg btn-block' type='submit' name='login_user'>Login</button>
      <div class='under-text'>
        <p>Don't have an account? <a href='register.php'>Register</a></p>
      </div>
    </form>
  </body>
</html>
