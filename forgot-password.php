<?php session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'conn.php';
$msg = "";
if($_POST)
{
    $email =  mysqli_real_escape_string($connection,$_POST['email']);

    $selectquery = mysqli_query($connection,"select * from user_tbl where email_id='{$email}'") or die(mysqli_error($connection));
    $count = mysqli_num_rows($selectquery);
    $row = mysqli_fetch_array($selectquery);

    if($count>0)
    {


        //Load Composer's autoloader
        require '../Maildemo/vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '';                     //SMTP username
            $mail->Password   = '';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('gaurav.pg44@gmail.com', 'Planway');
            $mail->addAddress($email, $email);     //Add a recipient


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Forgot Password';
            $mail->Body    = "Hi, $email your password is {$row['password']}";
            $mail->AltBody = "Hi, $email your password is {$row['password']}";

            $mail->send();
            $msg = "<div class='alert alert-warning' role='alert'>Your password has been sent on your email id.</div>";
        } catch (Exception $e) {
            echo "<div class='alert alert-warning' role='alert'>Email could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
        }
            
        }
        else
        {
            $msg = "<div class='alert alert-warning' role='alert'> Email Id is invalid! </div>";
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
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/validate-form.js"></script>
    <style>
        .error{
            color: #fd226a;
        }
    </style>

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
            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-10">
                            <div class="wrap d-md-flex" style="display: flex; justify-content:center;">
                                <div class="login-wrap p-4 p-lg-5">
                                    <div class="d-flex">
                                        <div class="w-100">
                                            <h3 class="mb-4">Forgot Password?</h3>
                                        </div>
                                    </div>

                                    <form method="post" id="contactform" class="signin-form">
                                    <div class="form-group mb-3">
                                            <?php echo $msg; ?>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label" for="name"> Email ID</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter your Email" required>
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
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/numinate.min6959.js?ver=4.9.3"></script>
    <script src="js/main.js"></script>

</body>


</html>