<?php session_start();
require "conn.php";
if (isset($_GET['proid'])) {
    $proid = $_GET['proid'];
    $packageq = mysqli_query($connection, "Select * From package_tbl WHERE property_id={$proid}");
} else {
    header("Location: Event.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Planwey &#8211; Event planner &amp; celebration html Template" />
    <meta name="author" content="https://www.themetechmount.com/" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Planwey &#8211; Event Packages</title>


    <?php include_once 'themepart/style.php' ?>

</head>

<body>

    <!--page start-->
    <div class="page sidebar-true">

        <?php include_once 'themepart/Header.php' ?>

        <!--page-title start-->
        <div class="ttm-page-title-row text-center">
            <div class="section-overlay"></div>
            <div class="title-box text-center">
                <div class="container">
                    <div class="page-title-heading">
                        <h1 class="title">PACKAGES</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="Home.php"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white">Packages</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--page-title end-->
        <!--site-main-->
        <div class="site-main">
            <!-- intro-section -->
            <section class="ttm-sidebar ttm-bgcolor-grey clearfix shop-intro-section">
                <div class="container">
                    <!-- row -->
                    <div class="row ttm-sidebar-right">
                        <div class="col-lg-9 col-md-12 product-area">
                            <?php
                            $proid = $_GET['proid'];
                            $countquery = mysqli_query($connection, "SELECT * FROM package_tbl WHERE property_id={$proid}") or die(mysqli_error($connection));
                            $count = mysqli_num_rows($countquery);
                            echo "<p class='products-result-count'>$count Packages available</p>";
                             ?>
                           
                            <ul class="products row">

                                <!-- product -->
                                <?php
                                if (isset($_GET['proid']) and ($_GET['eid'])) {
                                    $proid = $_GET['proid'];
                                    $eid = $_GET['eid'];
                                    $packageq = mysqli_query($connection, "Select * From package_tbl WHERE property_id={$proid}");
                                } else {
                                    header("Location: Events.php");
                                }
                                while ($packagerow = mysqli_fetch_array($packageq)) {
                                    $packageimg = $packagerow['package_imgs'];
                                    $data = explode(",", $packageimg);
                                    echo    '<li class="product col-md-4 col-sm-6 col-xs-12">
                                                <div class="ttm-product-box">
                                                    <div class="ttm-product-box-inner">
                                                        
                                                        <div class="ttm-product-image-box text-center">';
                                    echo                    "<img class='img-fluid' src='../Admin-Panel/$data[0]' alt=''>";
                                    echo                '</div>
                                                    </div><!-- ttm-product-box-inner end -->
                                                    <div class="ttm-product-content">';
                                    echo                "<h3><a href='Package_details.php?proid={$packagerow['property_id']}&pkgid={$packagerow['package_id']}'>{$packagerow['package_name']}</a></h3>";
                                    $avgquery = mysqli_query($connection, "SELECT Round(AVG(feedback_rating), 1) as avg_rating FROM feedback_tbl WHERE package_id={$packagerow['package_id']}") or die(mysqli_error($connection));
                                    $avgrow = mysqli_fetch_assoc($avgquery);
                                    $avgrating = $avgrow['avg_rating'];
                                    echo                '<div class="star-ratings">
                                                            <ul class="rating sub-menu">';
                                                            for ($i = 1; $i <= $avgrating; $i++) {
                                                                echo "<li class='fa fa-star'></li>";
                                                            }
                                                            for ($j = 5; $j > $avgrating; $j--) {
                                                                echo "<li class='fa fa-star-o'></li>";
                                                            }      
                                    echo                   '</ul>
                                                        </div>
                                                        <span class="price"><span class="product-Price-amount">';
                                    $totalprice =  $packagerow['dj_price'] + $packagerow['photographer_price'];
                                    echo                    "<span class='product-Price-currencySymbol'>₹</span>$totalprice</span>";
                                    echo                '</span>
                                                    </div>
                                                </div>
                                            </li>';
                                }
                                ?>
                                <!-- product end-->
                                <!-- product -->
                            </ul>
                            
                        </div>
                        <div class="col-lg-3 col-md-12 sidebar sidebar-right product-sidebar-right">
                            
                                <form role="search" method="get" class="search-form  box-shadow" action="#">
                                    
                                </form>
                            </aside>

                            <aside class="widget widget-Categories">
                                <h3 class="widget-title">Property</h3>
                                <ul class="widget-menu">
                                    <?php
                                    if (isset($_GET['proid']) and ($_GET['eid'])) {
                                        $proid = $_GET['proid'];
                                        $eid = $_GET['eid'];
                                        $propertyq = mysqli_query($connection, "Select * From property_tbl WHERE event_id={$eid}");
                                    }
                                    while ($propertyrow = mysqli_fetch_array($propertyq)) 
                                    {
                                        echo "<li class='cat-item'><a href='Packages.php?eid={$propertyrow['event_id']}&proid={$propertyrow['property_id']}'>{$propertyrow['property_name']}</a></li>";
                                    }
                                    ?>
                                </ul>
                            </aside>
                        </div>
                    </div><!-- row end -->
                </div>
            </section>
            <!-- intro-section end -->
        </div><!-- site-main end -->

        <?php include_once 'themepart/Footer.php' ?>

    </div><!-- page end -->

    <!--back-to-top start-->
    <a id="totop" href="#top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!--back-to-top end-->
    <!-- Javascript -->

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.js"></script>
    <script src="js/jquery-waypoints.js"></script>
    <script src="js/jquery-validate.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/numinate.min6959.js?ver=4.9.3"></script>
    <script src="js/main.js"></script>





</body>

</html>