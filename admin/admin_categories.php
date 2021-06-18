<!-- Login script -->
<?php include('./controllers/login.php'); 


// Query if email exists in db
$sql_categories = "SELECT * From categories ORDER BY position ASC";
$query_categories = mysqli_query($connection, $sql_categories);

$rowCount_categories = mysqli_num_rows($query_categories);
$name_err = $name_categories = $message_delete = $delete_categories = "";
$id_categories = $id_delete = $position = $position_categories =  0;


// If query fails, show the reason 
if(!$query_categories){
   die("SQL query failed: " . mysqli_error($connection));
}
 

       

if($_SERVER["REQUEST_METHOD"] == "POST"){  
    
    if (!empty(trim($_POST["id_update_online"]))){
        $id_update_online = $_POST["id_update_online"];   
        if(!empty(trim($_POST["online_status"]))){     

        mysqli_query($connection, "UPDATE categories set online = 1 WHERE id = '$id_update_online'");
        } else {
            mysqli_query($connection, "UPDATE categories set online = 0 WHERE id = '$id_update_online'");
        }
        header("location: admin_categories.php");
    }
    
    
    
    //delete categories

    if (!empty(trim($_POST["position_categories"]))){
        $position_to_update = $_POST["position_categories"];        

        if($_POST["up"] == 1){
            mysqli_query($connection, "UPDATE categories set position = -1 WHERE position = '$position_to_update'");
            mysqli_query($connection, "UPDATE categories set position = (('$position_to_update' - 1 )+ 1)  WHERE position = ('$position_to_update' - 1)");
            mysqli_query($connection, "UPDATE categories set position = ('$position_to_update' - 1)  WHERE position = -1");
       

        } else if($_POST["down"] == 1){
            mysqli_query($connection, "UPDATE categories set position = -1 WHERE position = '$position_to_update'");
            mysqli_query($connection, "UPDATE categories set position = (('$position_to_update' + 1) - 1)  WHERE position = ('$position_to_update' + 1)");
            mysqli_query($connection, "UPDATE categories set position = ('$position_to_update' + 1)  WHERE position = -1");
           
        }
        header("location: admin_categories.php");
    }

       
    
    if (!empty(trim($_POST["id_categories"]))){
        $id_delete = trim($_POST["id_categories"]);

        $sql_delete = "DELETE FROM categories WHERE id = $id_delete";

        if ($connection->query($sql_delete) === TRUE) {
            $message_delete = "Categorie deleted successfully";
          } else {
            $message_delete = "Error deleting categorie: " . $connection->error;
          }

          $sql_categories_update = "SELECT * From categories ORDER BY position ASC";
          $update_categories_sql = mysqli_query($connection, $sql_categories_update);
          


          while($update_categories = mysqli_fetch_array($update_categories_sql)) {

            $position++;
            $id_to_update = $update_categories["id"];

            $update_position = "UPDATE categories SET position = '$position' WHERE id = '$id_to_update'";
                    
            if($connection->query($update_position) === TRUE) {
                $message_delete = "Categorie updated successfully";
          } else {
                $message_delete = "Error updating categorie: " . $connection->error;
          }

        };

          header("location: admin_categories.php");

            
        
    }

        

    

    // Validate name
    if(isset($_POST["name_categories"])){
        if(!empty(trim($_POST["name_categories"]))){
        
            $name_categories = trim($_POST["name_categories"]); 
        } else {     
            $name_err = "Please enter a Name for the categorie.";
                      
        }  
    } 
    
    // Check input errors before inserting in database
    if(!empty($name_categories)){     
        
         //Prepare an insert statement
        $sql = "INSERT INTO categories (position, name) VALUES (?, ?)";
        
         
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "is", $param_position, $param_name);
            
            // Set parameters
            $param_name = $name_categories;
            $param_position = $rowCount_categories + 1;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: admin_categories.php");
            } else {
                printf("Erreur : %s.\n", mysqli_stmt_error($stmt));
            }
        
         
            // Close statement
            mysqli_stmt_close($stmt);
        }    
        // Close connection
        mysqli_close($connection);  
        mysqli_stmt_close($stmt);  
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
                            <a href="admin_categories.php">Categories</a>
                            <a href="admin_products.php">Products</a>
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
                            <a href="admin_categories.php" class="list-group-item active">Categories</a>
                            <a href="admin_products.php" class="list-group-item">Products</a>
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


                    <?php 
                    
                    if($rowCount_categories <= 0) {
                        $accountNotExistErr = '<div class="alert alert-danger">
                                You had not created any categories.
                            </div>';
                    } else {
                        // Fetch user data and store in php session
                        while($row_categories = mysqli_fetch_array($query_categories)) {                           
                            
                            ?>

                    <div class="list_categories">
                        <?php                                
                                echo htmlspecialchars($row_categories["name"]);
                                ?>
                        <div class="arrow">

                            <?php 
                                if($row_categories["position"] == 1){

                                } else {
                                    ?>

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden"
                                    value="<?php echo htmlspecialchars($row_categories["position"]); ?>"
                                    name="position_categories" />
                                <input type="hidden" value="1" name="up" />
                                <input type="hidden" value="0" name="down" />
                                <input type="submit" class="erase_categories" value=""><button
                                    class="arrow_button">&#8679;</button></input>

                            </form>
                            <?php

                                }

                                if($row_categories["position"] == $rowCount_categories){

                                } else {
                                    ?>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden"
                                    value="<?php echo htmlspecialchars($row_categories["position"]); ?>"
                                    name="position_categories" />
                                <input type="hidden" value="1" name="down" />
                                <input type="hidden" value="0" name="up" />
                                <input type="submit" class="erase_categories" value=""><button
                                    class="arrow_button">&#8681;</button></input>

                            </form>
                            <?php
                                }                                
                                ?>
                        </div>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <input type="hidden" value="<?php echo htmlspecialchars($row_categories["id"]); ?>"
                                name="id_categories" />
                            <input type="submit" class="erase_categories" value=""><button
                                class="closing_button">&#10060;</button></input>

                        </form>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <label class="online" for="<?php echo htmlspecialchars($row_categories["id"]); ?>">
                                <?php
                                    if($row_categories["online"] == 1){
                                        ?>
                                <input class="online__input" name="online_status" type="checkbox"
                                    id="<?php echo htmlspecialchars($row_categories["id"]); ?>" checked>
                                <?php

                                    } else {
                                        ?>
                                <input class="online__input" name="online_status" type="checkbox"
                                    id="<?php echo htmlspecialchars($row_categories["id"]); ?>">
                                <?php

                                    }


                                    ?>

                                <div class="online__fill"></div>
                            </label>
                            <input type="hidden" value="<?php echo htmlspecialchars($row_categories["id"]); ?>"
                                name="id_update_online" />
                            <input type="submit" class="online_update" value="Update online status"></input>
                        </form>
                    </div>
                    <?php
                            }
                            
                        }
                    
                    
                    
                    ?>


                    <!--/.First row-->

                    <hr class="extra-margins">

                    <!--Second row-->
                    <div class="row">
                        <div class="App needGap">
                            <div class="vertical-center">
                                <div class="inner-block">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <h3>Add a categorie</h3>

                                        <?php echo $name_err; ?>
                                        <div class="form-group">
                                            <label>Categorie name:</label>
                                            <input type="text" class="form-control" name="name_categories"
                                                value="<?php echo $name_categories; ?>" />
                                        </div>

                                        <button type="submit"
                                            class="btn-outline-primary btn-lg btn-block">Submit</button>
                                        <button type="reset"
                                            class="btn-outline-primary btn-lg btn-block close_link_login">Reset</button>
                                    </form>
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