<?php
session_start();
include 'conn.php';
$msg = "";
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

if ($_POST) {
    $old_pass = mysqli_real_escape_string($connection, $_POST['old_password']);
    $new_pass = mysqli_real_escape_string($connection, $_POST['password']);
    $confirm_pass = mysqli_real_escape_string($connection, $_POST['confirm_password']);

    $oldpassquery = mysqli_query($connection, "select password from user_tbl where user_id='{$_SESSION['user_id']}'") or die(mysqli_error($connection));
    $oldpassfromdb = mysqli_fetch_array($oldpassquery);

    if ($oldpassfromdb['password'] == $old_pass) {
        if ($new_pass == $confirm_pass) {
            if ($old_pass == $new_pass) {
                $msg = "<div class='alert alert-warning' role='alert'> New and old Password must be different </div>";
            } else {
                $updateq = mysqli_query($connection, "update user_tbl set password='{$new_pass}' where user_id='{$_SESSION['user_id']}'") or die(mysqli_error($connection));
                if ($updateq) {
                    $msg = "<div class='alert alert-success' role='alert'>Password change sucessfully</div>";
                }
            }
        } else {
            $msg = '<div class="alert alert-warning" role="alert"> New and confirm Password must be same </div>';
        }
    } else {
        $msg = "<div class='alert alert-warning' role='alert'> Old Password doesn't match </div>";
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
    <title>Change Password</title>

    <?php include 'themepart/style.php' ?>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/validate-form.js"></script>
    <style>
        .error {
            color: #fd226a;
        }
    </style>

</head>


<body>

    <!--page start-->
    <div class="page">

        <?php include 'themepart/Header.php' ?>


        <!--syte-main start-->
        <div class="site-main">
            <!--contact-intro-section-start-->
            <section class="ttm-row contact-details-section clearfix">
            </section>
            <!--contact-intro-section-end-->
            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-10">
                            <div class="wrap d-md-flex" style="display: flex; justify-content:center;">
                                <div class="login-wrap p-4 p-lg-5">
                                    <div class="d-flex">
                                        <div class="w-100">
                                            <h3 class="mb-4">Change Password</h3>
                                        </div>
                                    </div>
                                    <form action="#" id="contactform" class="signin-form" method="POST">
                                        <div class="form-group mb-3">
                                            <?php echo $msg; ?>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label" for="name"> Old Password </label>
                                            <input type="password" class="form-control" name="old_password" placeholder="Old Password" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label" for="name"> New Password </label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label" for="name"> Confirm Password </label>
                                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="form-control btn btn-primary submit px-3">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div><!-- site-main end -->



    </div><!-- page end -->

    <!--back-to-top start-->
    <a id="totop" href="#top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!--back-to-top end-->

    <!--footer-->
    <footer class="footer widget-footer bg-img11 ttm-bgcolor-black ttm-bg ttm-bgimage-yes clearfix">
        <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>

        </div>
        <div class="second-footer">
            <div class="container">
                <div class="second-footer-inner">
                    <div class="row">
                        <div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="widget widget-out-link clearfix">
                                <h4 class="widget-title">Contact Us</h4>
                                <ul class="widget-contact">
                                    <li><i class="fa fa-map-marker"></i>XYZ Bulding<br>Ahmedabad,Gujarat,India</li>
                                    <li><i class="fa fa-envelope-o"></i><a href="#">planway_onlin@gmail.com</a></li>
                                    <li><i class="fa fa-phone"></i>Phone: (+91) 123 456 7890 <br>Support: (+91) 123 456 7890 </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="widget widget_nav_menu clearfix">
                                <h4 class="widget-title">Our Services </h4>
                                <ul class="menu-footer-services">
                                    <li><a href="Event.php">Our Event</a></li>
                                    <li><a href="Packages.php">Our Packages</a></li>
                                    <li><a href="About.php">Team Members</a></li>
                                    <li><a href="About.php">About Us</a></li>
                                    <li><a href="Package_details.php">Pricing & Terms</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12 ttm-footer2-left">
                        <div class="company-info">
                            <div class="company-logo">
                                <img src="images/logo-img.png" alt="company-logo" height="45">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 col-md-4 ttm-footer2-right">
                        <P style="padding:5%">Copyright © 2022 PresentUp. All rights reserved.</P>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer-END-->



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