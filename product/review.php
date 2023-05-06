<?php
  ini_set('display_errors', true);
  error_reporting(E_ALL ^ E_NOTICE);
  // error_reporting(0);
  include('../database.php');
  session_start();

  // Users must be logged in to add reviews to items
  // This prevents duplicate reviews from anonymous users
  // This allows us to display that users review when they re-visit
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "from_review";
    header('location: ../login/login.php');
  }

  $username = $_SESSION['username'];
  $item_name = $_POST['item_name'];
  $review = $_POST['review'];

  // Check if user has already placed a review for this item
  $review_exist_query = "SELECT COUNT(*) AS amount FROM reviews WHERE item_name = '$item_name' and user = '$username'";

  $result = mysqli_query($db, $review_exist_query);
  $review_exist_arr = mysqli_fetch_array($result);
  $review_amount = $review_exist_arr['amount'];

  // if 0 the user has not yet placed a review for this item
  // so we create a new row in the "reviews" table
  if ($review_amount == 0 && $item_name != "") {
    $insert_review = "INSERT INTO reviews(item_name, user, value)
                      VALUES ('$item_name', '$username', $review)";
    mysqli_query($db, $insert_review);
  } else if ($item_name != "") {
    // User already has a review in database for item
    // Update it with the new review
    $update_review_query = "UPDATE reviews SET value = $review WHERE item_name = '$item_name' and user = '$username'";
    mysqli_query($db, $update_review_query);
  }

  // average review number from database
  $average_query = "SELECT ROUND(AVG(value),1) as average FROM reviews WHERE item_name = '$item_name'";
  $average_result = mysqli_query($db, $average_query) or die(mysqli_error($db));
  $average_arr = mysqli_fetch_array($average_result);
  $average_review = $average_arr['average'];
  $final_arr = array("average_review" => $average_review);

  // Send result back to Ajax call
  echo json_encode($final_arr);
?>
