<?php
session_start();
include 'class/conn.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
}
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
	<title>Dashboard</title>

	<?php
	include "themepart/styles.php";
	?>
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
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Dashboard</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Dashboard</li>
							</ol>
						</div>
					</div>
					<!-- start widget -->
					<div class="state-overview">
						<div class="row">
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-blue">
									<span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Users</span>
										<?php
												$query = "SELECT * from user_tbl";
												$selectq = mysqli_query($connection, $query) or die(mysqli_error($connection));
												$rows = mysqli_num_rows($selectq);
										           echo "<span class='info-box-number'>$rows</span>";												
												?>
										<div class="progress">
											<div class="progress-bar width-60"></div>
										</div>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-orange">
									<span class="info-box-icon push-bottom"><i class="material-icons">book</i></span>
									<div class="info-box-content">
										<span class="info-box-text">New Booking</span>
										<?php
												$query = "SELECT * from booking_tbl";
												$selectq = mysqli_query($connection, $query) or die(mysqli_error($connection));
												$rows = mysqli_num_rows($selectq);
										        echo "<span class='info-box-number'>$rows</span>";
										?>
										<div class="progress">
											<div class="progress-bar width-40"></div>
										</div>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-purple">
									<span class="info-box-icon push-bottom"><i class="material-icons">store</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Events</span>
										<?php
												$query = "SELECT * from event_tbl";
												$selectq = mysqli_query($connection, $query) or die(mysqli_error($connection));
												$rows = mysqli_num_rows($selectq);
										        echo "<span class='info-box-number'>$rows</span>";
										?>
										<div class="progress">
											<div class="progress-bar width-80"></div>
										</div>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-success">
									<span class="info-box-icon push-bottom"><i class="material-icons">feedback</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Feedback</span>
										<?php
												$query = "SELECT * from feedback_tbl";
												$selectq = mysqli_query($connection, $query) or die(mysqli_error($connection));
												$rows = mysqli_num_rows($selectq);
										        echo "<span class='info-box-number'>$rows</span>";
										?>
										<div class="progress">
											<div class="progress-bar width-60"></div>
										</div>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-blue">
									<span class="info-box-icon push-bottom"><i class="material-icons">place</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Property</span>
										<?php
												$query = "SELECT * from property_tbl";
												$selectq = mysqli_query($connection, $query) or die(mysqli_error($connection));
												$rows = mysqli_num_rows($selectq);
										           echo "<span class='info-box-number'>$rows</span>";												
												?>
										<div class="progress">
											<div class="progress-bar width-60"></div>
										</div>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-orange">
									<span class="info-box-icon push-bottom"><i class="material-icons">shop</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Package</span>
										<?php
												$query = "SELECT * from package_tbl";
												$selectq = mysqli_query($connection, $query) or die(mysqli_error($connection));
												$rows = mysqli_num_rows($selectq);
										        echo "<span class='info-box-number'>$rows</span>";
										?>
										<div class="progress">
											<div class="progress-bar width-40"></div>
										</div>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-purple">
									<span class="info-box-icon push-bottom"><i class="material-icons">payment</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Payment</span>
										<?php
												$query = "SELECT * from payment_tbl";
												$selectq = mysqli_query($connection, $query) or die(mysqli_error($connection));
												$rows = mysqli_num_rows($selectq);
										        echo "<span class='info-box-number'>$rows</span>";
										?>
										<div class="progress">
											<div class="progress-bar width-80"></div>
										</div>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
						</div>
					</div>
					<!-- end widget -->
				</div>
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
	<script src="assets/plugins/jquery/jquery.min.js"></script>
	<script src="assets/plugins/popper/popper.min.js"></script>
	<script src="assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
	<script src="assets/js/pages/sparkline/sparkline-data.js"></script>
	<!-- Common js-->
	<script src="assets/js/app.js"></script>
	<script src="assets/js/layout.js"></script>
	<script src="assets/js/theme-color.js"></script>
	<!-- material -->
	<script src="assets/plugins/material/material.min.js"></script>
	<!-- animation -->
	<script src="assets/js/pages/ui/animations.js"></script>
	<!-- morris chart -->
	<script src="assets/plugins/morris/morris.min.js"></script>
	<script src="assets/plugins/morris/raphael-min.js"></script>
	<script src="assets/js/pages/chart/morris/morris_home_data.js"></script>
	<!-- end js include path -->
</body>

</html>