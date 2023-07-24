<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Planwey &#8211; Event planner &amp; celebration html Template" />
    <meta name="author" content="https://www.themetechmount.com/" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Planwey &#8211; Event</title>

    <?php include_once 'themepart/style.php' ?>
</head>

<body>

    <!--page start-->
    <div class="page">

        <?php include_once 'themepart/Header.php' ?>

        <!--page-title start-->
        <div class="ttm-page-title-row text-center">
            <div class="title-box text-center">
                <div class="container">
                    <div class="page-title-heading">
                        <h1 class="title">OUR GREAT SERVICES</h1>
                        <p class="ttm-textcolor-white">We Here You Want A Party?</p>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="Home.php"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white"> Events</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--page-title end-->
        <!--site-main-->
        <div class="site-main">

            <section class="ttm-row service-section3 clearfix">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class=" section-title clearfix">
                                <h4>GREAT PROVIDE PLANWEY</h4>
                                <h2 class="title">Provide Best Services</h2>
                                <div class="title-img"><img src="images/ds-1.png" alt="underline-img"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        error_reporting(E_ERROR | E_PARSE);
                        include "conn.php";
                        $query = "SELECT * from event_tbl";
                        $selectq = mysqli_query($connection, $query) or die(mysqli_error($connection));

                        while ($productrow = mysqli_fetch_array($selectq))
                        {                           
                           echo '<div class="col-md-6 col-lg-4">';
                           echo     '<div class="featured-imagebox static-title mb-45">';
                           echo         '<div class="featured-thumbnail">';
                           echo         "<img class='img-fluid' src='../Admin-Panel/{$productrow['event_img']}' alt=''>";    
                           echo         '</div>';
                           echo         '<div class="featured-content">';
                           echo             '<div class="featured-title">';
                           $selectq1 = mysqli_query($connection, "SELECT * from property_tbl WHERE event_id={$productrow['event_id']}") or die(mysqli_error($connection));
                           $prow = mysqli_fetch_array($selectq1);
                           $property = $prow['property_id'];      
                           echo                 "<h5><a href='Event-details.php?eid={$productrow['event_id']}&proid=$property'> {$productrow['event_type']} </a></h5>";
                           echo             '</div>';
                           echo         '</div>';
                           echo     '</div>';
                           echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </section>
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