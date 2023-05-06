<!DOCTYPE html>
<html>
<head>
  <title>E-commerce Clothes - Home</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <?php include('../head.php'); ?>
</head>
<body>
    <?php include('../header.php'); ?>

    <div class="overlay">
        <a class="close">&times;</a>
        <div class="overlay__content">
          <a <?php if ($_SERVER['REQUEST_URI'] == '/home/index.php') : ?>class="current"<?php endif ?> href="../home/index.php">Home</a>
          <a <?php if ($_SERVER['REQUEST_URI'] == '/product/mens-clothing.php') : ?>class="current"<?php endif ?> href="../product/mens-clothing.php">Men's Clothes</a>
          <a <?php if ($_SERVER['REQUEST_URI'] == '/product/womens-clothing.php') : ?>class="current"<?php endif ?> href="../product/womens-clothing.php">Women's Clothes</a>
          <a <?php if ($_SERVER['REQUEST_URI'] == '/about/about.php') : ?>class="current"<?php endif ?> href="../about/about.php">About Us</a>
          <a <?php if ($_SERVER['REQUEST_URI'] == '/contact/ContactUs336.php') : ?>class="current"<?php endif ?> href="../contact/ContactUs336.php">Contact Us</a>
          <a <?php if ($_SERVER['REQUEST_URI'] == '/cart/cart.php') : ?>class="current"<?php endif ?> href="../cart/cart.php">Cart</a>
        </div>
    </div>
    <script type="text/javascript" src="Assignment2.js"></script>

    <section id="showcase">
        <div class="container">

		</div>
    </section>

	<section id="homecontainer1">
			<div class="container" id="MiddleContent">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
			 			<h3><b>Men's Collection!</b></h3>
			 			<img class="homeimg" src="../images/mens.png" alt="logo">
			 			<br>
			 			<a href="../product/mens-clothing.php" class="button">Click to shop!</a>
			 		</div>
			 		<div class="col-lg-6 col-md-6 col-sm-12">
						<h3><b>Women's Collection!</b></h3>
						<img class="homeimg" src="../images/womans.png" alt="logo" style="height: 10%, width: 10%;">
						<br>
						<a href="../product/womens-clothing.php" class="button">Click to shop!</a>
			 		</div>
				</div>
			</div>
		</section>

		<section id="homecontainer1">
			<div class="container" id="MiddleContent">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div id="openinghours">
			                <h1><b>Opening Hours</b></h1>
			                <p>Monday: 09:00 - 21:00</p>
			                <p>Tuesday: 09:00 - 21:00</p>
			                <p>Wednesday: 09:00 - 21:00</p>
			                <p>Thursday: 09:00 - 21:00</p>
			                <p>Friday: 09:00 - 21:00</p>
			                <p>Saturday: 09:00 - 19:00</p>
			                <p>Sunday 13:00 - 18:00</p>
				 		</div>
				 	</div>
			 		<div class="col-lg-6 col-md-6 col-sm-12">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3635.804156449158!2d-7.31807680202724!3d55.00767045267734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x485fe22a6037f471%3A0x5308c53140e88647!2sUlster%20University%20Magee%20Campus!5e0!3m2!1sen!2suk!4v1614527329298!5m2!1sen!2suk"  height="100%" width="80%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			 		</div>
				</div>
			</div>
		</section>

    <?php include('../footer.php'); ?>
</body>
</html>
