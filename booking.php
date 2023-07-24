<?php
session_start();
require "conn.php";
error_reporting(E_ERROR | E_PARSE);
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$msg = "";
if ($_POST) {
    $user_id = $_SESSION['user_id'];
    $proid = $_SESSION['property_id'];
    $pkgid = $_SESSION['package_id'];
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $guest = mysqli_real_escape_string($connection, $_POST['guest']);
    $f_date = mysqli_real_escape_string($connection, $_POST['date']);
    $f_time = mysqli_real_escape_string($connection, $_POST['time']);
    $totalprice = mysqli_real_escape_string($connection, $_POST['price']);
    $query = "INSERT INTO booking_tbl (user_id, property_id, package_id, booking_name, booking_email, booking_phone, no_of_guests, booking_date, function_date, function_time, booking_status, total_price) VALUE('{$user_id}','{$proid}','{$pkgid}','{$name}','{$email}','{$phone}','{$guest}',current_timestamp(),'{$f_date}','{$f_time}','Pending','{$totalprice}')";
    $bookingq = mysqli_query($connection, $query) or die(mysqli_error($connection));
     if ($bookingq) {
         $msg = '<div class="alert alert-success" role="alert">
         Your booking has been placed </div>';
         header("Location:payment.php");
     }

    unset($_SESSION['procart']);
    unset($_SESSION['pkgcart']);
    unset($_SESSION['qtycart']);
    unset($_SESSION['property_id']);
    unset($_SESSION['property_name']);
    unset($_SESSION['package_id']);
    unset($_SESSION['package_name']);
    unset($_SESSION['grandtotal']);
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
    <title>Planwey &#8211; Booking</title>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/validate-form.js"></script>
    <style>
        .error {
            color: #fd226a;
        }
    </style>

    <?php include_once 'themepart/style.php' ?>
</head>

<body>

    <!--page start-->
    <div class="page">
        <?php include_once 'themepart/Header.php' ?>

        <!--page-title start-->
        <div class="ttm-page-title-row text-center">
            <div class="section-overlay"></div>
            <div class="title-box text-center">
                <div class="container">
                    <div class="page-title-heading">
                        <h1 class="title">BOOKING</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="home.php"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span><a title="Homepage" href="Cart.php">&nbsp;&nbsp;Cart</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white">Booking</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--page-title END-->

        <!--site-main-->
        <div class="site-main">

            <!-- checkout-section -->
            <section class="ttm-row checkout-section ttm-bgcolor-grey break-991-colum clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo $msg; ?>
                            <form id="contactform" name="checkout" class="checkout row box-shadow1" method="POST" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    <div class="billing-fields">
                                        <h3>Billing details</h3>
                                        <?php
                                        $propertyname = $_SESSION['property_name'];
                                        $packagename = $_SESSION['package_name'];
                                        $grandtotal = $_SESSION['grandtotal'];
                                        echo "
                                        <p class='checkout-form'>
                                            <label>Property Name&nbsp;<abbr class='required' title='required'>*</abbr></label>
                                            <input type='text' class='input-text ' name='property' placeholder='' value='$propertyname' readonly>
                                        </p>
                                        <p class='checkout-form'>
                                            <label>Package Name&nbsp;
                                                <span class='optional'>(optional)</span>
                                            </label>
                                            <input type='text' class='input-text ' name='' placeholder='' value='$packagename' readonly>
                                        </p>
                                        <p class='checkout-form'>
                                            <label>Total Number Of Guest&nbsp;<abbr class='required' title='required'>*</abbr></label>
                                            <input type='number' class='input-text ' name='guest' placeholder='' value=''>
                                        </p>
                                        <p class='checkout-form'>
                                            <label>Customer Name&nbsp;<abbr class='required' title='required'>*</abbr></label>
                                            <input type='text' class='input-text ' name='name' placeholder='' value=''>
                                        </p>
                                        <p class='checkout-form'>
                                            <label>Email address&nbsp;<abbr class='required' title='required'>*</abbr></label>
                                            <input type='email' class='input-text ' name='email' placeholder='' value=''>
                                        </p>
                                        <p class='checkout-form'>
                                            <label>Phone&nbsp;<abbr class='required' title='required'>*</abbr></label>
                                            <input type='tel' class='input-text ' name='phone' placeholder='' value=''>
                                        </p>
                                        <p class='checkout-form'>
                                            <label>Date Of Event &nbsp;<abbr class='required' title='required'>*</abbr></label>
                                            <input type='date' class='input-text ' name='date' value=''>
                                        </p>
                                        <p class='checkout-form'>
                                            <label>Time Of Event&nbsp;<abbr class='required' title='required'>*</abbr></label>
                                            <input type='time' class='input-text ' name='time' value=''>
                                        </p>
                                        <p class='checkout-form'>
                                            <label>Total Price&nbsp;<abbr class='required' title='required'>*</abbr></label>
                                            <input type='number' class='input-text ' name='price' value='$grandtotal' readonly>
                                        </p>";
                                        ?>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="additional-fields">
                                        <h3>Additional Service</h3>
                                        <div class="additional-fields-wrapper">
                                            <p class="checkout-form" id="order_comments_field">
                                                <label>Extra Service&nbsp;<span class="optional">(optional)</span></label>
                                                <textarea name="order_comments" class="input-text " id="order_comments" placeholder="If you need additional services So, you can provides information regarding your need."></textarea>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div id="payment" class="checkout-payment">
                                        <ul class="payment_methods">
                                            <li class="payment_method_ppec_paypal">

                                                <div class="payment_box">
                                                    <p> You can pay with your credit card, debit card or net banking.</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="checkout-form place-order">
                                            <button type="submit" class="button shape-round" name="checkout_place_order" id="place_order" value="Place order" data-value="Place order">Continue to payment</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
        </div>
        </section>
        <!-- checkout-section end -->

    </div>
    <!--site-main end-->

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