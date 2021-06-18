<?php
   
    // Database connection
    include('config/db.php'); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="styles/styles.css">
    <title>PHP Login System</title>
    <!-- jQuery + Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>

<body>

 <!-- Header -->
 <?php include('header.php'); ?>

<!-- Login script -->
<?php include('controllers/login.php'); 

if(!isset($_SESSION['is_active'])){
    include('controllers/login_form.php');
}
else { 
                    ?>
                    <a href="dashboard.php">Logout</a>
                    <?php
                  } 
                  ?> 
</body>

</html>