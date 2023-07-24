<?php
session_start();
include 'class/conn.php';
if (!isset($_SESSION['admin_id'])) {
	header("Location: login.php");
}
$msg = "";
if (isset($_GET['did'])) {
	$did = $_GET['did'];
	$delteq = mysqli_query($connection, "delete from feedback_tbl where feedback_id='{$did}'") or die(mysqli_error($connection));

	if ($delteq) {
		$msg = '<div class="alert alert-danger" role="alert">
				Record deleted Successfully</div> ';
	}
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
	<title>View Feedback</title>
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
								<div class="page-title">All Feedback</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">All Feedback</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?php echo $msg; ?>
							<div class="card card-box">
								<div class="card-head">
									<header>All Feedback</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body ">
									<div class="row p-b-20">
										<div class="col-md-12 col-sm-12 col-12">
											<div class="btn-group pull-right">
												<a class="btn deepPink-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
													<i class="fa fa-angle-down"></i>
												</a>
												<ul class="dropdown-menu pull-right">
													<li>
														<a href="javascript:;">
															<i class="fa fa-print"></i> Print </a>
													</li>
													<li>
														<a href="javascript:;">
															<i class="fa fa-file-pdf-o"></i> Save as PDF </a>
													</li>
													<li>
														<a href="javascript:;">
															<i class="fa fa-file-excel-o"></i> Export to Excel </a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="table-scrollable">
										<table class="table table-hover table-checkable order-column full-width" id="example4">
											<thead>
												<tr>
													<th class="center"> Feedback ID </th>
													<th class="center"> User Name </th>
													<th class="center"> Package ID </th>
													<th class="center"> Feedback Date </th>
													<th class="center"> Feedback Rating </th>
													<th class="center"> Feedback Description </th>
													<th class="center"> Action </th>
												</tr>
											</thead>

											<tbody>
												<?php

												$query = "SELECT
										`feedback_tbl`.`feedback_id`
										, `user_tbl`.`full_name`
										, `package_tbl`.`package_name`
										, `feedback_tbl`.`feedback_date`
										, `feedback_tbl`.`feedback_rating`
										, `feedback_tbl`.`feedback_desc`
									FROM
										`package_tbl`
										INNER JOIN `feedback_tbl` 
											ON (`package_tbl`.`package_id` = `feedback_tbl`.`package_id`)
										INNER JOIN `user_tbl` 
											ON (`user_tbl`.`user_id` = `feedback_tbl`.`user_id`)
									ORDER BY `feedback_tbl`.`feedback_id` ASC;";
												$selectq = mysqli_query($connection, $query) or die(mysqli_error($connection));

												while ($productrow = mysqli_fetch_array($selectq)) {
													echo "<tr>";
													echo "<td class='center'> {$productrow['feedback_id']} </td>";
													echo "<td class='center'> {$productrow['full_name']} </td>";
													echo "<td class='center'> {$productrow['package_name']} </td>";
													echo "<td class='center'> {$productrow['feedback_date']} </td>";
													echo "<td class='center'> {$productrow['feedback_rating']} </td>";
													echo "<td class='center'> {$productrow['feedback_desc']} </td>";
													echo "<td class='center'>
											<a href='edit-package.php' class='btn btn-tbl-edit btn-xs'>
												<i class='fa fa-pencil'></i>
											</a>
											<a href='view-feedback.php?did={$productrow['feedback_id']}' class='btn btn-tbl-delete btn-xs'>
												<i class='fa fa-trash-o '></i>
											</a>
										</td>";
													echo "</tr>";
												}

												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
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
		<!-- data tables -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
		<script src="assets/js/pages/table/table_data.js"></script>
		<!-- Material -->
		<script src="assets/plugins/material/material.min.js"></script>
		<!-- animation -->
		<script src="assets/js/pages/ui/animations.js"></script>
		<!-- end js include path -->
</body>

</html>