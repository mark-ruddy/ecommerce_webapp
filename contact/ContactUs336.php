<?php
  // ini_set('display_errors', true);
  // error_reporting(E_ALL ^ E_NOTICE);
  error_reporting(0);
  session_start();
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
  <link rel="stylesheet" href="Format.css">
</head>

<body>
  <?php include('../header.php'); ?>
  <br></br>

<div class='container'>
<!-- Main Content -->
             <form onsubmit="return confirm('Are you sure you want to submit the form?');" action="../home/index.php">
            <label>Forename:</label> <! Label for forename.-->   
<input type="text" placeholder="Forename" name="Forename" required />
            <br>
            <label>Surname:</label> <! Label for surname.-->
<input type="text" placeholder="Surname" name="Surname" required />
            <br>
            <label>Gender:</label> <! Label for Gender.-->
<br>
         <select id= "gender" required>
            <option value="" selected disabled hidden>Select a Gender</option>
            <option value = "Male">Male</option>
            <option value = "Female">Female</option>
            <option value = "Other">Other</option>
         </select>
<br>
            <label>Email:</label> <! Label for email.-->            
<input type="email" placeholder="Email" name="Email" required />
            <br>
            <label>Phone:</label> <! Label for phone.-->
<input type="tel" id="phone" name="phone" placeholder="07856043614" pattern="[0-9]{11}" required />
            <br>
            <label>Query:</label> <! Label for Query.-->
<input type="text" placeholder="Query" name="Query" required />
            <br>
            <button class="btnsubmit">Submit</button> <! Button class for submit button. -->
            <button class="btnreset" input type="reset">Reset</button> <! Button class for reset button. -->
            <br>
        </form>
</div>
</div>

    <!-- temporary breaks to force footer to bottom
         will be removed when content added -->
    <br><br><br><br><br> 
  <?php include('../footer.php'); ?>
</body>
</html>
