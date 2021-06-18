<?php include('./controllers/user_activation.php'); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="styles/styles.css">
    <title>User Verification</title>

    <!-- jQuery + Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>

<body>

    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-4">User Email Verification Demo</h1>
            <div class="col-12 mb-5 text-center">
                <?php echo $email_already_verified; ?>
                <?php echo $email_verified; ?>
                <?php echo $activation_error; ?>
            </div>
            <p class="lead">If user account is verified then click on the following button to login.</p>
            <a class="btn btn-lg btn-success" href="http://french-fripe:8080/index.php"
               >Click to Login
            </a>
        </div>
    </div>


</body>

</html>