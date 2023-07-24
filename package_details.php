<?php session_start();
require "conn.php";
error_reporting(E_ERROR | E_PARSE);
if (isset($_GET['proid']) and ($_GET['pkgid'])) {
    $proid = $_GET['proid'];
    $pkgid = $_GET['pkgid'];
    $packageq = mysqli_query($connection, "Select * From package_tbl WHERE package_id={$pkgid} AND property_id={$proid}");
} else {
    header("Location: Packages.php");
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
    <title>Planwey &#8211; Pacakge Details</title>


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
                        <h1 class="title">PACKAGE DETAILS</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="Home.php"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span><a title="Packages" href="Packages.php">&nbsp;&nbsp;Packages</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white">Package Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--page-title end-->
        <!--site-main-->
        <div class="site-main">

            <section class="ttm-sidebar clearfix ttm-sidebar-section product-details-section ttm-bgcolor-dark-grey">
                <div class="container">
                    <!-- row -->
                    <div class="row ttm-sidebar-right">
                        <div class="col-lg-12 col-md-12 content-area">
                            <div class="ttm-single-product-details product box-shadow1">
                                <div class="ttm-single-product-info clearfix">
                                    <div class="product-gallery images">

                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            
                                            <div class="carousel-inner">
                                                <?php
                                                if (isset($_GET['proid']) and ($_GET['pkgid'])) {
                                                    $proid = $_GET['proid'];
                                                    $pkgid = $_GET['pkgid'];
                                                    $packageq = mysqli_query($connection, "Select * From package_tbl WHERE package_id={$pkgid} AND property_id={$proid}");
                                                } else {
                                                    header("Location: Packages.php");
                                                }
                                                while ($packagerow = mysqli_fetch_array($packageq)) {
                                                    $package_imgs = $packagerow['package_imgs'];
                                                    $data = explode(",", $package_imgs);
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
                                           
                                        </div>
                                    </div>
                                    <div class="summary entry-summary">
                                        <?php
                                        $packageq = mysqli_query($connection, "Select * From package_tbl WHERE package_id={$pkgid} AND property_id={$proid}");
                                        $packagerow = mysqli_fetch_array($packageq);
                                        echo "<h3 class='product_title entry-title'>{$packagerow['package_name']}</h3>";
                                        $ttlrating = mysqli_query($connection, "SELECT * FROM feedback_tbl WHERE package_id={$pkgid}") or die(mysqli_error($connection));
                                        $countavg = mysqli_num_rows($ttlrating);
                                        $avgquery = mysqli_query($connection, "SELECT Round(AVG(feedback_rating), 1) as avg_rating FROM feedback_tbl WHERE package_id={$pkgid}") or die(mysqli_error($connection));
                                        $avgrow = mysqli_fetch_assoc($avgquery);
                                        $avgrating = $avgrow['avg_rating'];
                                        echo "<div class='product-rating clearfix'>
                                            <ul class='star-rating clearfix'>";
                                            for ($i = 1; $i <= $avgrating; $i++) {
                                                echo "<li class='fa fa-star'></li>";
                                            }
                                            for ($j = 5; $j > $avgrating; $j--) {
                                                echo "<li class='fa fa-star-o'></li>";
                                            }      
                                        echo   "</ul>
                                            <span> $avgrating out of 5 </span>
                                            <a href='#reviews' class='review-link' rel='nofollow'>(<span class='count'>$countavg</span> customer review)</a>
                                        </div>";
                                        ?>
                                        <p class="price">
                                            <span class="Price-amount amount">
                                                <?php
                                                $packageq = mysqli_query($connection, "Select * From package_tbl WHERE package_id={$pkgid} AND property_id={$proid}");
                                                $packagerow = mysqli_fetch_array($packageq);
                                                $totalprice = $packagerow['dj_price'] + $packagerow['photographer_price'];
                                                echo        "<span class='Price-currencySymbol'>₹</span>$totalprice";
                                                ?>
                                            </span>
                                        </p>

                                        <form class="cart" action="cart-process.php" method="get" enctype="multipart/form-data">
                                            <input type="hidden" name="pkgid" value="<?php echo $pkgid ?>">
                                            <input type="hidden" name="proid" value="<?php echo $proid ?>">
                                            <input type="hidden" name="qty" value="<?php echo $proid ?>">
                                            <h6> Food Quantity </h6>
                                            <div class="quantity"><label class="screen-reader-text">Quantity</label>
                                                <input type="number" id="quantity_5c357ca137d75" class="input-text qty text" step="1" min="100" max="1500" name="qty" value="100" title="Qty" size="4">
                                            </div>
                                            <button id="submit" name="add-to-cart" type="submit" class="cart_button ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black" title="Add To Cart">Add to cart</button>
                                        </form>

                                    </div>
                                </div>
                                <div class="ttm-tabs tabs-for-single-products" data-effect="fadeIn">
                                    <ul class="tabs clearfix">
                                        <li class="tab active"><a href="#">Event Theme</a></li>
                                        <li class="tab"><a href="#">Additional information</a></li>
                                        <li class="tab"><a href="#">Reviews</a></li>
                                    </ul>
                                    <div class="content-tab ttm-bgcolor-white">
                                        <!-- content-inner -->
                                        <div class="content-inner">
                                            <?php
                                            $packageq = mysqli_query($connection, "Select * From package_tbl WHERE package_id={$pkgid} AND property_id={$proid}");
                                            $packagerow = mysqli_fetch_array($packageq);
                                            echo "<h2>{$packagerow['package_name']}</h2>
                                        <p> {$packagerow['package_desc']}</p>";
                                            ?>
                                        </div><!-- content-inner end-->
                                        <div class="content-inner">
                                            <h2>Additional information</h2>
                                            <table class="shop_attributes">
                                                <tbody>
                                                    <tr>
                                                        <th>Food</th>
                                                        <td>
                                                            <table class="shop_attributes">
                                                                <thead>
                                                                    <tr>
                                                                        <th><?php $packageq = mysqli_query($connection, "Select * From package_tbl WHERE package_id={$pkgid} AND property_id={$proid}");
                                                                            $packagerow = mysqli_fetch_array($packageq);
                                                                            echo "{$packagerow['food_type']}";
                                                                            ?></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $packageq = mysqli_query($connection, "Select * From package_tbl WHERE package_id={$pkgid} AND property_id={$proid}");
                                                                    $packagerow = mysqli_fetch_array($packageq);
                                                                    $food_details = $packagerow['food_details'];
                                                                    $fooddetails = explode(",", $food_details);
                                                                    foreach ($fooddetails as $value) {
                                                                        echo    '<tr>';
                                                                        echo        "<td>$value</td>";
                                                                        echo    '</tr>';
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <?php
                                                                        echo "<th>₹{$packagerow['food_price']}/Plate</th>";
                                                                        ?>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>DJ System</th>
                                                        <?php
                                                        echo "<td>₹ {$packagerow['dj_price']} (Basic System)</td>";
                                                        ?>
                                                    </tr>

                                                    <tr>
                                                        <th>Photo/Video Grapher</th>
                                                        <?php
                                                        echo "<td>₹ {$packagerow['photographer_price']}  (*Include Photo Albumb And Video Clips)</td>";
                                                        ?>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- content-inner -->
                                        <div class="content-inner">
                                            <div id="reviews" class="woocommerce-Reviews">
                                                <div id="comments">
                                                    <?php
                                                    $pkgid = $_GET['pkgid'];
                                                    // $rrquery = "SELECT * FROM feedback_tbl, user_tbl WHERE package_id={$pkgid}";
                                                    $rrquery = "SELECT
                                                    `user_tbl`.`full_name`
                                                    , `feedback_tbl`.`feedback_date`
                                                    , `feedback_tbl`.`feedback_desc`
                                                    , `feedback_tbl`.`feedback_rating`
                                                FROM
                                                    `planwey`.`user_tbl`
                                                    INNER JOIN `planwey`.`feedback_tbl` 
                                                        ON (`user_tbl`.`user_id` = `feedback_tbl`.`user_id`) WHERE package_id='{$pkgid}'";
                                                    $reviewquery = mysqli_query($connection, $rrquery) or die(mysqli_error($connection));
                                                    $count = mysqli_num_rows($reviewquery);
                                                    echo "<h2 class='woocommerce-Reviews-title'>$count review for <span>this package</span></h2>";
                                                    while ($reviewrow = mysqli_fetch_array($reviewquery)) {
                                                        echo "<ol class='commentlist'>
                                                            <li class='review'>
                                                                <div class='comment_container'>
                                                                    <div class='comment-text'>
                                                                        <ul class='star-rating'>";
                                                        $ratingstar = $reviewrow['feedback_rating'];
                                                        for ($i = 1; $i <= $ratingstar; $i++) {
                                                            echo "<li class='fa fa-star'></li>";
                                                        }
                                                        for ($j = 5; $j > $ratingstar; $j--) {
                                                            echo "<li class='fa fa-star-o'></li>";
                                                        }
                                                        echo "</ul>
                                                                        <p class='meta'>
                                                                            <strong class='eview__author'>{$reviewrow['full_name']} </strong><span class='review__dash'>–</span>
                                                                            <time class='woocommerce-review__published-date' datetime='2018-11-01T04:58:58+00:00'>{$reviewrow['feedback_date']}</time>
                                                                        </p>
                                                                        <div class='description'>
                                                                            <p>{$reviewrow['feedback_desc']}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ol>";
                                                    }
                                                    ?>
                                                </div>
                                                <div id="review_form_wrapper">
                                                    <div class="comment-respond">
                                                        <span class="comment-reply-title">Add a review
                                                        </span>
                                                        <?php
                                                        $msg = "";
                                                        if (isset($_POST['feed_back'])) {
                                                            $user_id = $_SESSION['user_id'];
                                                            $pkgid = $_GET['pkgid'];
                                                            $checkpurchaseq = mysqli_query($connection, "SELECT * FROM booking_tbl WHERE user_id='{$user_id}' AND package_id='{$pkgid}'") or die(mysqli_error($connection));
                                                            $checkpurchaserow = mysqli_num_rows($checkpurchaseq);
                                                            if($checkpurchaserow < 1)
                                                            {
                                                                $msg = '<div class="alert alert-danger" role="alert">
                                                                You need to Purchase this Package to give feedback</div> ';
                                                            } 
                                                            else {
                                                                $rating = ($_POST['rating']);
                                                                $review = mysqli_real_escape_string($connection, $_POST['review']);
                                                                $result = mysqli_query($connection, "SELECT * from feedback_tbl WHERE user_id = '{$user_id}' AND package_id = '{$pkgid}'") or die(mysqli_error($connection));;
                                                                $rows = mysqli_num_rows($result);
                                                                if ($rows >= 1) {
                                                                    $msg = '<div class="alert alert-danger" role="alert">
                                                                            Feedback already taken </div> ';
                                                                } else {
                                                                    $reviewq = mysqli_query($connection, "INSERT INTO feedback_tbl (user_id, package_id, feedback_date, feedback_rating, feedback_desc) VALUES('{$user_id}','{$pkgid}', current_timestamp(), '{$rating}', '{$review}')") or die(mysqli_error($connection));
                                                                    if ($reviewq) {
                                                                        $msg = '<div class="alert alert-success" role="alert">
                                                                                Thanks for Your Feedback </div> ';
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        echo $msg;
                                                        ?>

                                                        <form action="#" method="post" id="commentform" class="comment-form" novalidate="">
                                                            <p class="comment-notes">
                                                                <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                                                            </p>
                                                            <div class="comment-form-rating">
                                                                <label for="rating">Your rating<span class="required">*</span></label>
                                                                <!-- <ul class="stars">
                                                                    <li class="fa fa-star-o"></li>
                                                                    <li class="fa fa-star-o"></li>
                                                                    <li class="fa fa-star-o"></li>
                                                                    <li class="fa fa-star-o"></li>
                                                                    <li class="fa fa-star-o"></li>
                                                                </ul> -->
                                                                <select name="rating" id="rating" required="" tabindex="-1">
                                                                    <option value="">Rate…</option>
                                                                    <option value="5">Perfect</option>
                                                                    <option value="4">Good</option>
                                                                    <option value="3">Average</option>
                                                                    <option value="2">Not that bad</option>
                                                                    <option value="1">Very poor</option>
                                                                </select>
                                                            </div>
                                                            <?php
                                                            if (isset($_SESSION['user_id'])) {
                                                                $temp = $_SESSION['username'];
                                                                $username = strtoupper($temp);
                                                            }
                                                            echo "<h5>Hi, $username Give your review here :)</h5>";
                                                            ?>
                                                            <p class="comment-form-comment">
                                                                <label for="comment">Your review&nbsp;<span class="required">*</span></label>
                                                                <textarea id="comment" name="review" cols="45" rows="8" required=""></textarea>
                                                            </p>
                                                            <p class="form-submit">
                                                                <input name="feed_back" type="submit" class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black" value="Submit">
                                                            </p>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

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