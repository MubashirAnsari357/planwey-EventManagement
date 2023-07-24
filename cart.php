<?php
session_start();
require "conn.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
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
    <title>Planwey &#8211; Cart</title>

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
                        <h1 class="title">CART</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="Home.php"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white">Cart</span>
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
                            <form class="ttm-cart-form" action="packages.php" method="post">
                                <table class="shop_table shop_table_responsive">

                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Hall/Pacakge</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_GET['prid'])) {
                                            $rid = $_GET['prid'];
                                            unset($_SESSION['procart'][$rid]);
                                        }
                                        if (isset($_SESSION['procart']) && !empty($_SESSION['procart'])) {
                                            foreach ($_SESSION['procart'] as $key => $value) {
                                                $proquery = mysqli_query($connection, "SELECT * FROM property_tbl WHERE property_id='{$value}'") or die(mysqli_error($connection));
                                                $prorow = mysqli_fetch_array($proquery);
                                                $_SESSION["property_id"] = $prorow['property_id'];
                                                $_SESSION["property_name"] = $prorow['property_name'];
                                                echo "<tr class='cart_item'>
                                                <td class='product-remove'>
                                                    <a href='?prid=$key' class='remove'>×</a>
                                                </td>
                                                <td class='product-thumbnail'>
    
                                                </td>
                                                <td class='product-name' data-title='Product'>
                                                    <a href='product-details.html'>{$prorow['property_name']}</a>
                                                </td>
                                                <td class='product-price'>
                                                    <span class='Price-amount' data-title='Price'>
                                                        <span class='Price-currencySymbol'>₹</span>{$prorow['property_price']}
                                                    </span>
                                                </td>
                                                <td class='product-quantity' data-title='Quantity'>
                                                    <div class='quantity'>
                                                        <input type='number' class='input-text' value='1' min='0' title='Qty' size='6' readonly>
                                                    </div>
                                                </td>
                                                <td class='product-subtotal' data-title='Total'>
                                                    <span class='Price-amount'>
                                                        <span class='Price-currencySymbol'>₹</span>{$prorow['property_price']}
                                                    </span>
                                                </td>
                                            </tr>";
                                            }
                                        }
                                        ?>

                                        <?php
                                        if (isset($_GET['rid'])) {
                                            $rid = $_GET['rid'];
                                            unset($_SESSION['pkgcart'][$rid]);
                                        }
                                        if (isset($_SESSION['pkgcart']) && !empty($_SESSION['pkgcart'])) {
                                            foreach ($_SESSION['pkgcart'] as $key => $value) {
                                                $pkgquery = mysqli_query($connection, "SELECT * FROM package_tbl WHERE package_id='{$value}'") or die(mysqli_error($connection));
                                                $pkgrow = mysqli_fetch_array($pkgquery);
                                                $ttl =  $pkgrow['photographer_price'] + $pkgrow['dj_price'];
                                                $_SESSION["package_id"] = $pkgrow['package_id'];
                                                $_SESSION["package_name"] = $pkgrow['package_name'];
                                                echo "<tr class='cart_item'>
                                                <td class='product-remove'>
                                                    <a href='?rid=$key' class='remove'>×</a>
                                                </td>
                                                <td class='product-thumbnail'>
    
                                                </td>
                                                <td class='product-name' data-title='Product'>
                                                    <a href='product-details.html'>{$pkgrow['package_name']}</a>
                                                </td>
                                                <td class='product-price'>
                                                    <span class='Price-amount' data-title='Price'>
                                                        <span class='Price-currencySymbol'>₹</span>$ttl
                                                    </span>
                                                </td>
                                                <td class='product-quantity' data-title='Quantity'>
                                                    <div class='quantity'>
                                                        <input type='number' class='input-text' value='1' min='0' title='Qty' size='6' readonly>
                                                    </div>
                                                </td>
                                                <td class='product-subtotal' data-title='Total'>
                                                    <span class='Price-amount'>
                                                        <span class='Price-currencySymbol'>₹</span>$ttl
                                                    </span>
                                                </td>
                                            </tr>";
                                            }
                                        }
                                        ?>
                                        <?php
                                        if (isset($_GET['frid'])) {
                                            $frid = $_GET['frid'];
                                            unset($_SESSION['pkgcart'][$frid]);
                                        }
                                        if (isset($_SESSION['pkgcart']) && !empty($_SESSION['pkgcart'])) {
                                            foreach ($_SESSION['pkgcart'] as $key => $value) {
                                                $pkgquery = mysqli_query($connection, "SELECT * FROM package_tbl WHERE package_id='{$value}'") or die(mysqli_error($connection));
                                                $pkgrow = mysqli_fetch_array($pkgquery);
                                                $ttlprice = 0;
                                                $qty = $_SESSION['qtycart'][$key];
                                                $ttlprice = $pkgrow['food_price'] * $qty;
                                                echo "<tr class='cart_item'>
                                                <td class='product-remove'>
                                                    <a href='?rid=$key' class='remove'>×</a>
                                                </td>
                                                <td class='product-thumbnail'>
    
                                                </td>
                                                <td class='product-name' data-title='Product'>
                                                    <a href='product-details.html'>{$pkgrow['food_type']}</a>
                                                </td>
                                                <td class='product-price'>
                                                    <span class='Price-amount' data-title='Price'>
                                                        <span class='Price-currencySymbol'>₹</span>{$pkgrow['food_price']}
                                                    </span>
                                                </td>
                                                <td class='product-quantity' data-title='Quantity'>
                                                    <div class='quantity'>
                                                        <input type='number' class='input-text' value='$qty' min='0' title='Qty' name='quantity' size='6' readonly>
                                                    </div>
                                                </td>
                                                <td class='product-subtotal' data-title='Total'>
                                                    <span class='Price-amount'>
                                                        <span class='Price-currencySymbol'>₹</span>$ttlprice
                                                    </span>
                                                </td>                                               
                                                <tr>";
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </form><!-- ttm-cart-form end -->
                            <!-- cart-collaterals -->
                            <div class="cart-collaterals">
                                <div class="cart_totals ">
                                    <h3>Cart totals</h3>
                                    <?php
                                    
                                    $subtotal = $prorow['property_price'] + $ttl + $ttlprice;
                                    $gstpercent = 15;
                                    $gst = $subtotal * ($gstpercent/100);
                                    $grandtotal = $subtotal + $gst;
                                    $_SESSION['grandtotal'] = $grandtotal;
                                    echo "<table class='shop_table shop_table_responsive'>
                                        <tbody>
                                            <tr class='cart-subtotal'>
                                                <th>Subtotal</th>
                                                <td data-title='Subtotal'>
                                                    <span class='Price-amount'>
                                                        <span class='Price-currencySymbol'>₹</span>$subtotal
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class='order-total'>
                                                <th>GST($gstpercent%)</th>
                                                <td data-title='Total'>
                                                    <strong><span class='Price-amount'>
                                                            <span class='Price-currencySymbol'>₹</span>$gst</span>
                                                    </strong>
                                                </td>
                                            </tr>
                                            <tr class='order-total'>
                                                <th>Total</th>
                                                <td data-title='Total'>
                                                    <strong><span class='Price-amount'>
                                                            <span class='Price-currencySymbol'>₹</span>$grandtotal</span>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>"
                                    ?>
                                    <div class="proceed-to-checkout">
                                        <a href="Booking.php" class="checkout-button button shape-round">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div><!-- cart-collaterals end-->
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