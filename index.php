<!-- Login script -->
<?php include('controllers/login.php');

$sql_categories = "SELECT * From categories WHERE online = 1 ORDER BY position ASC";
$query_categories = mysqli_query($connection, $sql_categories);
$query_menu_link = mysqli_query($connection, $sql_categories);

?>

<?php    include('main_header.php'); ?>

<!--Main column-->
<div class="col__right">
    <div class="whatsnew">
        <div class="divider-new">
            <h2 class="h2-responsive">What's new?</h2>
        </div>
    </div>

    <!--First row-->
    <div class="row">

        <div class="col-lg-12">



            <!--Carousel Wrapper-->
            <div class="carousel slide carousel-fade" id="carousel-example-1z" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!--First slide-->
                    <div class="carousel-item active">
                        <img src="pictures/RalphLaurenPoloTees-2_394x.jpg" alt="First slide">
                        <div class="carousel-caption">
                            <h4>New collection</h4>
                            <br>
                        </div>
                    </div>
                    <!--/First slide-->
                    <!--Second slide-->
                    <div class="carousel-item">
                        <img src="pictures/FestivalCrazyPatternedShirts-2_394x.jpg" alt="Second slide">
                        <div class="carousel-caption">
                            <h4>Get discount!</h4>
                            <br>
                        </div>
                    </div>
                    <!--/Second slide-->
                    <!--Third slide-->
                    <div class="carousel-item">
                        <img src="pictures/RalphLaurenShirts-2_394x.jpg" alt="Third slide">
                        <div class="carousel-caption">
                            <h4>Only now for $10</h4>
                            <br>
                        </div>
                    </div>
                    <!--/Third slide-->
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
            </div>
            <!--/.Carousel Wrapper-->
        </div>
    </div>
    <!--/.First row-->

    <hr class="extra-margins">

    <!--Second row-->
    <div class="row double">
        <!--First columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card">
                <div class="front">

                    <!--Card image-->
                    <div class="card__photo">
                        <img src="pictures/RalphLaurenShirts-2_394x.jpg" class="img-fluid" alt="">
                    </div>
                    <!--/.Card image-->

                    <!--Card content-->
                    <div class="card-block">
                        <!--Title-->
                        <h4 class="card-title">Sweater</h4>
                        <!--Text-->
                        <p>Jumper sweater pull...</p>
                    </div>
                    <!--/.Card content-->
                </div>
                <div class="back">
                    <h4 class="card-title">Sweater <strong>$30</strong></h4>
                    <!--Text-->
                    <div class="card-text">
                        <p>Bags of 25Kg, top quality, from France.</p>
                        <p>You can expect items such as jackets, coats, fleece, tees, shirts, denim,
                            trousers, shorts & jumpers</p>
                    </div>
                    <div class="button">
                        <a href="product.php" class="btn btn-default">More info</a>
                    </div>

                </div>
                <div class="background"></div>

            </div>
            <!--/.Card-->
        </div>
        <!--First columnn-->

        <!--Second columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card">
                <div class="front">
                    <!--Card image-->
                    <div class="card__photo">
                        <img src="pictures/RalphLaurenPoloTees-2_394x.jpg" class="img-fluid" alt="">
                    </div>
                    <!--/.Card image-->
                    <!--Card content-->
                    <div class="card-block">
                        <!--Title-->
                        <h4 class="card-title">Harley Davidson Tee</h4>
                        <!--Text-->
                        <p>Summer is here</p>
                    </div>
                    <!--/.Card content-->
                </div>
                <div class="back">
                    <h4 class="card-title">Harley Davidson Tee <strong>$30</strong></h4>
                    <!--Text-->
                    <div class="card-text">
                        <p>Bags of 25Kg, top quality, from France.</p>

                        <p>You can expect items such as jackets, coats, fleece, tees, shirts, denim,
                            trousers, shorts & jumpers</p>
                    </div>
                    <div class="button">
                        <a href="product.php" class="btn btn-default">More info</a>
                    </div>


                </div>
                <div class="background"></div>

            </div>
            <!--/.Card-->
        </div>
        <!--Second columnn-->

        <!--Third columnn-->
    </div>
    <!--/.Second row-->

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