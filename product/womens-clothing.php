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
	<title>Womens Clothing</title>
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
        <li>Womens</li>
      </ul>
    </div>

    <!-- font-size change is temporary fix for the CSS clashing between page and original header -->
    <div style="font-size: 85%" class="row">
      <aside class="col-sm-3">
         <button type="button" data-toggle="collapse" data-target="#filters" class="d-block d-md-none btn btn-block">Filters &dtrif;</button>

         <div id="filters" class="collapse d-md-block">
            <div class="sidebar-card">
              <article class="card-group-item">
                <h5 class="title">Browse by: </h5>
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
                          Dresses
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
                <h5 class="title">Color check: </h5>
                <div class="filter-content">
                  <div class="card-body">
                    <form>
                      <label class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <span class="form-check-label">
                          Mersedes Benz
                        </span>
                      </label> <!-- form-check.// -->
                      <label class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <span class="form-check-label">
                          Nissan Altima
                        </span>
                      </label>  <!-- form-check.// -->
                      <label class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <span class="form-check-label">
                          Another Brand
                        </span>
                      </label>  <!-- form-check.// -->
                    </form>
                  </div> <!-- card-body.// -->
                </div>
              </article> <!-- card-group-item.// -->
            </div> <!-- card.// -->
          </div>
      </aside> <!-- col.// -->

      <div class="col-sm-9">
        <p>All Womens Clothes</p>

        <div class="row">
          <div class="column">
              <div class="card">
                <a href="daisystreet-dress.php"><img src="assets/womens/dresses/daisystreet_dress_1.jpeg" alt="Floral Dress" style="width:100%"></a>
                <p>Daisy Street Mini Dress</p>
                <p>£20.00</p>
              </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="motelrocks-dress.php"><img src="assets/womens/dresses/motelrocks_dress_1.jpeg" alt="Plaid Dress" style="width:100%"></a>
              <p>Motel Rocks Plaid Dress</p>
              <p>£18.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="stradivarius-dress.php"><img src="assets/womens/dresses/stradivarius_dress_1.jpeg" alt="Stradivarius Dress" style="width:100%"></a>
              <p>Stradivarius Floral Dress</p>
              <p>£19.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="womens-leather-jacket.php"><img src="assets/womens/coats/asos_jacket_1.jpeg" alt="Womens Leather Jacket" style="width:100%"></a>
              <p>Faux Leather Jacket</p>
              <p>£40.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="asos-trench-coat.php"><img src="assets/womens/coats/asos_coat_1.jpeg" alt="Womens Trench Coat" style="width:100%"></a>
              <p>Trench Coat</p>
              <p>£35.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="neonrose-denim-jacket.php"><img src="assets/womens/coats/neonrose_coat_1.jpeg" alt="Denim Coat" style="width:100%"></a>
              <p>Neon Rose Denim Coat</p>
              <p>£45.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="stradivarius-jeans.php"><img src="assets/womens/trousers/stradivarius_jeans_1.jpeg" alt="Stradivarius Jeans" style="width:100%"></a>
              <p>Stradivarius Jeans</p>
              <p>£20.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="newlook-jeans.php"><img src="assets/womens/trousers/newlook_jeans_1.jpeg" alt="New Look Jeans" style="width:100%"></a>
              <p>New Look Jeans</p>
              <p>£18.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="pull-and-bear-jeans.php"><img src="assets/womens/trousers/pull&bear_jeans_1.jpeg" alt="Pull&Bear Jeans" style="width:100%"></a>
              <p>Pull&Bear Jeans</p>
              <p>£23.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="urbanbliss-jeans.php"><img src="assets/womens/trousers/urbanbliss_jeans_1.jpeg" alt="Urban Bliss Jeans" style="width:100%"></a>
              <p>Urban Bliss Jeans</p>
              <p>£21.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="adidas-top.php"><img src="assets/womens/tops/adidas_top_1.jpeg" alt="Adidas Top" style="width:100%"></a>
              <p>Adidas Tennis Luxe Top</p>
              <p>£17.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="daisystreet-top.php"><img src="assets/womens/tops/daisystreet_top_1.jpeg" alt="Diasy Street Top" style="width:100%"></a>
              <p>Daisy Steet Top</p>
              <p>£12.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="stradivarius-top.php"><img src="assets/womens/tops/stradivarius_top_1.jpeg" alt="Stradivarius Top" style="width:100%"></a>
              <p>Stradivarius Top</p>
              <p>£14.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="vans-top.php"><img src="assets/womens/tops/vans_top_1.jpeg" alt="Vans Top" style="width:100%"></a>
              <p>Vans Top</p>
              <p>£16.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="asos-skirt.php"><img src="assets/womens/skirts/asos_skirt_1.jpeg" alt="Denim Skirt" style="width:100%"></a>
              <p>Denim Skirt</p>
              <p>£14.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="columbia-sweat.php"><img src="assets/womens/sweatshirts/columbia_sweat_1.jpeg" alt="Columbia Sweatshirt" style="width:100%"></a>
              <p>Columbia Sweatshirt </p>
              <p>£19.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="daisystreet-sweat.php"><img src="assets/womens/sweatshirts/daisystreet_sweat_1.jpeg" alt="Daisy Street Sweatshirt" style="width:100%"></a>
              <p>Daisy Street Sweatshirt </p>
              <p>£15.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="northface-sweat.php"><img src="assets/womens/sweatshirts/northface_sweat_1.jpeg" alt="North Face Sweatshirt" style="width:100%"></a>
              <p>North Face Sweatshirt </p>
              <p>£22.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="drmartens-womens.php"><img src="assets/womens/shoes/drmartens_1.jpeg" alt="Dr Martens Boots" style="width:100%"></a>
              <p>Dr Martens Boots </p>
              <p>£122.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="airforce-womens.php"><img src="assets/womens/shoes/airforce_1.jpeg" alt="Air Force 1 Trainers" style="width:100%"></a>
              <p>Air Force 1 Trainers</p>
              <p>£80.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="converse-womens.php"><img src="assets/womens/shoes/converse_1.jpeg" alt="Converse Trainers" style="width:100%"></a>
              <p>Converse Hi-Tops</p>
              <p>£75.00</p>
            </div>
          </div>
          <div class="column">
            <div class="card">
              <a href="nike-womens.php"><img src="assets/womens/shoes/nike_1.jpeg" alt="Nike Trainers" style="width:100%"></a>
              <p>Nike Blaze Trainers</p>
              <p>£80.00</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('products_footer.php'); ?>
</body>
</html>
