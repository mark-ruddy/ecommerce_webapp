 <?php
  ini_set('display_errors', true);
  error_reporting(E_ALL ^ E_NOTICE);
  // error_reporting(0);
  include('../database.php');
  session_start();

  function array_swap(&$array,$swap_a,$swap_b){
   list($array[$swap_a],$array[$swap_b]) = array($array[$swap_b],$array[$swap_a]);
  }

  // Only create empty $cart_arr if it doesn't exist
  $cart_arr = $_SESSION['cart_arr'];
  if (isset($_SESSION['cart_arr'])) {
    $cart_arr = $_SESSION['cart_arr'];
  } else {
    $cart_arr = array();
  }

  // When "Add to cart" button is pressed
  // Add every items selected quantity and size to $cart_arr with its name,
  // e.g. [['tshirt', 2, 'XL'], ['hat', 5, 'M']]
  // Items with a quantity of 0 won't be added to $cart_arr
  if (isset($_POST['add_to_cart'])) {
    $item_arr = array();
    foreach ($_POST as $name => $value) {
      if ($name != 'add_to_cart') {
        if ($name == "size") {
          array_push($item_arr, $value);
        } else {
          array_push($item_arr, $name, $value);
          array_swap($item_arr, 0, 2);
          array_swap($item_arr, 0, 1);
          array_push($cart_arr, $item_arr);
        }
      }
    }
    // Send user to cart page with $cart_arr stored in $_SESSION
    $_SESSION['cart_arr'] = $cart_arr;
    header("location: ../cart/cart.php");
  }
?>
