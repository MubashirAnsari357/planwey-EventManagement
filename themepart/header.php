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
                        <div class="ttm-header-icons">
                            <span class="ttm-header-icon ttm-header-cart-link">
                                <?php
                                if (isset(($_SESSION['user_id']))) {
                                    echo '<a href="logout.php" title="Log-out"><i class="fa fa-sign-out"></i>
                                </a>';
                                }
                                else
                                {
                                    echo '<a href="login.php" title="Sign-in"><i class="fa fa-user"></i>
                                </a>';   
                                }
                                ?>
                            </span>

                            <span class="ttm-header-icon ttm-header-cart-link">
                                <a href="Cart.php" title="Cart"><i class="fa fa-shopping-cart"></i>
                                    <span class="number-cart">0</span>
                                </a>
                            </span>

                        </div><!-- header-icons end -->
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
                                    <?php
                                    if (isset(($_SESSION['user_id']))) {

                                        echo '<li><a href="#">Hi,'. $_SESSION['username'] . '</a>';
                                        echo '<ul>';
                                        echo '<li><a href="user-profile.php">My Profile</a></li>';
                                        echo '<li><a href="view-booking.php">My Booking</a></li>';
                                        echo '<li><a href="change-password.php">Change Password</a></li>';
                                        echo '</ul>';
                                        echo '</li>';
                                    }
                                    ?>
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