<?php
  // ini_set('display_errors', true);
  // error_reporting(E_ALL ^ E_NOTICE);
  error_reporting(0);
  include('../database.php');
  session_start();
  $item_name = 'neonrose-denim-jacket';

  /*
   * Users should be able to browser products without being logged in
   *
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You are not logged in";
    header('location: ../login/login.php');
  }
  */
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Womens | Jeans</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <?php include('../head.php'); ?>

  <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!--
    Add jQuery front-end review stars, requires 1.12.0 jquery
    From https://github.com/antennaio/jquery-bar-rating
    Requires font-awesome for the stars
  -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href='assets/jquery-bar-rating/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
  <script src='assets/jquery-bar-rating/dist/jquery.barrating.min.js' type='text/javascript'></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include('../header.php'); ?>

  <!-- Main Content -->
  <div class="container-fluid">
    <!-- Product Description -->
    <div class="product-preview-container">

      <!-- Product Image Scroller -->
      <div class="left-column">
        <div class="row" >
            <div class="d-flex" >
                <div class="preview-card">
                    <div class="d-flex flex-column thumbnails">
                        <div id="f1" class="tb tb-active" > <img class="thumbnail-img fit-image" src="assets/womens/coats/neonrose_coat_1.jpeg"> </div>
                        <div id="f2" class="tb"> <img class="thumbnail-img fit-image" src="assets/womens/coats/neonrose_coat_2.jpeg"> </div>
                        <div id="f3" class="tb"> <img class="thumbnail-img fit-image" src="assets/womens/coats/neonrose_coat_3.jpeg"> </div>
                        <div id="f4" class="tb"> <img class="thumbnail-img fit-image" src="assets/womens/coats/neonrose_coat_4.jpeg"> </div>
                    </div>
                    <fieldset id="f11" class="active" style="border: none;">
                        <div class="product-pic"> <img class="pic0" src="assets/womens/coats/neonrose_coat_1.jpeg"> </div>
                    </fieldset>
                    <fieldset id="f21" class="" style="border: none;">
                        <div class="product-pic"> <img class="pic0" src="assets/womens/coats/neonrose_coat_2.jpeg"> </div>
                    </fieldset>
                    <fieldset id="f31" class="" style="border: none;">
                        <div class="product-pic"> <img class="pic0" src="assets/womens/coats/neonrose_coat_3.jpeg"> </div>
                    </fieldset>
                    <fieldset id="f41" class="" style="border: none;">
                        <div class="product-pic"> <img class="pic0" src="assets/womens/coats/neonrose_coat_4.jpeg"> </div>
                    </fieldset>
                </div>
            </div>
        </div>
      </div>

      <!-- Product Details -->
      <div class="right-column">
        <div class="product-title">
          <span>Womens Coats & Jackets</span>
          <h3>Neon Rose Relaxed Jacket in Wavy Denim Co-ord</h3>
          <p>Coats & Jackets by Neon Rose: </p>
            <ul class="product-details">
              <li>Patchwork design </li>
              <li>Spread collar</li>
              <li>Button placket</li>
              <li>Button chest pockets t</li>
              <li>Relaxed fit</li>
              <li>Loose cut </li>
            </ul>
        </div>

        <?php include('form.php'); ?>
        <form method='post' action='add_to_cart.php'>
          <div class="product-colour">
            <span><strong>Colour:</strong> Patchwork Denim</span>
          </div>

          <div class="product-size">
            <span><strong>Select Size:</strong></span>

            <div class="choose-size">

             <div class="form-group">
                <select name="size" class="form-control" id="exampleFormControlSelect1" required>
                  <option value="" disabled selected hidden>Select Size...</option>
                  <option>EU 32 - UK 4</option>
                  <option>EU 34 - UK 6</option>
                  <option>EU 36 - UK 8</option>
                  <option>EU 38 - UK 10</option>
                  <option>EU 40 - UK 12</option>
                  <option>EU 42 - UK 14</option>
                  <option>EU 44 - UK 16</option>
                </select>
              </div>
            </div>
            <div>
              <span><strong>Select Quantity:</strong></span>
            </div>
            <div>
              <input type='number' placeholder='1' style="width: 30%; margin-bottom: 10px;" name='<?php echo $item_name ?>' min='1' max='<?php echo $item_quantity ?>' required>
            </div>
          </div>

          <?php if ($item_quantity > 0) : ?>
            <p><span style='color: green'>In Stock</span> - <?php echo $item_quantity ?> Available</p>
          <?php else : ?>
            <p style="color: red;">Out of Stock</p>
          <?php endif ?>

          <select class='review' id='review_<?php echo $item_name; ?>' data-id='review_<?php echo $item_name; ?>'>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
          </select>
          <p><b>Average Rating: </b><span id='avg_review_<?php echo $item_name; ?>'><?php echo $average_review; ?></span><?php if (isset($amount_reviews)) : ?><span> (<?php echo $amount_reviews; ?> Reviews)</span><?php endif ?></p>

          <div class="product-price">
            <span>£45.00</span>
            <button class="cart-btn" type='submit' name='add_to_cart'>Add to cart</button>
          </div>
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

  <?php include('products_footer.php'); ?>
  <!-- <?php // include('../footer.php'); ?> -->
  <script src="script.js">
  </script>
</body>
</html>
