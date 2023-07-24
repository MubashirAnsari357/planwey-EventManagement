<?php session_start();
require 'conn.php';
if (isset($_GET['eid']) and ($_GET['proid'])) {
    $eid = $_GET['eid'];
    $proid = $_GET['proid'];
    $propertyquery = mysqli_query($connection, "Select * From property_tbl Where event_id={$eid} AND property_id={$proid}") or die(mysqli_error($connection));
} else {
    header("Location: Event.php");
}
error_reporting(E_ERROR | E_PARSE);
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
    <title>Planwey &#8211; Event Details</title>
    <!-- <script>
        window.onload = function() {
            document.getElementById("pageLoad").click();
        }
    </script> -->


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
                        <h1 class="title">EVENT DETAILS</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="Home.php"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span><a title="Homepage" href="Event.php">&nbsp;&nbsp;Event</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white">Event Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--page-title end-->
        <!--site-main-->
        <div class="site-main">
            <div class="ttm-tabs element-tab-style-horizontal width-shape-line clearfix mt-60">
                <?php
                $query = "SELECT * from event_tbl WHERE event_id={$eid}";
                $selectq = mysqli_query($connection, $query) or die(mysqli_error($connection));
                $productrow = mysqli_fetch_array($selectq);
                echo '<ul class="tabs connect-tabs clearfix mb-20">';
                echo       "<li class='tab'><a href='#'>{$productrow['event_type']}</a></li>";
                echo '</ul>';
                ?>
            </div>
            <section class="ttm-sidebar clearfix ttm-sidebar-section ttm-bgcolor-dark-grey">
                <div class="container">
                    <!-- row -->
                    <div class="row ttm-sidebar-left">
                        <div class="col-lg-9 content-area">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <?php
                                    $propertyquery = mysqli_query($connection, "Select * From property_tbl Where event_id={$eid} AND property_id={$proid}") or die(mysqli_error($connection));
                                    while ($prow = mysqli_fetch_array($propertyquery)) {
                                        $property_imgs = $prow['property_imgs'];
                                        $data = explode(",", $property_imgs);
                                        echo    '<div class="carousel-item active">';
                                        echo        "<img class='d-block w-100' src='../Admin-panel/$data[0]' alt=''>";
                                        echo  '</div>';
                                        foreach ($data as $key => $value) {
                                            if ($key == 0) {
                                                continue;
                                            } else {
                                                echo    '<div class="carousel-item">';
                                                echo        "<img class='d-block w-100' src='../Admin-panel/$value' alt=''>";
                                                echo  '</div>';
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mt-10 mb-35 ttm-service-description">
                                        <?php
                                        $propertyquery = mysqli_query($connection, "Select * From property_tbl Where event_id={$eid} AND property_id={$proid}") or die(mysqli_error($connection));
                                        while ($prow = mysqli_fetch_array($propertyquery)) {
                                            echo "<h3>{$prow['property_name']}</h3>";
                                            echo "<p>{$prow['property_details']}</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>


                            <div class="featured-box padding-4 col-md-12 ttm-bgcolor-white box-shadow">
                                <div class="col-md-8 col-lg-8">
                                    <h3 style="text-align:center;">-:Choose Your Place:-</h3>
                                    <form id="contactform" class="row contactform wrap-form clearfix" method="post" action="#">
                                        <label class="col-md-12">
                                            <span class="ttm-form-control" style="color: black; text-align:center; font-weight: bold;">Property Name:
                                                <input class="text-input" name="name" type="text" value="<?php
                                                                                                            $propertyquery = mysqli_query($connection, "Select * From property_tbl Where event_id={$eid} AND property_id={$proid}") or die(mysqli_error($connection));
                                                                                                            $prow = mysqli_fetch_array($propertyquery);
                                                                                                            echo $prow['property_name'] ?>" readonly></span>
                                        </label>
                                        <label class="col-md-12">
                                            <span class="ttm-form-control" style="color: black; text-align:center; font-weight: bold;">Property Address:
                                                <input class="text-input" name="name" type="text" value="<?php
                                                                                                            $propertyquery = mysqli_query($connection, "Select * From property_tbl Where event_id={$eid} AND property_id={$proid}") or die(mysqli_error($connection));
                                                                                                            $prow = mysqli_fetch_array($propertyquery);
                                                                                                            echo $prow['property_address'] ?>" readonly></span>
                                        </label>

                                        <label class="col-md-6">
                                            <span class="ttm-form-control" style="color: black; text-align:center; font-weight: bold;">Opening Timing:
                                                <input class="text-input" name="price" type="text" value="<?php
                                                                                                            $propertyquery = mysqli_query($connection, "Select * From property_tbl Where event_id={$eid} AND property_id={$proid}") or die(mysqli_error($connection));
                                                                                                            $prow = mysqli_fetch_array($propertyquery);
                                                                                                            echo $prow['timing'] ?>" readonly></span>
                                        </label>
                                        <label class="col-md-6">
                                            <span class="ttm-form-control" style="color: black; text-align:center; font-weight: bold;">Price:
                                                <input class="text-input" name="price" type="text" value="<?php
                                                                                                            $propertyquery = mysqli_query($connection, "Select * From property_tbl Where event_id={$eid} AND property_id={$proid}") or die(mysqli_error($connection));
                                                                                                            $prow = mysqli_fetch_array($propertyquery);
                                                                                                            echo $prow['property_price'] ?>" readonly></span>
                                        </label>
                                    </form>
                                </div>
                            </div>

                            <br>
                            <br>
                            <div class="featured-box padding-6 col-md-12 ttm-bgcolor-white box-shadow">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4">
                                        <ul class="ttm-list ttm-list-style-icon ttm-textcolor-skincolor">
                                            <h4>Seating Capacity</h4>
                                            <?php
                                            $propertyquery = mysqli_query($connection, "Select * From property_tbl Where event_id={$eid} AND property_id={$proid}") or die(mysqli_error($connection));
                                            $prow = mysqli_fetch_array($propertyquery);
                                            echo    "<li><i class='fa fa-check'></i><span class='ttm-list-li-content'>Seating Cap: {$prow['seating_cap']}</span>";
                                            echo    '</li>';
                                            echo    "<li><i class='fa fa-check'></i><span class='ttm-list-li-content'>Standing Cap: {$prow['standing_cap']}</span></li>";
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <ul class="ttm-list ttm-list-style-icon ttm-textcolor-skincolor">
                                            <h4>Parking Information</h4>
                                            <li><i class="fa fa-check"></i><span class="ttm-list-li-content">Bike & Car</span>
                                            </li>
                                            <?php
                                            echo    "<li><i class='fa fa-check'></i><span class='ttm-list-li-content'>Capacity: {$prow['parking_cap']}</span></li>";
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <ul class="ttm-list ttm-list-style-icon ttm-textcolor-skincolor">
                                            <h4>Room Information</h4>
                                            <?php
                                            echo    "<li><i class='fa fa-check'></i><span class='ttm-list-li-content'>Room: {$prow['room']}</span></li>";
                                            echo    "<li><i class='fa fa-check'></i><span class='ttm-list-li-content'>Hall: {$prow['hall']}</span></li>";
                                            echo    "<li><i class='fa fa-check'></i><span class='ttm-list-li-content'>Main Stage: {$prow['main_stage']}</span></li>";
                                            ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="featured-box padding-6 col-md-12 ttm-bgcolor-white box-shadow">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <ul class="ttm-list ttm-list-style-icon ttm-textcolor-skincolor">
                                            <h4>Table/Chair</h4>
                                            <?php
                                            $propertyquery = mysqli_query($connection, "Select * From property_tbl Where event_id={$eid} AND property_id={$proid}") or die(mysqli_error($connection));
                                            $prow = mysqli_fetch_array($propertyquery);
                                            echo    "<li><i class='fa fa-check'></i><span class='ttm-list-li-content'>Table/Chair: {$prow['table_chair']}</span>";
                                            echo    '</li>';
                                            echo    "<li><i class='fa fa-check'></i><span class='ttm-list-li-content'>Sofa: {$prow['sofa']}</span></li>";
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <ul class="ttm-list ttm-list-style-icon ttm-textcolor-skincolor">
                                            <h4>Mic/Speaker</h4>
                                            <?php
                                            echo    "<li><i class='fa fa-check'></i><span class='ttm-list-li-content'>Mic/Speaker: {$prow['mic_speaker']}</span></li>";
                                            echo    "<li><i class='fa fa-check'></i><span class='ttm-list-li-content'>TV/Projector: {$prow['tv_projector']}</span></li>";
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="featured-box padding-6 col-md-12 ttm-bgcolor-white box-shadow">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <ul class="ttm-list ttm-list-style-icon ttm-textcolor-skincolor">
                                            <h4>Facility Provide</h4>
                                            <?php
                                            $facilities = $prow['facilities'];
                                            $data = explode(",", $facilities);
                                            foreach ($data as $value) {
                                                if ($value < 1) continue;
                                                echo   "<li><i class='fa fa-check'></i><span class='ttm-list-li-content'>$value</span>
                                                    </li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <ul class="ttm-list ttm-list-style-icon ttm-textcolor-skincolor">
                                            <h4>Other Information</h4>
                                            <?php
                                            $other_info = $prow['other_info'];
                                            $data1 = explode(",", $other_info);
                                            foreach ($data1 as $value1) {
                                                if ($value1 < 1) continue;

                                                echo   "<li><i class='fa fa-check'></i><span class='ttm-list-li-content'>$value1</span>
                                                           </li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="mt-30">
                                        <form method='GET' action='cart-process.php'>
                                            <input type='hidden' name='proid' value='<?php echo $proid ?>'>
                                            <button id='submit' name='add-to-cart' type='submit' class='cart_button ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black ml-30 mt-20'>Add to cart</button>
                                            <?php
                                            echo "<a class='ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-skincolor ml-30 mt-20' href='packages.php?eid={$prow['event_id']}&proid={$prow['property_id']}'>Choose Package</a>";
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php
                        $equery = mysqli_query($connection, "Select * from property_tbl where event_id={$eid}") or die(mysqli_error($connection));
                        echo '<div class="col-lg-3 sidebar sidebar-left widget-area">';
                        echo '<aside class="widget widget-nav-menu box-shadow">';
                        echo '<ul class="widget-menu">';
                        while ($row = mysqli_fetch_array($equery)) {
                            echo "<li><a href='event-details.php?eid={$row['event_id']}&proid={$row['property_id']}'>{$row['property_name']}</a></li>";
                        }
                        echo '</ul>';
                        echo '</aside>';
                        echo '</div>';
                        ?>
                    </div><!-- row end -->
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