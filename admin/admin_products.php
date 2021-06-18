<!-- Login script -->
<?php include('./controllers/login.php'); 

// Query if email exists in db
$sql_products = "SELECT * From products ORDER BY id ASC";
$query_products = mysqli_query($connection, $sql_products);

$rowCount_products = mysqli_num_rows($query_products);
$name_err = $name_products = $message_delete = $delete_products = "";
$id_products = $id_delete = $position = $position_products =  0;


// If query fails, show the reason 
if(!$query_products){
   die("SQL query failed: " . mysqli_error($connection));
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    
        if((!empty(trim($_POST["name_product"]))) && 
            (!empty(trim($_POST["price_product"]))) && 
            (!empty(trim($_POST["quantity_product"]))) && 
            (!empty(trim($_POST["long_description_product"]))) && 
            (!empty(trim($_POST["short_description_product"]))) && 
            (!empty(trim($_POST["weight_product"]))) && 
            (!empty(trim($_POST["minimum_quantity_product"]))) && 
            (!empty(trim($_POST["pieces_by_box_product"])))){
        
            $name_product = $_POST["name_product"];
            $category_product = $_POST["category_product"];
            $price_product = $_POST["price_product"];
            $quantity_product = $_POST["quantity_product"]; 
            $long_description_product = $_POST["long_description_product"]; 
            $short_description_product = $_POST["short_description_product"]; 
            $weight_product = $_POST["weight_product"]; 
            $minimum_quantity_product = $_POST["minimum_quantity_product"];
            $pieces_by_box_product = $_POST["pieces_by_box_product"];
            $_SESSION['name_product_photo'] = $name_product; 
        } else {     
            $name_err = '<p class="attention"><i class="fas fa-exclamation-triangle"></i> You forgot some DETAILS! <i class="fas fa-exclamation-triangle"></i></p>';
                      
        }  
     
    
    // Check input errors before inserting in database
    if(!empty($name_product)){
         //Prepare an insert statement
        $sql = "INSERT INTO products (name, categories_id, price, quantity, short_description, full_description, minimum_quantity, weight, pieces_by_box) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
         
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "siiissidi", $name_product, $category_product, $price_product, $quantity_product, $short_description_product, $long_description_product, $minimum_quantity_product, $weight_product, $pieces_by_box_product);
               
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                 header("location: upload_photo.php");
                
            } else {
                printf("Erreur : %s.\n", mysqli_stmt_error($stmt));
            }
        
         
            // Close statement
            mysqli_stmt_close($stmt);
        }    
          
    }

    
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
                <div class="col__right">

                    <!--First row-->
                    <div class="row">

                        <div class="product_title">
                            <a href="#" class="add_product_select">
                                <h3>Add a new product</h3>
                            </a>
                            <a href="edit_products.php" class="edit_product_select">
                                <h3>Edit a product</h3>
                            </a>
                        </div>
                    </div>
                    <!--/.First row-->

                    <hr class="extra-margins">

                    <!--Second row-->
                    <div class="row addProduct open">
                        <div class="App">
                            <div class="vertical-center">
                                <div class="inner-block">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <h3>Details</h3>
                                        <p class="attention"><i class="fas fa-exclamation-triangle"></i> You need to
                                            enter every details before saving <i
                                                class="fas fa-exclamation-triangle"></i></p>


                                        <div class="form-group">
                                            <label>Name product</label>
                                            <input type="text" class="form-control" name="name_product" />
                                        </div>
                                        <label>Choose a categorie:</label>
                                        <select name="category_product">

                                            <?php 
                                            $sql_categories_form = "SELECT * From categories ORDER BY position ASC";
                                             $query_categories_form = mysqli_query($connection, $sql_categories_form);
                                             while($row_categories_form = mysqli_fetch_array($query_categories_form)) {                           
                            
                                                      ?>

                                            <option value="<?php echo htmlspecialchars($row_categories_form["id"]);?>">
                                                <?php echo htmlspecialchars($row_categories_form["name"]);?></option>
                                            <?php
                                              }?>
                                        </select>
                                        <div class="form-group">
                                            <label>Price in $AUD</label>
                                            <input type="number" class="form-control" name="price_product" />
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity in Stock</label>
                                            <input type="number" class="form-control" name="quantity_product" />
                                        </div>
                                        <div class="form-group">
                                            <label>Short description</label>
                                            <textarea rows="4" cols="50" class="form-control"
                                                name="short_description_product" />A description for the
                                            cards.</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Long description</label>
                                            <textarea rows="15" cols="50" class="form-control"
                                                name="long_description_product" />The full description for the product's
                                            page.</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Minimum quantity the client can order</label>
                                            <input type="number" class="form-control" name="minimum_quantity_product" />
                                        </div>
                                        <div class="form-group">
                                            <label>Average weight for one piece in Kg</label>
                                            <input type="number" step="0.001" class="form-control"
                                                name="weight_product" />
                                        </div>
                                        <div class="form-group">
                                            <label>Average pieces in one box</label>
                                            <input type="number" class="form-control" name="pieces_by_box_product" />
                                        </div>

                                        <button type="submit" name="save"
                                            class="btn-outline-primary btn-lg btn-block">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.Second row-->
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