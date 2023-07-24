<?php
session_start();
include 'class/conn.php';
if (!isset($_SESSION['admin_id'])) {
	header("Location: login.php");
}

$msg = "";
if (isset($_GET['did'])) {
	$did = $_GET['did'];
	$delteq = mysqli_query($connection, "delete from booking_tbl where booking_id='{$did}'") or die(mysqli_error($connection));

	if ($delteq) {
		$msg = '<div class="alert alert-danger" role="alert">
				Record deleted Successfully</div> ';
	}
}

if($_POST)
{
	$b_status = $_POST['b_status'];
    $id = $_POST['id'];
    $updateq = mysqli_query($connection, "UPDATE booking_tbl SET booking_status='{$b_status}' where booking_id='{$id}'") or die(mysqli_error($connection));
	if ($updateq) {
		$msg = '<div class="alert alert-success" role="alert">
				Status Updated Successfully</div> ';
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
	<title>View Booking</title>
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
								<div class="page-title">All Bookings</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">All Bookings</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?php echo $msg; ?>
							<div class="card card-box">
								<div class="card-head">
									<header>All Bookings</header>
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
													<th class="center"> ID </th>
													<th class="center"> Property Name</th>
													<th class="center"> Package Name </th>
													<th class="center"> User Name </th>
													<th class="center"> Customer Name </th>
													<th class="center"> Email </th>
													<th class="center"> Phone </th>
													<th class="center"> Booking Date </th>
													<th class="center"> No. Of Guests </th>
													<th class="center"> Function Date </th>
													<th class="center"> Function Time </th>
													<th class="center"> Booking Status </th>
													<th class="center"> </th>
													<th class="center"> Total Price </th>
													<th class="center"> Action </th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query = "SELECT
										`booking_tbl`.`booking_id`
										, `property_tbl`.`property_name`
										, `package_tbl`.`package_name`
										, `user_tbl`.`full_name`
										, `booking_tbl`.`booking_name`
										, `booking_tbl`.`booking_email`
										, `booking_tbl`.`booking_phone`
										, `booking_tbl`.`booking_date`
										, `booking_tbl`.`no_of_guests`
										, `booking_tbl`.`function_date`
										, `booking_tbl`.`function_time`
										, `booking_tbl`.`booking_status`
										, `booking_tbl`.`total_price`
									FROM
										`property_tbl`
										INNER JOIN `booking_tbl` 
											ON (`property_tbl`.`property_id` = `booking_tbl`.`property_id`)
										INNER JOIN `package_tbl` 
											ON (`package_tbl`.`package_id` = `booking_tbl`.`package_id`)
										INNER JOIN `user_tbl` 
											ON (`user_tbl`.`user_id` = `booking_tbl`.`user_id`)
									ORDER BY `booking_tbl`.`booking_id` ASC;";
												$selectq = mysqli_query($connection, $query) or die(mysqli_error($connection));

												while ($productrow = mysqli_fetch_array($selectq)) {
													echo "<tr>";
													echo "<td class='center'> {$productrow['booking_id']} </td>";
													echo "<td class='center'> {$productrow['property_name']} </td>";
													echo "<td class='center'> {$productrow['package_name']} </td>";
													echo "<td class='center'> {$productrow['full_name']} </td>";
													echo "<td class='center'> {$productrow['booking_name']} </td>";
													echo "<td class='center'> {$productrow['booking_email']} </td>";
													echo "<td class='center'> {$productrow['booking_phone']} </td>";
													echo "<td class='center'> {$productrow['booking_date']} </td>";
													echo "<td class='center'> {$productrow['no_of_guests']} </td>";
													echo "<td class='center'> {$productrow['function_date']} </td>";
													echo "<td class='center'> {$productrow['function_time']} </td>";
													echo "<td class='center'> 
													<form method='POST' action='#'>
													<input type='hidden' name='id' value='{$productrow['booking_id']}'>
													<select name='b_status' id='status'>
													<option value=''> {$productrow['booking_status']} </option>
													<option value='Pending'>Pending</option>
													<option value='Accepted'>Accepted</option>
													<option value='Cancelled'>Cancelled</option>
													<option value='Completed'>Completed</option>
													</select>
													</td>
													<td class='center'> 
													<button type='submit'
												class='mdl-button mdl-js-button mdl-button--icon mdl-button--colored margin-right-10'>
												<i class='material-icons'>file_upload</i>
											</button>												
													</td>
													</form>";
													echo "<td class='center'> {$productrow['total_price']} </td>";
													echo "<td class='center'>
											<a href='view-booking.php?did={$productrow['booking_id']}' class='btn btn-tbl-delete btn-xs'>
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