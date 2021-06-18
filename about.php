<?php include('controllers/login.php');

$sql_categories = "SELECT * From categories  WHERE online = 1 ORDER BY position ASC";
$query_categories = mysqli_query($connection, $sql_categories);
$query_menu_link = mysqli_query($connection, $sql_categories);

?>

<!doctype HTML>
<html lang="en">

<head>
    <title>Fabrique Vintage Largest Wholesale Vintage for the south hemisphere</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!--    <link rel="shortcut icon" href="favicon.png">    -->
    <link rel="stylesheet" href="styles/transition.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <meta name="author" content="Spike">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header>

        <div class="display_login"><?php 
            if(!isset($_SESSION['is_active'])){ ?>
            <!-- 
            <button class="close_link_login">&#10060;</button> -->

            <?php    include('controllers/login_form.php');
            }
        
            ?>
        </div>
        <div class="hidden_login">
            <?php 
        if(isset($_SESSION['is_active'])){ ?>
            <p>Welcome
                <?php echo $_SESSION['name']; ?>

                you have access to this link:</p>
            <p> <a href="admin/index.php">Admin area</a>
                <?php  
          
                        } 
        ?>

                <?php 
        if(!isset($_SESSION['is_active'])){ ?>
                <a href="#" class="link_login">Login </a>
            </p>

            <?php    
                        } else {
                            ?>
            <a href="logout.php" class="link_login">Log out</a></p>
            <?php

                        } 
        ?>
            <button class="closing_button">&#10060;</button>
        </div>
        <nav class="navbar navbar-toggleable-md navbar-dark">
            <div class="left_nav">
                <a class="navbar-brand" href="index.php">
                    <img src="pictures/french_fripe_logo.png">
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li>
                            <a href="index.php" class="nav-link">Shop</a>
                        </li>
                        <div class="link-phone">
                            <?php 
                            while($row_categories = mysqli_fetch_array($query_categories)) {                               
                               ?>
                            <a
                                href="categorie.php?id=<?php echo htmlspecialchars($row_categories["id"]); ?>"><?php echo htmlspecialchars($row_categories["name"]); ?></a>
                            <?php
                            }?>
                        </div>
                        <li>
                            <a href="#" class="nav-link active">About us</a>
                        </li>
                        <li>
                            <a href="terms.php" class="nav-link">Terms and conditions</a>
                        </li>

                    </ul>

                </div>

            </div>
            <div class="top-text">Second hand vintage Wholesal<a href="#" class="login_hide">e</a></div>
            <button class="nav-button">
                <div class="stripe top"></div>
                <div class="stripe mid"></div>
                <div class="stripe down"></div>
            </button>
        </nav>
        <!--/.Navbar-->

    </header>

    <main>

        <!--Main layout-->
        <div class="container">
            <div class="row">
                <div class="col_about">
                    <h1>We are French Fripe</h1>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <img src="http://frenchfripe.com/wp-content/uploads/2016/07/IMG_6899-14-01-17-02-16.jpeg">

                    <p>Lacus laoreet non curabitur gravida arcu ac tortor dignissim. Praesent tristique magna sit amet
                        purus gravida quis. Sed vulputate mi sit amet mauris commodo. Ultrices in iaculis nunc sed augue
                        lacus viverra vitae congue. Eu feugiat pretium nibh ipsum consequat nisl. Orci eu lobortis
                        elementum nibh. Eget dolor morbi non arcu risus. Iaculis nunc sed augue lacus. Ipsum faucibus
                        vitae aliquet nec ullamcorper. Nunc vel risus commodo viverra maecenas accumsan. Eget lorem
                        dolor sed viverra ipsum nunc aliquet. At risus viverra adipiscing at in tellus integer. Nullam
                        ac tortor vitae purus faucibus ornare suspendisse. Turpis nunc eget lorem dolor sed. Pretium
                        vulputate sapien nec sagittis aliquam malesuada bibendum arcu. Lorem mollis aliquam ut porttitor
                        leo a. Netus et malesuada fames ac.</p>

                    <p>Aenean pharetra magna ac placerat vestibulum lectus mauris. Tortor vitae purus faucibus ornare
                        suspendisse sed nisi. Aliquet bibendum enim facilisis gravida neque convallis a cras semper.
                        Ultrices dui sapien eget mi. Maecenas pharetra convallis posuere morbi. Quis enim lobortis
                        scelerisque fermentum dui faucibus in ornare quam. Et odio pellentesque diam volutpat commodo
                        sed egestas egestas fringilla. Velit sed ullamcorper morbi tincidunt ornare massa. Odio eu
                        feugiat pretium nibh. Eget nunc lobortis mattis aliquam faucibus purus in massa tempor.</p>
                </div>
            </div>
        </div>
        <!--/.Main layout-->

    </main>

    <?php 
        include("footer.php"); 
    ?>
</body>

</html>