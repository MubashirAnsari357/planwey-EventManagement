<?php
session_start();
require "conn.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$msg = "";
if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];
    $cancelq = mysqli_query($connection, "UPDATE booking_tbl SET booking_status='Cancelled' where booking_id='{$cid}'") or die(mysqli_error($connection));

    if ($cancelq) {
        $msg = '<div class="alert alert-danger" role="alert">
				Booking Cancelled Successfully</div> ';
    }
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
    <title>Planwey &#8211; My Booking</title>

    <?php include_once 'themepart/style.php' ?>

</head>

<body>

    <!--page start-->
    <div class="page">

        <?php include_once 'themepart/Header.php' ?>

        <div class="ttm-page-title-row text-center">
            <div class="section-overlay"></div>
            <div class="title-box text-center">
                <div class="container">
                    <div class="page-title-heading">
                        <h1 class="title">My Booking</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="Home.php"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white">My Booking</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--site-main-->
        <div class="site-main">

            <!-- cart-section -->
            <section class="ttm-row cart-section ttm-bgcolor-dark-grey break-991-colum clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- ttm-cart-form -->
                            <h3>Your Booking</h3>
                            <form class="ttm-cart-form" action="packages.php" method="post">
                                <table class="shop_table shop_table_responsive">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Booking ID</th>
                                            <th class="product-name">Property Name</th>
                                            <th class="product-name">Package Name</th>
                                            <th class="product-quantity">Booking Status</th>
                                            <th class="product-subtotal">Booking Date</th>
                                            <th class="product-subtotal">Amount</th>
                                            <th class="product-subtotal">Cancel Booking</th>
                                            <th class="product-subtotal">Track Booking</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $user_id = $_SESSION['user_id'];
                                        // $query = "SELECT * FROM booking_tbl WHERE user_id='{$user_id}'";
                                        $query = "SELECT
										`booking_tbl`.`booking_id`
										, `property_tbl`.`property_name`
										, `package_tbl`.`package_name`
										, `booking_tbl`.`booking_name`
										, `booking_tbl`.`booking_email`
										, `booking_tbl`.`booking_phone`
										, `booking_tbl`.`booking_date`
										, `booking_tbl`.`no_of_guests`
										, `booking_tbl`.`function_date`
										, `booking_tbl`.`function_time`
										, `booking_tbl`.`booking_status`
										, `booking_tbl`.`total_price`
									FROM
										`property_tbl`
										INNER JOIN `booking_tbl` 
											ON (`property_tbl`.`property_id` = `booking_tbl`.`property_id`)
										INNER JOIN `package_tbl` 
											ON (`package_tbl`.`package_id` = `booking_tbl`.`package_id`)
									WHERE user_id='{$user_id}'";
                                        $selectq = mysqli_query($connection, $query) or die(mysqli_error($connection));
                                        while ($productrow = mysqli_fetch_array($selectq)) {
                                            echo "<tr class='cart_item'>
 
                                             <td class='product-thumbnail'>
                                             </td>
                                             <td class='product-name' data-title='Product'>
                                             {$productrow['booking_id']}
                                             </td>
                                             <td class='product-name' data-title='Product'>
                                             {$productrow['property_name']}
                                             </td>
                                             <td class='product-name' data-title='Product'>
                                             {$productrow['package_name']}
                                             </td>
                                             
                                             <td class='product-quantity' data-title=''>
                                             {$productrow['booking_status']}
                                             </td>
                                             <td class='product-subtotal' data-title='Total'>
                                             {$productrow['booking_date']}
                                             </td>
                                             <td class='product-subtotal' data-title='Total'>
                                                 <span class='Price-amount'>
                                                     <span class='Price-currencySymbol'>₹</span>{$productrow['total_price']}
                                                 </span>
                                             </td>
                                             <td class='product-name' data-title='Product'>
                                                 <a href='view-booking.php?cid={$productrow['booking_id']}'>CANCEL</a>
                                             </td>
                                             <td class='product-name' data-title='Product'>
                                                 <a href='progress.php?bid={$productrow['booking_id']}'>PROGRESS</a>
                                             </td>
                                         </tr>";
                                        }
                                        echo $msg;
                                        ?>
                                    </tbody>
                                </table>
                            </form><!-- ttm-cart-form end -->

                        </div>
                    </div>
                </div>
            </section>
            <!-- cart-section end-->

        </div>
        <!--site-main end-->

        <?php include_once 'themepart/Footer.php' ?>

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