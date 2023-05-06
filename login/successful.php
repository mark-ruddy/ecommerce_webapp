<?php
  // ini_set('display_errors', true);
  // error_reporting(E_ALL ^ E_NOTICE);
  session_start();

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You are not logged in";
    header('location: login.php');
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: ../home/index.php');
  }
?>
<html>
  <head>
    <title>Successful Login</title>
    <!-- Include bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS for all auth pages -->
    <link rel="stylesheet" href="assets/auth_pages.css">
  </head>

  <body class='text-center'>
    <div class='user-input'>
      <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
      <h2><a href="successful.php?logout='1'">logout</a></h2>
    </form>
  </body>
</html>
