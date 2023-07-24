<?php
session_start();
include 'class/conn.php';
if (!isset($_SESSION['admin_id'])) {
	header("Location: login.php");
}
$msg = "";
if (isset($_GET['did'])) {
	$did = $_GET['did'];
	$delteq = mysqli_query($connection, "delete from property_tbl where property_id='{$did}'") or die(mysqli_error($connection));

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
	<title>View Property</title>
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
								<div class="page-title">All Property</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">All Property</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?php echo $msg; ?>
							<div class="card card-box">
								<div class="card-head">
									<header>All Property</header>
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
												<a href="add-property.php" id="addRow" class="btn btn-info">
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
													<th class="center"> Event Type </th>
													<th class="center"> Property Name </th>
													<th class="center"> Property Address </th>
													<th class="center"> Total Price </th>
													<th class="center"> More Details </th>
													<th class="center"> Action </th>
												</tr>
											</thead>
											<tbody>
												<?php

												$query = "SELECT
										`property_tbl`.`property_id`
										, `event_tbl`.`event_type`
										, `property_tbl`.`property_name`
										, `property_tbl`.`property_address`
										, `property_tbl`.`standing_cap`
										, `property_tbl`.`seating_cap`
										, `property_tbl`.`room`
										, `property_tbl`.`hall`
										, `property_tbl`.`parking_cap`
										, `property_tbl`.`timing`
										, `property_tbl`.`mic_speaker`
										, `property_tbl`.`table_chair`
										, `property_tbl`.`tv_projector`
										, `property_tbl`.`sofa`
										, `property_tbl`.`main_stage`
										, `property_tbl`.`property_price`
										, `property_tbl`.`property_imgs`
										, `property_tbl`.`facilities`
										, `property_tbl`.`other_info`
									FROM
										`event_tbl`
										INNER JOIN `property_tbl` 
											ON (`event_tbl`.`event_id` = `property_tbl`.`event_id`)
									ORDER BY `property_tbl`.`property_id` ASC;";
												$selectq = mysqli_query($connection, $query) or die(mysqli_error($connection));

												while ($productrow = mysqli_fetch_array($selectq)) {
													$property_imgs = $productrow['property_imgs'];
													$data = explode(",", $property_imgs);
													echo "<tr>";
													echo "<td class='center'> {$productrow['property_id']} </td>";
													echo "<td class='center'> {$productrow['event_type']} </td>";
													echo "<td class='center'> {$productrow['property_name']} </td>";
													echo "<td class='center'> {$productrow['property_address']} </td>";
													echo "<td class='center'> {$productrow['property_price']} </td>";
													echo "<td class='center'> <a href='more-details.php?mpid={$productrow['property_id']}' class='btn btn-info'>More...</a> </td>";
													echo "<td class='center'>
											<a href='edit-property.php?eid={$productrow['property_id']}' class='btn btn-tbl-edit btn-xs'>
												<i class='fa fa-pencil'></i>
											</a>
											<a href='view-property.php?did={$productrow['property_id']}' class='btn btn-tbl-delete btn-xs'>
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