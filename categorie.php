<?php 
// Database connection
include('controllers/login.php');
$category_id = $_GET["id"];

$sql_categories = "SELECT * From categories  WHERE online = 1 ORDER BY position ASC";
$query_categories = mysqli_query($connection, $sql_categories);
$query_menu_link = mysqli_query($connection, $sql_categories);

$sql_showProduct = "SELECT * From products WHERE (categories_id) = '".$category_id."' AND online = 1 ORDER BY id ASC";
$query_showProducts = mysqli_query($connection, $sql_showProduct);

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

        <!--Navbar-->
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
        <nav class="navbar navbar-dark">
            <div class="left_nav">
                <a class="navbar-brand" href="index.php">
                    <img src="pictures/french_fripe_logo.png">
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li>
                            <a class="nav-link active">Shop</a>
                        </li>
                        <div class="link-phone">
                            <a href="index.php">Trends</a>
                            <?php 
                            while($row_categories = mysqli_fetch_array($query_categories)) {                               
                               ?>
                            <a
                                href="categorie.php?id=<?php echo htmlspecialchars($row_categories["id"]); ?>"><?php echo htmlspecialchars($row_categories["name"]); ?></a>
                            <?php
                            }?>
                        </div>
                        <li>
                            <a href="about.php" class="nav-link">About us</a>
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

                <!--Sidebar-->
                <div class="col__left">

                    <div class="widget-wrapper">
                        <h4>Categories:</h4>
                        <br>
                        <div class="list-group">
                            <a href="index.php" class="list-group-item">Trends</a>
                            <?php
                           while($row_categories = mysqli_fetch_array($query_menu_link)) {
                               if($row_categories["id"] == $category_id){
                                   ?>
                            <a href="categorie.php?id=<?php echo htmlspecialchars($row_categories["id"]); ?>"
                                class="list-group-item active"><?php echo htmlspecialchars($row_categories["name"]); ?></a>

                            <?php
                                   $GLOBALS['category_name'] = $row_categories["name"];
                                   } else {
                                       ?>
                            <a href="categorie.php?id=<?php echo htmlspecialchars($row_categories["id"]); ?>"
                                class="list-group-item"><?php echo htmlspecialchars($row_categories["name"]); ?></a>
                            <?php
                                   }
                               }                               
                               ?>


                        </div>
                    </div>

                </div>
                <!--/.Sidebar-->

                <!--Main column-->
                <div class="col__right categorie">
                    <h4 class="category_name"><?php echo $GLOBALS['category_name']; ?></h4>
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
                                        <img src="<?php echo $image_product['path'];?>/<?php echo $image_product['name'];?>"
                                            class="img-fluid" alt="">
                                        <a href="#">
                                            <div class="mask"></div>
                                        </a>
                                    </div>
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    <div class="card-block">
                                        <!--Title-->
                                        <h4 class="card-title"><?php echo $row_showProducts['name']; ?></h4>
                                        <!--Text-->
                                        <p class="card-text"><?php echo $row_showProducts['short_description']; ?></p>
                                        <!--                                        <a href="#" class="btn btn-default">Buy now for <strong>$10</strong></a>-->
                                    </div>
                                    <!--/.Card content-->
                                </div>
                                <div class="back">
                                    <h4 class="card-title"><?php echo $row_showProducts['name']; ?></h4>
                                    <h4 class="card-title">
                                        <strong>AU$<?php echo $row_showProducts['price']; ?></strong>
                                    </h4>
                                    </h4>
                                    <!--Text-->
                                    <div class="card-text">
                                        <p><?php echo $row_showProducts['short_description']; ?></p>
                                    </div>
                                    <div class="button">
                                        <a href="product.php?id=<?php echo $row_showProducts['id']; ?>"
                                            class="btn btn-default">More
                                            info</a>
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

    <?php 
        include("footer.php"); 
    ?>
</body>

</html>