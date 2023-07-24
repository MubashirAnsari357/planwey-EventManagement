<!-- start sidebar menu -->
<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll">
            <ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="user-panel">
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name"> <?php if(isset(($_SESSION['admin_id']))) { echo  $_SESSION['username'];} ?> </div>
                            <div class="profile-usertitle-job"> Manager </div>
                        </div>
                        <div class="sidebar-userpic-btn">
                            <a class="tooltips" href="view-profile.php" data-placement="top" data-original-title="Profile">
                                <i class="material-icons">person_outline</i>
                            </a>

                            <a class="tooltips" href="logout.php" data-placement="top" data-original-title="Logout">
                                <i class="material-icons">input</i>
                            </a>
                        </div>
                    </div>
                </li>

                <li class="nav-item start active">

                <li class="nav-item">
                    <a href="index.php" class="nav-link ">
                        <i class="material-icons">dashboard</i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="view-users.php" class="nav-link ">
                        <i class="material-icons">group</i>
                        <span class="title">Users</span>
                        <span class="selected"></span>
                    </a>
                </li>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">event</i>
                        <span class="title">Events</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="add-events.php" class="nav-link ">
                                <span class="title">Add Events</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view-events.php" class="nav-link ">
                                <span class="title">View Events</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">place</i>
                        <span class="title">Property</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="add-property.php" class="nav-link ">
                                <span class="title">Add Property</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view-property.php" class="nav-link ">
                                <span class="title">View Property</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">shop</i>
                        <span class="title">Packages</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="add-package.php" class="nav-link ">
                                <span class="title">Add Package</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view-package.php" class="nav-link ">
                                <span class="title">View Package</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="view-booking.php" class="nav-link ">
                        <i class="material-icons">book</i>
                        <span class="title">Bookings</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="view-payment.php" class="nav-link ">
                        <i class="material-icons">payment</i>
                        <span class="title">Payments</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">data_usage</i>
                        <span class="title">Progress</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="add-progress.php" class="nav-link ">
                                <span class="title">Add Progress</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view-progress.php" class="nav-link ">
                                <span class="title">View Progress</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="view-feedback.php" class="nav-link ">
                        <i class="material-icons">feedback</i>
                        <span class="title">Feedback</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle"> <i class="material-icons">settings</i>
                        <span class="title">Account Settings</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">


                        <li class="nav-item">
                            <a href="view-profile.php" class="nav-link "><span class="title"> View Profile</span>
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a href="edit-profile.php" class="nav-link "><span class="title"> Edit Profile</span>
                            </a>
                        </li> -->

                        <li class="nav-item">
                            <a href="logout.php" class="nav-link "> <span class="title">Log-out</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="change-password.php" class="nav-link "> <span class="title">Change Password</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end sidebar menu -->