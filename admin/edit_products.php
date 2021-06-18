<!-- Login script -->
<?php include('./controllers/login.php'); 

// Query if email exists in db
$sql_products = "SELECT * From products ORDER BY id ASC";
$query_products = mysqli_query($connection, $sql_products);

$rowCount_products = mysqli_num_rows($query_products);

$sql_showProduct = "SELECT * From products ORDER BY id ASC";
$query_showProducts = mysqli_query($connection, $sql_showProduct);


// If query fails, show the reason 
if(!$query_products){
   die("SQL query failed: " . mysqli_error($connection));
}

?>

<!doctype HTML>
<html lang="en">

<head>
    <title>Fabrique Vintage Largest Wholesale Vintage for the south hemisphere</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!--    <link rel="shortcut icon" href="favicon.png">    -->
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dropzone/dropzone.css" type="text/css">

    <meta name="author" content="Spike">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header>

        <!--Navbar-->
        <div class="display_login"><?php              
            if(!isset($_SESSION['is_active'])){ ?>
            <!-- 
            <button class="close_link_login">&#10060;</button> -->

            <?php    header("location: ../index.php");
            }
        
            ?></a>
        </div>
        <div class="hidden_login">
            <?php 
        if(isset($_SESSION['is_active'])){ ?>
            <p>Welcome
                <?php echo $_SESSION['name']; ?>

                you have access to this link:</p>
            <p> <a href="index.php">Admin area</a>
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
            <a href="../logout.php" class="link_login">Log out</a></p>
            <?php

                        } 
        ?>
            <button class="closing_button">&#10060;</button>
        </div>
        <nav class="navbar navbar-dark">
            <div class="left_nav">
                <a class="navbar-brand" href="index.php">
                    <img src="../pictures/french_fripe_logo.png">
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li>
                            <a href="../index.php" class="nav-link">Back website</a>
                        </li>
                        <div class="link-phone">
                            <a href="index.php">Last activites</a>
                            <a href="admin_products.php">Categories</a>
                            <a href="#">Products</a>
                            <a href="categorie.html">Orders</a>
                            <a href="categorie.html">Recap</a>
                        </div>

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

                <!--Sidebar-->
                <div class="col__left">

                    <div class="widget-wrapper">
                        <h4>Categories:</h4>
                        <br>
                        <div class="list-group">
                            <a href="index.php" class="list-group-item">Last activites</a>
                            <a href="admin_categories.php" class="list-group-item">Categories</a>
                            <a href="admin_products.php" class="list-group-item active">Products</a>
                            <a href="admin_terms.php" class="list-group-item">Terms</a>
                            <a href="categorie.html" class="list-group-item">Orders</a>
                            <a href="categorie.html" class="list-group-item">Recap</a>
                        </div>
                    </div>

                </div>
                <!--/.Sidebar-->

                <!--Main column-->
                <div class="col__right categorie">




                    <hr class="extra-margins">
                    <div class="row">

                        <?php

                          while($row_showProducts = mysqli_fetch_array($query_showProducts)) { 
                              $query_photo_product = "SELECT * From images_products WHERE (id_products) = '".$row_showProducts['id']."'"; 
                              $result_query_photo = mysqli_query($connection, $query_photo_product); 
                               ?>

                        <!--First columnn-->
                        <div class="col-lg-4 categorie">
                            <!--Card-->
                            <div class="card">
                                <div class="front">

                                    <!--Card image-->
                                    <div class="card__photo">
                                        <?php
                                        if ($row_photo_product = mysqli_fetch_assoc($result_query_photo)){
                                            $image_product = $row_photo_product;


                                        }
                                        ?>
                                        <img src="../<?php echo $image_product['path'];?>/<?php echo $image_product['name'];?>"
                                            class="img-fluid" alt="">
                                        <a href="#">
                                            <div class="mask"></div>
                                        </a>
                                    </div>
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    <div class="card-block">
                                        <!--Title-->
                                        <h4 class="card-title <?php 
                                        if($row_showProducts['online'] == 1) {
                                            echo 'green';
                                        } else {
                                            echo 'red';
                                        }?>">


                                            <?php                                         
                                        echo $row_showProducts['name']; ?></h4>
                                        <!--Text-->
                                        <p class="card-text">
                                            <?php echo $row_showProducts['short_description']; ?></p>
                                        <!--                                        <a href="#" class="btn btn-default">Buy now for <strong>$10</strong></a>-->
                                    </div>
                                    <!--/.Card content-->
                                </div>
                                <div class="back">
                                    <h4 class="card-title <?php 
                                        if($row_showProducts['online'] == 1) {
                                            echo 'green';
                                        } else {
                                            echo 'red';
                                        }?>">


                                        <?php                                         
                                        echo $row_showProducts['name']; ?></h4>
                                    <h3><strong>AU$<?php echo $row_showProducts['price']; ?></strong>
                                    </h3>
                                    <!--Text-->
                                    <div class="card-text">
                                        <p><?php echo $row_showProducts['short_description']; ?></p>
                                    </div>
                                    <div class="button">
                                        <a href="edit_product_info.php?id=<?php echo $row_showProducts['id']; ?>"
                                            class="btn btn-default">Edit information</a>
                                    </div>

                                </div>
                                <div class="background"></div>

                            </div>
                            <!--/.Card-->
                        </div>
                        <!--First columnn-->

                        <?php
                        }

                               ?>





                    </div>

                </div>
                <!--/.Main column-->

            </div>
        </div>
        <!--/.Main layout-->

    </main>

    <!--Footer-->
    <footer class="page-footer center-on-small-only">

        <!--Footer Links-->
        <div class="container-fluid">
            <div class="row footer">

                <!--First column-->
                <div class="col-lg-2 col-md-4 hidden-lg-down">
                    <h5>French fripe</h5>
                    <p>It's about recycling and have a sustainable approach....</p>
                </div>
                <!--/.First column-->

                <!--      <hr class="hidden-md-up">-->

                <!--Second column-->
                <div class="col-lg-2 col-md-4 offset-lg-1">
                    <h5 class="title">About us</h5>
                    <ul>
                        <li><a href="#!">Adress</a></li>
                        <li><a href="#!">Team</a></li>
                        <li><a href="#!">Phone number</a></li>
                    </ul>
                </div>
                <!--/.Second column-->



                <!--Third column-->
                <div class="col-lg-2 col-md-4">
                    <h5 class="title">Metrics</h5>
                    <ul>
                        <li><a href="#!">Shoe sizes</a></li>
                        <li><a href="#!">T-shirt sizes</a></li>
                        <li><a href="#!">Sweatshirt sizes</a></li>
                        <li><a href="#!">Pants sizes</a></li>
                    </ul>
                </div>
                <!--/.Third column-->



                <!--Fourth column-->
                <div class="col-lg-2 col-md-4">
                    <h5 class="title">Useful links</h5>
                    <ul>
                        <li><a href="#!">Pricing</a></li>
                        <li><a href="#!">Delivery</a></li>
                        <li><a href="#!">Countries</a></li>
                        <li><a href="#!">Returns</a></li>
                    </ul>
                </div>
                <!--/.Fourth column-->

            </div>
        </div>
        <!--/.Footer Links-->

        <hr>

        <!--Copyright-->
        <div class="footer-copyright">
            © 2020 Copyright: Spike
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->
</body>

</html>