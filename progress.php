<?php session_start();
require "conn.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
if (!isset($_GET['bid'])) {
    header("Location: view-booking.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themetechmount.com/html/planwey/blog-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Dec 2021 12:08:55 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Planwey &#8211; Event planner &amp; celebration html Template" />
    <meta name="author" content="https://www.themetechmount.com/" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Planwey &#8211; Progress</title>

    <?php include_once "themepart/style.php" ?>

</head>

<body>

    <!--page start-->
    <div class="page">

        <?php include_once "themepart/header.php" ?>

        <div class="ttm-page-title-row text-center">
            <div class="section-overlay"></div>
            <div class="title-box text-center">
                <div class="container">
                    <div class="page-title-heading">
                        <h1 class="title">PROGRESS STATUS</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="home.php"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white"> Progress Status</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--site-main -->
        <div class="site-main">

            <section class="ttm-row grid-blog-section ttm-bgcolor-dark-grey clearfix">
                <div class="container">
                    <div class="row">

                        <?php
                        $booking_id = $_GET['bid'];
                        $progq = mysqli_query($connection, "Select * From progress_tbl Where booking_id={$booking_id}") or die(mysqli_error($connection));
                        while ($query = mysqli_fetch_array($progq))
                        {
                            echo "<div class='col-lg-4 col-md-6 col-sm-12 col-xs-12'>
                            <div class='featured-imagebox featured-imagebox-post box-shadow1 ttm-bgcolor-white ttm-box-view-top-image mb-30'>
                                <div class='featured-thumbnail'>
                                    <a href='single-blog.html'><img class='img-fluid' src='../Admin-Panel/{$query['progress_img']}' alt='image'></a>
                                </div>
                                <div class='featured-content featured-content-post position-relative'>
                                    <div class='featured-title '>
                                    <h5> {$query['progress_date']} | {$query['event_status']} </h5>
                                    </div>

                                </div>
                            </div>
                        </div>";

                        }
                        ?>

                    </div>
                </div>
            </section>

        </div><!-- site-main end -->

        <?php include_once "themepart/footer.php" ?>

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
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/numinate.min6959.js?ver=4.9.3"></script>
    <script src="js/main.js"></script>


</body>


</html>