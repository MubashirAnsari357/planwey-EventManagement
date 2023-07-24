<?php
session_start();
include 'class/conn.php';
if (!isset($_SESSION['admin_id'])) {
	header("Location: login.php");
}
$msg = "";
if (isset($_GET['did'])) {
	$did = $_GET['did'];
	$delteq = mysqli_query($connection, "delete from progress_tbl where progress_id='{$did}'") or die(mysqli_error($connection));

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
	<title>View Progress</title>
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
								<div class="page-title">All Progress</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Progress</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?php echo $msg; ?>
							<div class="card card-box">
								<div class="card-head">
									<header>All Progress</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body ">
									<div class="row p-b-20">
										<div class="col-md-6 col-sm-6 col-6">
											<div class="btn-group">
												<a href="add-progress.php" id="addRow" class="btn btn-info">
													Add New <i class="fa fa-plus"></i>
												</a>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-6">
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
													<th class="center"> ID </th>
													<th class="center"> Booking ID </th>
													<th class="center"> Event Status </th>
													<th class="center"> Date </th>
													<th class="center"> Image </th>
													<th class="center"> Action </th>
												</tr>
											</thead>
											<tbody>
												<?php

												$selectq = mysqli_query($connection, "select * from progress_tbl") or die(mysqli_error($connection));

												while ($productrow = mysqli_fetch_array($selectq)) {
													echo "<tr>";
													echo "<td class='center'> {$productrow['progress_id']} </td>";
													echo "<td class='center'> {$productrow['booking_id']} </td>";
													echo "<td class='center'> {$productrow['event_status']} </td>";
													echo "<td class='center'> {$productrow['progress_date']} </td>";
													echo "<td class='center'> <a href='{$productrow['progress_img']}'><img height=50px width=50px src='{$productrow['progress_img']}'></a> </td>";
													echo "<td class='center'>
											<a href='edit-progress.php?eid={$productrow['progress_id']}' class='btn btn-tbl-edit btn-xs'>
												<i class='fa fa-pencil'></i>
											</a>
											<a href='view-progress.php?did={$productrow['progress_id']}' class='btn btn-tbl-delete btn-xs'>
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