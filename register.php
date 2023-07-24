<?php
include 'conn.php';
$msg = "";
if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $dob = mysqli_real_escape_string($connection, $_POST['dob']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $state = mysqli_real_escape_string($connection, $_POST['stt']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $email_id = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $mobile_no = mysqli_real_escape_string($connection, $_POST['phone']);

    $selecte = mysqli_query($connection, "SELECT * FROM user_tbl WHERE email_id = '{$email_id}'") or die(mysqli_error($connection));
    $counte = mysqli_num_rows($selecte);
    if ($counte >= 1) {
        $msg = '<div class="alert alert-danger" role="alert">
						Email Already Exists!! </div> ';
    } else {
        $insertq = mysqli_query($connection, "INSERT INTO user_tbl (full_name,dob,address,city,state,gender,email_id,password,mobile_no)
        VALUE ('{$name}','{$dob}','{$address}','{$city}','{$state}','{$gender}','{$email_id}','{$password}','{$mobile_no}')") or die(mysqli_error($connection));
        if ($insertq) {
            $msg = '<div class="alert alert-success" role="alert">
						Registered Successfully </div> ';

            $sql = "SELECT user_id, full_name, email_id FROM user_tbl WHERE email_id = '$email_id' AND password = '$password'";
            $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    session_start();
                    $_SESSION["username"] = $row['full_name'];
                    $_SESSION["user_id"] = $row['user_id'];
                }
            }
            header("Refresh: 3; URl=home.php");
        }
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
    <title>Register</title>

    <?php include 'themepart/style.php' ?>
    <script src="js/cities.js"></script>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/validate-form.js"></script>
</head>


<body>

    <!--page start-->
    <div class="page">
        <!--page start-->
        <div class="page">

            <!-- preloader start -->
            <div id="preloader">
                <div id="status">&nbsp;</div>
            </div>
            <!-- preloader end -->

            <!--header start-->
            <header id="masthead" class="header ttm-header-style-classic-overlay">
                <!-- ttm-header-wrap -->
                <div class="ttm-header-wrap">
                    <!-- ttm-stickable-header-w -->
                    <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
                        <div id="site-header-menu" class="site-header-menu">
                            <div class="site-header-menu-inner ttm-stickable-header">
                                <div class="container">
                                    <!-- site-branding -->
                                    <div class="site-branding">
                                        <a class="home-link" title="Planwey" rel="home" href="home.php">
                                            <img id="logo-img" class="img-center" src="images/logo-img.png" alt="logo-img">
                                        </a>
                                    </div><!-- site-branding end -->
                                    <!-- header-icins -->
                                    <!--site-navigation -->
                                    <div id="site-navigation" class="site-navigation">
                                        <div class="ttm-menu-toggle">
                                            <input type="checkbox" id="menu-toggle-form" />
                                            <label for="menu-toggle-form" class="ttm-menu-toggle-block">
                                                <span class="toggle-block toggle-blocks-1"></span>
                                                <span class="toggle-block toggle-blocks-2"></span>
                                                <span class="toggle-block toggle-blocks-3"></span>
                                            </label>
                                        </div>
                                        <nav id="menu" class="menu">
                                            <ul class="dropdown">
                                                <li class="active"><a href="Home.php">Home</a></li>

                                                <li><a href="Event.php">Events</a></li>
                                                <li><a href="Packages.php">Packages</a></li>

                                                <li><a href="Contact.php">Contact Us</a></li>
                                                <li><a href="About.php">About Us</a></li>
                                            </ul>
                                        </nav>
                                    </div><!-- site-navigation end-->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>
            <!--ttm-header-wrap end -->

            <!--syte-main start-->
            <div class="site-main">
                <!--contact-intro-section-start-->
                <section class="ttm-row contact-details-section clearfix">
                </section>
                <!--contact-intro-section-end-->
                <section class="ttm-row contact-form-section2 bg-layer break-991-colum clearfix">
                    <div class="container">
                        <?php echo $msg; ?>
                        <div class="row res-1199-mlr-15">
                            <div class="col-md-4 col-lg-4" style="background: linear-gradient(135deg, #fd226a 0%, #f35587 100%);">
                                <!-- col-bg-img-three -->
                                <div class="col-bg-img-three ttm-col-bgimage ttm-bg">
                                    <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                    <style>
                                        /* Register left bar style */
                                        .left-bar h2 {
                                            color: white;
                                            display: flex;
                                            justify-content: center;
                                            margin-top: 350px;
                                        }

                                        .left-bar p {
                                            color: white;
                                            display: flex;
                                            justify-content: center;
                                        }

                                        .left-bar a {
                                            display: flex;
                                            justify-content: center;
                                            margin: 0px 130px;
                                        }

                                        @media (max-width: 1152px) {
                                            .left-bar a {
                                                margin: 0px 100px;
                                            }
                                        }

                                        @media (max-width: 990px) {
                                            .left-bar h2 {
                                                margin-top: 50px;
                                            }

                                            .left-bar a {
                                                margin: 0px 240px;
                                            }
                                        }

                                        @media (max-width: 644px) {
                                            .left-bar a {
                                                margin: 0px 100px;
                                            }
                                        }

                                        @media (max-width: 344px) {
                                            .left-bar h2 {
                                                margin: 3px 60px;
                                            }

                                            .left-bar a {
                                                margin: 0px 40px;
                                            }
                                        }
                                    </style>
                                    <div class="left-bar">
                                        <h2>Create an account</h2>
                                        <p>Already have an account?</p>
                                        <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-border ttm-btn-color-white mt-20 mb-20" href="login.php" title="">Sign In</a>
                                    </div>
                                    <div class="layer-content"></div>
                                </div><!-- col-bg-img-three end-->
                            </div>
                            <div class="col-md-8 col-lg-8">
                                <div class="padding-12 box-shadow">
                                    <!-- section title -->
                                    <div class="section-title clearfix mb-30">
                                        <h3 class="title" style="color:#fd226a;">Registration Form</h3>
                                    </div><!-- section title end -->

                                    <form id="contactform" class="row contactform wrap-form clearfix" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" autocomplete="off">
                                        <label class="col-md-6">
                                            <i class="ti ti-user"></i>
                                            <span class="ttm-form-control"><input class="text-input" name="name" type="text" value="" placeholder="Your Full Name:*" required="required"></span>
                                        </label>
                                        <label class="col-md-6">
                                            <i class="ti ti-calendar"></i>
                                            <span class="ttm-form-control"><input class="text-input" name="dob" type="date" value="" placeholder="Date of BIrth:*" required="required"></span>
                                        </label>
                                        <label class="col-md-12">
                                            <style>
                                                /* Registration Form Gender */
                                                .error {
                                                    color: #fd226a;
                                                }

                                                form .gender-details .gender-title {
                                                    color: black;
                                                }

                                                form .reg-category {
                                                    display: flex;
                                                    width: 80%;
                                                    margin: 14px 0;
                                                    justify-content: space-between;
                                                }

                                                form .reg-category label {
                                                    display: flex;
                                                    align-items: center;
                                                    cursor: pointer;
                                                    color: black;
                                                }

                                                form .reg-category label .dot {
                                                    height: 18px;
                                                    width: 18px;
                                                    border-radius: 50%;
                                                    margin-right: 10px;
                                                    background: #d9d9d9;
                                                    border: 5px solid transparent;
                                                    transition: all 0.3s ease;
                                                }

                                                #dot-1:checked~.reg-category label .one,
                                                #dot-2:checked~.reg-category label .two,
                                                #dot-3:checked~.reg-category label .three {
                                                    background: #fd226a;
                                                    border-color: #d9d9d9;
                                                }

                                                form input[type="radio"] {
                                                    width: 0px;
                                                }
                                            </style>
                                            <span class="ttm-form-control">
                                                <div class="gender-details">
                                                    <input type="radio" name="gender" value="Male" id="dot-1" required>
                                                    <input type="radio" name="gender" value="Female" id="dot-2" required>
                                                    <input type="radio" name="gender" value="Other" id="dot-3" required>
                                                    <span class="gender-title"> Your Gender: </span>
                                                    <div class="reg-category">
                                                        <label for="dot-1">
                                                            <span class="dot one"></span>
                                                            <span class="gender">Male</span>
                                                        </label>
                                                        <label for="dot-2">
                                                            <span class="dot two"></span>
                                                            <span class="gender">Female</span>
                                                        </label>
                                                        <label for="dot-3">
                                                            <span class="dot three"></span>
                                                            <span class="gender">Other</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </span>
                                        </label>
                                        <label class="col-md-12">
                                            <i class="ti ti-location-pin"></i>
                                            <span class="ttm-form-control"><textarea class="text-area" style="resize: none;" name="address" placeholder="Your Address:*" required="required"></textarea></span>
                                        </label>
                                        <label class="col-md-6" style="color: black;"> State*
                                            <span class="ttm-form-control"><select onchange="print_city('state', this.selectedIndex);" id="sts" name="stt" class="form-control" required></select></span>
                                        </label>
                                        <label class="col-md-6">
                                            <span class="ttm-form-control" style="color: black;"> City*
                                                <select id="state" class="form-control" name="city" required></select>
                                                <script language="javascript">
                                                    print_state("sts");
                                                </script>
                                            </span>
                                        </label>
                                        <label class="col-md-6">
                                            <i class="ti ti-email"></i>
                                            <span class="ttm-form-control"><input class="text-input" name="email" type="email" value="" placeholder="Your email-id:*" required="required"></span>
                                        </label>
                                        <label class="col-md-6">
                                            <i class="ti ti-mobile"></i>
                                            <span class="ttm-form-control"><input class="text-input" name="phone" type="number" value="" placeholder="Your Number:*" required="required"></span>
                                        </label>
                                        <label class="col-md-6">
                                            <i class="ti ti-lock"></i>
                                            <span class="ttm-form-control"><input class="text-input" name="password" type="password" id="password" value="" placeholder="Create a Password*" required="required"></span>
                                        </label>
                                        <label class="col-md-6">
                                            <i class="ti ti-lock"></i>
                                            <span class="ttm-form-control"><input class="text-input" name="confirm_password" type="password" value="" placeholder="Confirm Your Password*" required="required"></span>
                                        </label>

                                        <input name="submit" type="submit" value="Register Now" class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor mt-20" style="display:flex; margin: 10px auto;" id="submit" title="Register">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div><!-- site-main end -->

            <!--footer-->
            <footer class="footer widget-footer bg-img11 ttm-bgcolor-black ttm-bg ttm-bgimage-yes clearfix">
                <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>

                <div class="second-footer">
                    <div class="container">
                        <div class="second-footer-inner">
                            <div class="row">
                                <div class="widget-area col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="widget widget-out-link clearfix">
                                        <h4 class="widget-title">Contact Us</h4>
                                        <ul class="widget-contact">
                                            <li><i class="fa fa-map-marker"></i>XYZ Building<br>Ahmedabad,Gujarat,India</li>
                                            <li><i class="fa fa-envelope-o"></i><a href="#">planway_online@gmail.com</a></li>
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
            <script src="js/jquery.validate.js"></script>
            <script src="js/owl.carousel.js"></script>
            <script src="js/jquery.prettyPhoto.js"></script>
            <script src="js/numinate.min6959.js?ver=4.9.3"></script>
            <script src="js/main.js"></script>


        </div><!-- page end -->

        <!--back-to-top start-->
        <a id="totop" href="#top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!--back-to-top end-->



</body>


</html>