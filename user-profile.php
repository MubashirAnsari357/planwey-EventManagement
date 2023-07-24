<?php 
require 'conn.php';
session_start(); 
if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
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
<title>Planwey &#8211; Profile</title>

<?php include_once'themepart/style.php' ?>

</head>

<body>

    <!--page start-->
    <div class="page">

       <?php include_once'themepart/Header.php' ?>

        <!--page-title start-->
        <div class="ttm-page-title-row text-center">
            <div class="section-overlay"></div>
            <div class="title-box text-center">
                <div class="container">
                    <div class="page-title-heading">
                        <h1 class="title">MY PROFILE</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <span><a title="Homepage" href="Home.php"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span><a title="" href="our-team.html">Login</a></span>
                            <span class="ttm-bread-sep ttm-textcolor-white"> &nbsp; ⁄ &nbsp;</span>
                            <span class="ttm-textcolor-white">My Profile</span>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <!--page-title END-->
        
        <!--site-main-->
        <div class="site-main">
            <section class="ttm-row team-member-section clearfix">
                <div class="container">
                    <div class="row">
                        <!--team-details-->
                        <div class="ttm-team-member-single-content-area col-xs-12 col-sm-12 col-md-7 col-lg-7">
                            <div class="ttm-team-member-content">
                                <div class="ttm-team-member-single-list">
                                    <h2 class="ttm-team-member-single-title">User Name</h2>
                                    <h5 class="ttm-team-member-single-position">User ID:</h5>
                                    <div class="ttm-team-details-wrapper">
                                        <ul class="ttm-team-details-list clearfix">
                                        <?php
                                        $user_id= $_SESSION['user_id'];
                                        $userd = mysqli_query($connection, "Select * From user_tbl Where user_id={$user_id}") or die(mysqli_error($connection));
                                        while ($query = mysqli_fetch_array($userd)) {
                                        
                                        echo    "<li>
                                                <div class='ttm-team-list-title'>
                                                    <i class='fa fa-phone'></i> Phone :
                                                </div>
                                                <div class='ttm-team-list-value'>
                                                    <a href='tel:+1800200145' tabindex='0'><h6>{$query['mobile_no']}</h6></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class='ttm-team-list-title'>
                                                    <i class='ti ti-email'></i> Email :
                                                </div>
                                                <div class='ttm-team-list-value'>
                                                    <a href='mailto:info@example.com' tabindex='0'><h6>{$query['email_id']}</h6></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class='ttm-team-list-title'>
                                                    <i class='ti ti-location-pin'></i> Address Info :
                                                </div>
                                                <div class='ttm-team-list-value'><h6>{$query['address']}</h6></div>
                                            </li>
                                            <li>
                                                <div class='ttm-team-list-title'>
                                                    <i class='ti ti-user'></i> Gender :
                                                </div>
                                                <div class='ttm-team-list-value'><h6>{$query['gender']}</h6></div>
                                            </li>
                                            <li>
                                                <div class='ttm-team-list-title'>
                                                    <i class='ti ti-time'></i> DOB :
                                                </div>
                                                <div class='ttm-team-list-value'><h6>{$query['dob']}</h6></div>
                                            </li>";
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                 
                                </div>
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