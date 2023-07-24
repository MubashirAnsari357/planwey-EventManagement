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
	<title>Profile</title>
	<?php
	include "themepart/styles.php";
	?>
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
	<div class="page-wrapper">
		<!-- start header -->
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
								<div class="page-title">Profile</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Profile</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN PROFILE SIDEBAR -->
							<!-- <div class="col-md-6 col-sm-6 col-6">
								<div class="btn-group">
									<a href="edit-profile.php" id="addRow" class="btn btn-info">
										Edit Profile <i class="fa fa-pencil"></i>
									</a>
								</div>
							</div> -->
							<hr>
							<div class="profile-sidebar" style="width: 70%;">
								<div class="card card-topline-aqua">
									<div class="card-body no-padding height-9">
										<div class="profile-usertitle">
											<div class="profile-usertitle-name"> <?php if(isset(($_SESSION['user_id']))) { echo $_SESSION['username'];} ?> </div>
											<div class="profile-usertitle-job"> Software Engineer </div>
										</div>
										<!-- END SIDEBAR USER TITLE -->
									</div>
								</div>
								<div class="card">
									<div class="card-head card-topline-aqua">
										<header>About Me</header>
									</div>
									<div class="card-body no-padding height-9">
										<ul class="list-group list-group-unbordered">
											<li class="list-group-item">
												<b>Gender </b>
												<div class="profile-desc-item pull-right">Male</div>
											</li>
											<li class="list-group-item">
												<b>Phone </b>
												<div class="profile-desc-item pull-right">9875641235</div>
											</li>
											<li class="list-group-item">
												<b>Email </b>
												<div class="profile-desc-item pull-right">aaa@aa.com</div>
											</li>
											<li class="list-group-item">
												<b>Degree </b>
												<div class="profile-desc-item pull-right">B.C.A, M.C.A, Ph.D</div>
											</li>
											<li class="list-group-item">
												<b>Designation</b>
												<div class="profile-desc-item pull-right">Software Engineer</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- END BEGIN PROFILE SIDEBAR -->
						</div>
					</div>
				</div>
				<!-- end page content -->
			</div>
			<!-- end page container -->
		</div>
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
	<!-- Common js-->
	<script src="assets/js/app.js"></script>
	<script src="assets/js/layout.js"></script>
	<script src="assets/js/theme-color.js"></script>
	<!-- Material -->
	<script src="assets/plugins/material/material.min.js"></script>
	<!-- animation -->
	<script src="assets/js/pages/ui/animations.js"></script>
	<!-- end js include path -->
</body>

</html>