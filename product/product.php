<!--
  Add jQuery front-end review stars, requires 1.12.0 jquery
  From https://github.com/antennaio/jquery-bar-rating
  Requires font-awesome for the stars
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link href='assets/jquery-bar-rating/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
<script src='assets/jquery-bar-rating/dist/jquery.barrating.min.js' type='text/javascript'></script>
<link href='assets/product.css' type='text/css'>

<?php
  // ini_set('display_errors', true);
  // error_reporting(E_ALL ^ E_NOTICE);
  error_reporting(0);
  include('../database.php');
  session_start();

  /*
   * Users should be able to browser products without being logged in
   *
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You are not logged in";
    header('location: ../login/login.php');
  }
  */
?>

<html>
  <head>
    <title>Products</title>
    <?php include('../head.php'); ?>
  </head>
  <body>
    <?php include('../header.php'); ?>

    <?php
      $products_query = "SELECT * FROM products";
      $result = mysqli_query($db, $products_query);
      // While loop through every product in "products" table
      while ($item = mysqli_fetch_array($result)) {
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
      // While loop for each product CONTINUES
    ?>
      <div class='product_block container'>
        <h2><?php echo $item_name ?></h2>
        <div class='product-text'>
          <?php if ($item_quantity > 0) : ?>
            <p style='color: green'>In Stock</p>
            <p><?php echo $item_quantity ?> Available</p>
          <?php else : ?>
            <p style="color: red;">Out of Stock</p>
          <?php endif ?>
        </div>
        <div>
          <select class='review' id='review_<?php echo $item_name; ?>' data-id='review_<?php echo $item_name; ?>'>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
          </select>
          <p><b>Average Review: </b><span id='avg_review_<?php echo $item_name; ?>'><?php echo $average_review; ?></span></p>
          <form method='post' action='add_to_cart.php'>
            <input type='number' name='<?php echo $item_name ?>' min='1' max='<?php echo $item_quantity ?>'>
            <button class='btn btn-primary btn-lg' type='submit' name='add_to_cart'>Add to cart</button>
          </form>
        </div>
      </div>
      <!-- jQuery Ajax to set rating -->
      <script type='text/javascript'>
        // If user has a review for item assign it to value, if not assign 1
        var value = <?php if (isset($review)) : ?><?php echo $review ?><?php else : ?><?php echo 1 ?><?php endif ?>;
        var item_name = '<?php echo $item_name ?>';
        // Users specific rating is now applied to the stars
        $('#review_'+item_name).val(value);
        $(document).ready(function() {
          $('#review_<?php echo $item_name; ?>').barrating('set', value);
        });
      </script>
    <?php
      // While loop for each product ENDS
      }
      // If unauthenticated user is sent to login page now
      // it must be from attempting to place a review
      $_SESSION['msg'] = 'from_review';
    ?>

    <!--
      JS script to send the updated star rating selection to review.php
      review.php will then add the review to the database
      (Script must be placed in php file to access $_SESSION, otherwise would've placed in separate .js file)
    -->
    <script type='text/javascript'>
      $(function() {
        // .review here references the CSS class of the star ratings selector
        $('.review').barrating({
          theme: 'fontawesome-stars',
          onSelect: function(value, text, event) {
            var data_id = this.$elem.data('id');

            // if not undefined a star was clicked by user
            if (typeof(event) !== 'undefined') {
              // Don't allow unauthenticated users to add a review
              var username = '<?php echo (isset($_SESSION['username']) ? 'set' : 'unset'); ?>';
              console.log(username);
              if (username == "unset") {
                window.location.href = '../login/login.php';
              } else {
                var data_split_id = data_id.split("_");
                var item_name = data_split_id[1];

                // Ajax call to review.php will update database with the review
                $.ajax({
                  url: 'review.php',
                  type: 'post',
                  data: {item_name:item_name,review:value},
                  dataType: 'json',
                  success: function(data) {
                    // Change average when new review added
                    var average = data['average_review'];
                    $('#avg_review_'+item_name).text(average);
                  }
                });
              }
            }
          }
        });
      });
    </script>

    <!-- temporary breaks to force footer to bottom
         will be removed when content added -->
    <br><br><br><br><br><br><br><br>
    <?php include('../footer.php'); ?>
  </body>
</html>
