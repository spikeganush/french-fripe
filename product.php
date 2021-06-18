<!-- Login script -->
<?php include('controllers/login.php');
$product_id = $_GET["id"];

$sql_categories = "SELECT * From categories  WHERE online = 1 ORDER BY position ASC";
$query_categories = mysqli_query($connection, $sql_categories);
$query_menu_link = mysqli_query($connection, $sql_categories);

$sql_showProduct = "SELECT * From products WHERE (id) = '".$product_id."'";
$query_showProducts = mysqli_query($connection, $sql_showProduct);

$sql_showProduct2 = "SELECT * From products WHERE (id) = '".$product_id."'";
$query_showProducts2 = mysqli_query($connection, $sql_showProduct2);
while($row_categories2 = mysqli_fetch_array($query_showProducts2)) {
    $category_id = $row_categories2['categories_id'];
}
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
                <div class="col__right">

                    <?php
               

                          while($row_showProducts = mysqli_fetch_array($query_showProducts)) { 

                            $query_photo_product = "SELECT * From images_products WHERE (id_products) = '".$row_showProducts['id']."'"; 
                            $result_query_photo = mysqli_query($connection, $query_photo_product); 

                            $result_count = "SELECT count(*) as total from images_products WHERE (id_products) = '".$row_showProducts['id']."'";
                            $data=mysqli_query($connection, $result_count);
                            $total=mysqli_fetch_assoc($data);

                              ?>
                    <!--First row-->
                    <div class="product">
                        <div class="product__left">

                            <div class="product__carousel">




                                <!--Carousel Wrapper-->
                                <div class="carousel slide carousel-fade" id="carousel-example-1z" data-ride="carousel">
                                    <!--Indicators-->
                                    <ol class="carousel-indicators">
                                        <?php 
                                        $first_row = true;
                                        for($i = 0; $i < $total['total']; $i++){
                                            if ($first_row){
                                                ?>
                                        <li data-target="#carousel-example-1z" data-slide-to="<?php echo $i;?>"
                                            class="active"></li>
                                        <?php
                                                $first_row = false;
                                            } else {
                                                ?>
                                        <li data-target="#carousel-example-1z" data-slide-to="<?php echo $i;?>"></li>
                                        <?php
    
                                            }

                                        }
                                        
                                        ?>
                                    </ol>
                                    <!--/.Indicators-->
                                    <!--Slides-->
                                    <div class="carousel-inner" role="listbox">
                                        <?php
                                    $first_row = true;
                                    while($row_showPhotos = mysqli_fetch_array($result_query_photo)) {
                                        
                                        if ($first_row){
                                            ?>
                                        <div class="carousel-item active">
                                            <?php
                                            $first_row = false;
                                        } else {
                                            ?>
                                            <div class="carousel-item">
                                                <?php

                                        }
                                        ?>
                                                <!--First slide-->

                                                <img class="carousel__img"
                                                    src="<?php echo $row_showPhotos['path'];?>/<?php echo $row_showPhotos['name'];?>"
                                                    alt="First slide">
                                                <div class="carousel-caption">

                                                </div>
                                            </div>
                                            <!--/First slide-->
                                            <?php
                                    }
                                        ?>


                                        </div>
                                        <!--/.Slides-->
                                        <!--Controls-->
                                        <a class="carousel-control-prev" href="#carousel-example-1z" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-example-1z" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                        <!--/.Controls-->
                                    </div>
                                    <!--/.Carousel Wrapper-->
                                </div>
                            </div>
                            <div class="product__text">

                                <h1 class="product_name"><?php echo $row_showProducts['name'];?></h1>
                                <h1 class="price">$<?php echo $row_showProducts['price'];?> per
                                    <?php 
                                if($row_showProducts['type'] == 1) {
                                    echo 'piece';
                                } elseif($row_showProducts['type'] == 2) {
                                    echo 'box';
                                }
                                ?>
                                </h1>

                                <div class="quantity_container">
                                    <h2>Quantity</h2>
                                    <p>Minimum quantity to order <?php echo $row_showProducts['minimum_quantity'];?>
                                        <?php
                                    if($row_showProducts['type'] == 1) {
                                        if($row_showProducts['minimum_quantity'] <= 1){
                                            echo 'piece';
                                        } else {
                                            echo 'pieces';
                                        }
                                    
                                } elseif($row_showProducts['type'] == 2) {
                                    echo 'box';
                                }
                                ?></p>
                                    <p>(Remaining <?php echo $row_showProducts['quantity'];?> pieces)</p>
                                    <div class="quantity-select">
                                        <button class="button minus">-</button>
                                        <input readonly type="number" class="input"
                                            value="<?php echo $row_showProducts['minimum_quantity'];?>"
                                            min="<?php echo $row_showProducts['minimum_quantity'];?>" />
                                        <button class="button plus">+</button>
                                    </div>
                                    <div class="button pbtn">
                                        <script>
                                        var minimum_java =
                                            <?php echo json_encode($row_showProducts['minimum_quantity']); ?>;
                                        </script>
                                        <input type="hidden" value="<?php echo $row_showProducts['minimum_quantity'];?>"
                                            name="quantity">
                                        <a href="cart.php" data-id="<?php echo $row_showProducts['id'];?>"
                                            data-quantity="<?php echo $row_showProducts['minimum_quantity'];?>"
                                            class="add-to-cart btn btn-default">Add to card</a>
                                    </div>


                                </div>

                                <div class="full_description"><?php echo $row_showProducts['full_description'];?></div>


                            </div>
                        </div>
                        <!--/.First row-->


                        <?php
                          }
                          
                          ?>



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