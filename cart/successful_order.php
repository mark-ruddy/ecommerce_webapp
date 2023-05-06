<?php
  // ini_set('display_errors', true);
  // error_reporting(E_ALL ^ E_NOTICE);
  error_reporting(0);
  include('../database.php');

  // User must be logged in to view successful order page
  session_start();
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "from_misc";
    header('location: ../login/login.php');
  }

  $username = $_SESSION['username'];
  $sql_to_get_email = "SELECT * FROM users WHERE username = '$username'";
  $sql_query = mysqli_query($db, $sql_to_get_email);
  $user = mysqli_fetch_assoc($sql_query);
  $email = $user['email'];

  // Create email message
  $subject = "Clothing Store Order No. " . $_SESSION['order_no'];
  $text = "Hi " . $_SESSION['username'] . " we've received and confirmed your Order No. " . $_SESSION['order_no'] . "\nBest Regards,\nClothing Store";
  $headers = "From: test@gmail.com";

  // Mail won't work without a mailing webserver, can implement this on AWS
  // For now just leaving commented out
  // mail($email, $subject, $text, $headers);
?>

<html>
  <head>
    <title>Successful Order</title>
    <?php include('../head.php'); ?>
  </head>
  <body>
    <?php include('../header.php'); ?>

    <div class='container'>
      <h3>Thank you for shopping at Clothing Store!</h3>
      <h3>Your order No. <?php echo $_SESSION['order_no'] ?> has been received.</h3>
      <h3>We've sent a confirmation email to <?php echo $email ?>.</h3>
    </div>
    <!-- temporary breaks to force footer to bottom
         will be removed when content added -->
    <br><br><br><br><br><br><br><br><br><br><br><br><br>

    <?php include('../footer.php'); ?>
  </body>
</html>
