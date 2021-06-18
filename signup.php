<?php include('./controllers/register.php'); ?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="styles/styles.css">
    <title>PHP User Registration System Example</title>
    <!-- jQuery + Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>

<body>

<?php include('./header.php'); ?>

    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">
                <form action="" method="post">
                    <h3>Register</h3>

                    <?php echo $success_msg; ?>
                    <?php echo $email_exist; ?>

                    <?php echo $email_verify_err; ?>
                    <?php echo $email_verify_success; ?>


                    <div class="form-group">
                        <label>Nick name</label>
                        <input type="text" class="form-control" name="name" id="name" />

                        <?php echo $NameEmptyErr; ?>
                        <?php echo $NameErr; ?>

                    </div>   

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" />

                        <?php echo $_emailErr; ?>
                        <?php echo $emailEmptyErr; ?>

                    </div>
                  
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password" />

                        <?php echo $_passwordErr; ?>
                        <?php echo $passwordEmptyErr; ?>
                    
                    
                    </div>

                    <button type="submit" name="submit" id="submit" class="btn-outline-primary btn-lg btn-block">
                        Sign up
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>