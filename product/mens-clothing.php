<?php
  // ini_set('display_errors', true);
  // error_reporting(E_ALL ^ E_NOTICE);
  error_reporting(0);
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


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Mens Clothing</title>
  <?php include('../head.php'); ?>

  <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include('../header.php'); ?>

<!-- Main Content -->
  <div class="container-fluid">

    <div class="nav-breadcrumb">
      <ul class="breadcrumb">
        <li><a href="../home/index.php">Home</a></li>
        <li>Mens</li>
      </ul>
    </div>

    <!-- font-size change is temporary fix for the CSS clashing between page and original header -->
    <div style="font-size: 85%;" class="row">
      <aside class="col-sm-3">
         <button type="button" data-toggle="collapse" data-target="#filters" class="d-block d-md-none btn btn-block">Filters &dtrif;</button>

         <div id="filters" class="collapse d-md-block">
            <div class="sidebar-card">
              <article class="card-group-item">
                <h5 class="title">Browse Clothing: </h5>
                <div class="filter-content">
                  <div class="card-body">
                    <form>
                      <label class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <span class="form-check-label">
                          Tops
                        </span>
                      </label> <!-- form-check.// -->
                      <label class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <span class="form-check-label">
                          Hoodies & Sweatshirts
                        </span>
                      </label>  <!-- form-check.// -->
                      <label class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <span class="form-check-label">
                          Coats & Jackets
                        </span>
                      </label>  <!-- form-check.// -->
                      <label class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <span class="form-check-label">
                          Trousers
                        </span>
                      </label>  <!-- form-check.// -->
                    </form>
                  </div> <!-- card-body.// -->
                </div>
              </article> <!-- card-group-item.// -->
              <article class="card-group-item">
                <h5 class="title">Browse Shoes: </h5>
                <div class="filter-content">
                  <div class="card-body">
                    <form>
                      <label class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <span class="form-check-label">
                          Trainers
                        </span>
                      </label> <!-- form-check.// -->
                    </form>
                  </div> <!-- card-body.// -->
                </div>
              </article> <!-- card-group-item.// -->
            </div> <!-- card.// -->
          </div>
      </aside> <!-- col.// -->

      <div class="col-sm-9">
        <p>All Mens Clothes</p>

        <div class="row">
          <div class="column">
              <div class="card">
                <a href="jack-and-jones-jeans.php"><img src="assets/mens/trousers/jack_jeans_1.jpeg" alt="Skinny Jeans" style="width:100%"></a>
                <p>Jack&Jones Liam Skinny Jeans</p>
                <p>£30.00</p>
              </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="levi-jeans.php"><img src="assets/mens/trousers/levis_1.jpeg" alt="Standard Rise Jeans" style="width:100%"></a>
              <p>Levi's Skinny Standard Rise Jeans</p>
              <p>£55.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="river-jeans.php"><img src="assets/mens/trousers/ri_1.jpeg" alt="Skinny Jeans" style="width:100%"></a>
              <p>River Island Skinny Jeans</p>
              <p>£45.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="topman-jeans.php"><img src="assets/mens/trousers/topman_1.jpeg" alt="Spray On Jeans" style="width:100%"></a>
              <p>Topman Spray On Jeans</p>
              <p>£35.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="northface-top.php"><img src="assets/mens/tops/northface_1.jpeg" alt="North Face Top" style="width:100%"></a>
              <p>The North Face Mountain T-shirt</p>
              <p>£25.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="nikecourt-top.php"><img src="assets/mens/tops/nikecourt_1.jpeg" alt="Nike Top" style="width:100%"></a>
              <p>Nike Court T-shirt</p>
              <p>£22.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="columbia-top.php"><img src="assets/mens/tops/columbia_1.jpeg" alt="Columbia Top" style="width:100%"></a>
              <p>Columbia Maxtrail T-shirt</p>
              <p>£20.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="element-top.php"><img src="assets/mens/tops/element_1.jpeg" alt="Element T-shirt" style="width:100%"></a>
              <p>Element Spera T-shirt</p>
              <p>£18.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="reebok-sweat.php"><img src="assets/mens/sweatshirts/reebok_sweat_1.jpeg" alt="Reebok Sweatshirt" style="width:100%"></a>
              <p>Reebok Classics Sweatshirt</p>
              <p>£42.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="dickies-sweat.php"><img src="assets/mens/sweatshirts/dickies_1.jpeg" alt="Dickies Sweatshirt" style="width:100%"></a>
              <p>Dickies Oakport Sweatshirt</p>
              <p>£43.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="vintage-sweat.php"><img src="assets/mens/sweatshirts/vintage_1.jpeg" alt="Vintage Supply Hoodie" style="width:100%"></a>
              <p>Vintage Supply Sweatshirt</p>
              <p>£40.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="billabong-sweat.php"><img src="assets/mens/sweatshirts/billabong_1.jpeg" alt="Billabong Hoodie" style="width:100%"></a>
              <p>Billabong Pullover Hoodie</p>
              <p>£35.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="pull-and-bear-coat.php"><img src="assets/mens/coats/pull_1.jpeg" alt="Pull&Bear Leather Jacket" style="width:100%"></a>
              <p>Pull&Bear Leather Jacket</p>
              <p>£55.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="northface-coat.php"><img src="assets/mens/coats/northface_1.jpeg" alt="North Face Coat" style="width:100%"></a>
              <p>The North Face Jacket</p>
              <p>£80.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="topman-coat.php"><img src="assets/mens/coats/topman_1.jpeg" alt="Denim Jacket" style="width:100%"></a>
              <p>Topman Denim Jacket</p>
              <p>£45.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="newbalance-coat.php"><img src="assets/mens/coats/newbalance_1.jpeg" alt="New Balance Hooded Jacket" style="width:100%"></a>
              <p>New Balance Jacket </p>
              <p>£50.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="nike-airforce.php"><img src="assets/mens/shoes/nikeairforce_1.jpeg" alt="Nike Airforce 1" style="width:100%"></a>
              <p>Nike Airforce 1 Trainers </p>
              <p>£85.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="vans-trainer.php"><img src="assets/mens/shoes/vans_1.jpeg" alt="Vans Trainers" style="width:100%"></a>
              <p>Vans Old Skool Trainers</p>
              <p>£60.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="adidas-shoes.php"><img src="assets/mens/shoes/adidas_1.jpeg" alt="Adidas Stan Smiths" style="width:100%"></a>
              <p>Adidas Stan Smith Trainers</p>
              <p>£75.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="fredperry-shoes.php"><img src="assets/mens/shoes/fredperry_1.jpeg" alt="Fred Perry Trainers" style="width:100%"></a>
              <p>Fred Perry Trainers</p>
              <p>£72.00</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('products_footer.php'); ?>
</body>
</html>
