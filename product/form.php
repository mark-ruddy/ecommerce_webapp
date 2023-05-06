<?php
  $products_query = "SELECT * FROM products WHERE name = '$item_name'";
  $result = mysqli_query($db, $products_query) or die(mysqli_error($db));
  // While loop through every occurence of this product in "products" table
  $item = mysqli_fetch_array($result);
  $item_name = $item['name'];
  $item_quantity = $item['quantity'];

  // Get the average rating from all reviews of item
  $average_query = "SELECT ROUND(AVG(value), 1) AS average FROM reviews WHERE item_name = '$item_name'";
  // Some items may not have reviews yet, so an average doesn't exist,
  // in this case skip the mysql error with die(mysqli_error())
  $average_result = mysqli_query($db, $average_query) or die(mysqli_error($db));
  $average_arr = mysqli_fetch_array($average_result);
  $average_review = $average_arr['average'];

  if ($average_review <= 0) {
    $average_review = "No reviews yet";
  } else {
    $amount_query = "SELECT COUNT(*) AS amount_reviews FROM reviews WHERE item_name='$item_name'";
    $amount_result = mysqli_query($db, $amount_query) or die(mysqli_error($db));
    $amount_arr = mysqli_fetch_array($amount_result);
    $amount_reviews = $amount_arr['amount_reviews'];
    if ($amount_reviews <= 0) {
      $amount_reviews = 0;
    }
  }

  // Declare review outside if-statement scope
  $review = 0;
  // If Logged in display the review stars that user set
  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $reviews_query = "SELECT * FROM reviews WHERE item_name = '$item_name' and user = '$username'";
    // Attempt to find user rating from db, if not found skip mysql error
    $user_review = mysqli_query($db, $reviews_query) or die(mysqli_error($db));
    $user_review_arr = mysqli_fetch_array($user_review);
    $review = $user_review_arr['value'];
  }
?>
