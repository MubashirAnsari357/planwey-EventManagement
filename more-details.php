<?php
session_start();
include 'class/conn.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
}
error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>More Details</title>
    <?php
    include "themepart/styles.php";
    ?>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/jquery.validate.js"></script>
    <script src="assets/js/validate-form1.js"></script>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
        <?php
        include "themepart/header.php";
        ?>
        <!-- start page container -->
        <div class="page-container">
            <?php
            include "themepart/side-bar.php";
            ?>
            <!-- start page content -->

            <?php

            $mpid = $_GET['mpid'];
            $mpkgid = $_GET['mpkgid'];

            if (isset($_GET['mpid'])) {
                $selectq = mysqli_query($connection, "SELECT * FROM property_tbl WHERE property_id={$mpid}") or die(mysqli_error($connection));
                while ($propertyrow = mysqli_fetch_array($selectq)) {
                    $property_imgs = $propertyrow['property_imgs'];
                    $data = explode(",", $property_imgs);
                    echo "<div class='page-content-wrapper'>
				<div class='page-content'>
					<div class='page-bar'>
						<div class='page-title-breadcrumb'>
							<div class=' pull-left'>
								<div class='page-title'>More Details</div>
							</div>
							<ol class='breadcrumb page-breadcrumb pull-right'>
								<li><i class='fa fa-home'></i>&nbsp;<a class='parent-item' href='index.php'>Home</a>&nbsp;<i class='fa fa-angle-right'></i>
								</li>
								<li><a class='parent-item' href='view-property.php'>Property</a>&nbsp;<i class='fa fa-angle-right'></i>
								</li>
								<li class='active'>More Details</li>
							</ol>
						</div>
					</div>

					<form action='#' id='myform' method='POST' enctype='multipart/form-data'>
						<div class='row'>
							<div class='col-sm-12'>
								<div class='card-box'>
									<div class='card-head'>
										<header>More Details Of <span style='color: #ff4081;'>{$propertyrow['property_name']}</span> Property</header>
									</div>
									<div class='card-body row'>
										<div class='col-lg-12 p-t-20'>";
                    foreach ($data as $value) {
                        echo " <a href='$value'><img style='height: 150px; width: 150px;' class='mt-5' src='$value'></a>" . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                    echo "<label class='mdl-textfield__label ml-3'>Property Images</label>
											
										</div>
										<div class='col-lg-12 p-t-20'>
											<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'>
												<textarea class='mdl-textfield__input' rows='4' id='text6' readonly>{$propertyrow['property_details']}</textarea>
												<label class='mdl-textfield__label'>Property Details</label>
											</div>
										</div>
                                        <div class='col-lg-3 p-t-2'>
                                        <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width' >
                                           <input class='mdl-textfield__input' type='text' value='{$propertyrow['standing_cap']}' readonly>
												<label class='mdl-textfield__label'>Standing Capacity</label>
											</div>
										</div>
                                        <div class='col-lg-3 p-t-2'>
                                            <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'>
                                              <input class='mdl-textfield__input' type='text' value='{$propertyrow['seating_cap']}' readonly>
												<label class='mdl-textfield__label'>Seating Capacity</label>
											</div>
										</div>
                                        <div class='col-lg-3 p-t-2'>
                                        <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'>
                                           <input class='mdl-textfield__input' type='text' value='{$propertyrow['room']}' readonly>
                                            <label class='mdl-textfield__label'>Room</label>
                                          </div>
                                        </div>
                                        <div class='col-lg-3 p-t-2'>
                                        <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'>
                                          <input class='mdl-textfield__input' type='text' value='{$propertyrow['hall']}' readonly>
                                            <label class='mdl-textfield__label'>Hall</label>
                                        </div>
                                    </div>
                                    <div class='col-lg-3 p-t-2'>
                                    <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'>
                                      <input class='mdl-textfield__input' type='text' value='{$propertyrow['parking_cap']}' readonly>
                                        <label class='mdl-textfield__label'>Parking Capacity</label>
                                    </div>
                                </div>
                                <div class='col-lg-3 p-t-2'>
                                <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'>
                                  <input class='mdl-textfield__input' type='text' value='{$propertyrow['mic_speaker']}' readonly>
                                    <label class='mdl-textfield__label'>Mic/Speaker</label>
                                </div>
                            </div>
                            <div class='col-lg-3 p-t-2'>
                            <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'>
                              <input class='mdl-textfield__input' type='text' value='{$propertyrow['table_chair']}' readonly>
                                <label class='mdl-textfield__label'>Table/Chair</label>
                            </div>
                        </div>
                        <div class='col-lg-3 p-t-2'>
                        <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'>
                          <input class='mdl-textfield__input' type='text' value='{$propertyrow['tv_projector']}' readonly>
                            <label class='mdl-textfield__label'>TV/Projector</label>
                        </div>
                    </div>
                    <div class='col-lg-3 p-t-2'>
                    <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'>
                      <input class='mdl-textfield__input' type='text' value='{$propertyrow['sofa']}' readonly>
                        <label class='mdl-textfield__label'>Sofa</label>
                    </div>
                </div>
                <div class='col-lg-3 p-t-2'>
                <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'>
                  <input class='mdl-textfield__input' type='text' value='{$propertyrow['main_stage']}' readonly>
                    <label class='mdl-textfield__label'>Main Stage</label>
                </div>
            </div>
                                <div class='col-lg-3 p-t-2'>
                                <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'>
                                  <input class='mdl-textfield__input' type='text' value='{$propertyrow['timing']}' readonly>
                                    <label class='mdl-textfield__label'>Timing</label>
                                </div>
                            </div>
										<div class='col-lg-12 p-t-20'>
											<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'>
                                            <textarea class='mdl-textfield__input' rows='2' id='text6' readonly>{$propertyrow['facilities']}</textarea>
												<label class='mdl-textfield__label'>Facilites</label>
											</div>
										</div>
										<div class='col-lg-12 p-t-20'>
											<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'>
												<textarea class='mdl-textfield__input' rows='2' id='text6' readonly>{$propertyrow['other_info']}</textarea>
												<label class='mdl-textfield__label'>Other Info</label>
											</div>
										</div>
										<div class='col-lg-12 p-t-20 mb-3 text-center'>
                                        <a href='view-property.php' class='btn btn-pink'>Go back</a>
										</div>
									</div>
								</div>
							</div>
					</form>
				</div>
			</div>";
                }
            } elseif (isset($_GET['mpkgid'])) {
                $selectq = mysqli_query($connection, "SELECT package_name, package_desc, food_details FROM package_tbl WHERE package_id={$mpkgid}") or die(mysqli_error($connection));
                while ($packagerow = mysqli_fetch_array($selectq)) {
                    echo "<div class='page-content-wrapper'>
				<div class='page-content'>
					<div class='page-bar'>
						<div class='page-title-breadcrumb'>
							<div class=' pull-left'>
								<div class='page-title'>More Details</div>
							</div>
							<ol class='breadcrumb page-breadcrumb pull-right'>
								<li><i class='fa fa-home'></i>&nbsp;<a class='parent-item' href='index.php'>Home</a>&nbsp;<i class='fa fa-angle-right'></i>
								</li>
								<li><a class='parent-item' href='view-package.php'>Package</a>&nbsp;<i class='fa fa-angle-right'></i>
								</li>
								<li class='active'>More Details</li>
							</ol>
						</div>
					</div>

					<form action='#' id='myform' method='POST' enctype='multipart/form-data'>
						<div class='row'>
							<div class='col-sm-12'>
								<div class='card-box'>
									<div class='card-head'>
										<header>More Details Of <span style='color: #ff4081;'>{$packagerow['package_name']}</span> Package</header>
									</div>
									<div class='card-body row'>
										<div class='col-lg-12 p-t-20'>
											<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'>
												<textarea class='mdl-textfield__input' rows='3' id='text6' readonly>{$packagerow['package_desc']}</textarea>
												<label class='mdl-textfield__label'>Package Description</label>
											</div>
										</div>
										<div class='col-lg-12 p-t-20'>
											<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'>
												<textarea class='mdl-textfield__input' rows='2' id='text6' readonly>{$packagerow['food_details']}</textarea>
												<label class='mdl-textfield__label'>Food Details</label>
											</div>
										</div>
										<div class='col-lg-12 p-t-20 text-center'>
                                        <a href='view-package.php' class='btn btn-pink'>Go back</a>
										</div>
									</div>
								</div>
							</div>
					</form>
				</div>
			</div>";
                }
            } else {
                echo "<div class='page-content-wrapper'>
                <div class='page-content'>
                    <h3 class='text-center'> Sorry No Details Available :( </h3>
                    <h4 class='text-center'> Make sure you have chosen <a href='view-package.php' style='color: #ff4081;'>Package</a> Or <a href='view-property.php' style='color: #ff4081;'>Property</a></h4> 
                </div>
            </div>";
            }
            ?>


        </div>
        <!-- end page content -->
    </div>
    <!-- end page container -->
    <?php
    include "themepart/footer.php";
    ?>
    </div>
    <!-- start js include path -->
    <script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <!-- <script src="assets/plugins/jquery/jquery.min.js"></script> -->
    <script src="assets/plugins/popper/popper.min.js"></script>
    <script src="assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Common js-->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/layout.js"></script>
    <script src="assets/js/theme-color.js"></script>
    <!-- Material -->
    <script src="assets/plugins/material/material.min.js"></script>
    <script src="assets/js/pages/material_select/getmdl-select.js"></script>
    <!-- dropzone -->
    <script src="assets/plugins/dropzone/dropzone.js"></script>
    <script src="assets/plugins/dropzone/dropzone-call.js"></script>
    <!-- date and time 	 -->
    <script src="assets/plugins/flatpicker/flatpickr.min.js"></script>
    <script src="assets/js/pages/datetime/datetime-data.js"></script>
    <!-- animation -->
    <script src="assets/js/pages/ui/animations.js"></script>
    <!-- preview images -->
    <script src="assets/js/preview-images.js"></script>
    <!-- end js include path -->
</body>

</html>