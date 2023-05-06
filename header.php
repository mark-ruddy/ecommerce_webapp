<?php
  // Turn off error/warning notices appearing on website in production
  // PHP warnings shouldn't be displayed to end-user
  error_reporting(0);
  session_start();
?>

<header>
    <a class="logo" href="../home/index.php"><img src="../images/logo.png" alt="logo" style="height: 50%, width: 50%;"></a>
    <nav>
        <ul class="nav__links">
          <li><a <?php if ($_SERVER['REQUEST_URI'] == '/home/index.php') : ?>class="current"<?php endif ?> href="../home/index.php">Home</a></li>
          <li><a <?php if ($_SERVER['REQUEST_URI'] == '/product/mens-clothing.php') : ?>class="current"<?php endif ?> href="../product/mens-clothing.php">Men's Clothes</a></li>
          <li><a <?php if ($_SERVER['REQUEST_URI'] == '/product/womens-clothing.php') : ?>class="current"<?php endif ?> href="../product/womens-clothing.php">Women's Clothes</a></li>
          <li><a <?php if ($_SERVER['REQUEST_URI'] == '/about/about.php') : ?>class="current"<?php endif ?> href="../about/about.php">About Us</a></il>
          <li><a <?php if ($_SERVER['REQUEST_URI'] == '/contact/ContactUs336.php') : ?>class="current"<?php endif ?> href="../contact/ContactUs336.php">Contact Us</a></il>
          <li><a <?php if ($_SERVER['REQUEST_URI'] == '/cart/cart.php') : ?>class="current"<?php endif ?> href="../cart/cart.php">Cart</a></li>
        </ul>
    </nav>
    <?php if (isset($_SESSION['username'])) : ?>
      <p style="float: right; color: #edf0f1; margin-right: -25px; padding-left: 60px; font-family: 'Montserrat', sans-serif; font-weight: 500;">Welcome, <?php echo $_SESSION['username'] ?></p>
      <a class="cta" style="float: left; margin-right: 20px; margin-bottom: 10px;" href="../login/successful.php?logout='1'">Log Out</a>
    <?php else : ?>
      <a class="cta" href="../login/login.php">Log In</a>
    <?php endif ?>
    <p class="menu cta">Menu</p>
</header>
