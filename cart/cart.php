<?php
  // ini_set('display_errors', true);
  // error_reporting(E_ALL ^ E_NOTICE);
  error_reporting(0);
  include('../database.php');

  session_start();
  // User must be logged in to view cart page
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "from_cart";
    header('location: ../login/login.php');
  }

  $cart_arr = $_SESSION['cart_arr'];

  if (isset($_POST['clear'])) {
    $_SESSION['cart_arr'] = NULL;
    $cart_arr = NULL;
    // Refresh the page to show empty cart
    header("location: cart.php");
  }

  if (!is_null($_SESSION['cart_arr'])) {
    if (isset($_POST['buy'])) {
      foreach ($cart_arr as $item) {
        $item_name = $item[0];
        $item_quantity = $item[1];
        $item_size = $item[2];

        // Decrement item's stock quantity in database by the bought quantity
        $sql_for_item = "UPDATE products
                         SET quantity = quantity - $item_quantity
                         WHERE name = '$item_name'";
        mysqli_query($db, $sql_for_item);
      }

      // Generate unique order no. with date followed by random hash
      // order_no is a string, consists of both letters and numbers
      $day = date("Ymd");
      $random = strtoupper(substr(uniqid(sha1(time())), 0, 6));
      $order_no = $day . $random;
      $_SESSION['order_no'] = $order_no;

      // Add order details to orders database
      $cart_arr_serial = serialize($cart_arr);
      $sql_for_order = "INSERT INTO orders (order_no, items)
                        VALUES('$order_no', '$cart_arr_serial')";
      mysqli_query($db, $sql_for_order);

      // Items have been bought and database updated, clearing cart
      $cart_arr = NULL;
      $_SESSION['cart_arr'] = NULL;

      // Direct user to successful purchase page
      header("location: successful_order.php");
    }
  }
?>

<html>
<head>
  <title>Cart | Clothing Store</title>
  <?php include('../head.php'); ?>
</head>

<body>
  <?php include('../header.php'); ?>
  <div class="container">
    <?php if(!is_null($cart_arr)) : ?>
      <table class="table">
        <thead>
          <tr>
            <th scope='col'>Name</th>
            <th scope='col'>Size</th>
            <th scope='col'>Quantity</th>
          </tr> 
        </thead>
        <tbody>
      <?php foreach($cart_arr as $item) : ?>
          <tr>
            <td><?php echo $item[0] ?></td>
            <td><?php echo $item[2]?></td>
            <td><?php echo $item[1] ?></td>
          </tr>
      <?php endforeach ?>
        </tbody>
      </table>
      <div class='btn-group pull-right'> 
        <form method='post' action='cart.php'>
          <button class='btn btn-primary btn-lg' type='submit' name='clear'>Clear Cart</button>
          <button class='btn btn-primary btn-lg' type='submit' name='buy'>Buy</button>
        </form>
      </div>
    <?php else : ?>
      <h3>Your cart is empty, visit <a href='../product/mens-clothing.php'>Men's Clothing</a> or <a href='../product/womens-clothing.php'>Women's Clothing</a> to add some items</h3>
    <?php endif ?>
  </div>

    <!-- temporary breaks to force footer to bottom
         will be removed when content added -->
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <?php include('../footer.php'); ?>
</body>
</html>
