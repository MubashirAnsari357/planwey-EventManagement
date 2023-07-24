<?php
session_start();
include 'class/conn.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
}
$msg = "";

if ($_POST) {
	$event_type = mysqli_real_escape_string($connection, $_POST['e_stype']);
	$property_name = mysqli_real_escape_string($connection, $_POST['pl_name']);
	$property_details = mysqli_real_escape_string($connection, $_POST['pl_details']);
	$property_add = mysqli_real_escape_string($connection, $_POST['pl_address']);
	$standing_cap = mysqli_real_escape_string($connection, $_POST['seat_cap']);
	$seating_cap = mysqli_real_escape_string($connection, $_POST['seat_cap_1']);
	$room = mysqli_real_escape_string($connection, $_POST['room']);
	$hall = mysqli_real_escape_string($connection, $_POST['hall']);
	$parking_cap = mysqli_real_escape_string($connection, $_POST['park_cap']);
	$timing = mysqli_real_escape_string($connection, $_POST['time']);
	$mic_speaker = mysqli_real_escape_string($connection, $_POST['mic']);
	$table_chair = mysqli_real_escape_string($connection, $_POST['table']);
	$tv_projector = mysqli_real_escape_string($connection, $_POST['tv']);
	$sofa = mysqli_real_escape_string($connection, $_POST['sofa']);
	$main_stage = mysqli_real_escape_string($connection, $_POST['stage']);
	$property_price = mysqli_real_escape_string($connection, $_POST['price']);
	$facilites = ($_POST['chkbox']);
	$other_info = ($_POST['chkbox_1']);
	$chk = "";
	foreach ($facilites as $chk1) {
		$chk .= $chk1 . ",";
	}
	$chk2 = "";
	foreach ($other_info as $chk3) {
		$chk2 .= $chk3 . ",";
	}

	extract($_POST);

	if (isset($_FILES['fileUpload']['name'])) {
		$file_name_all = "";
		for ($i = 0; $i < count($_FILES['fileUpload']['name']); $i++) {
			$tmpFilePath = $_FILES['fileUpload']['tmp_name'][$i];
			if ($tmpFilePath != "") {
				$path = "upload/"; // create folder 
				$name = $_FILES['fileUpload']['name'][$i];
				$size = $_FILES['fileUpload']['size'][$i];

				list($txt, $ext) = explode(".", $name);
				$file = substr(str_replace(" ", "_", $txt), 0);
				$info = pathinfo($file);
				$filename = $file . "." . $ext;
				if (move_uploaded_file($_FILES['fileUpload']['tmp_name'][$i], $path . $filename)) {
					$file_name_all .= $path . $filename . ",";
				}
			}
			$filepath =  rtrim($file_name_all, ', ');
			//  $query=mysqli_query($connection,"INSERT into property_tbl (`property_imgs`) VALUES('".addslashes($filepath)."'); ");
		}

		$query = mysqli_query($connection, "insert into property_tbl(event_id,property_name,property_details,property_address,standing_cap,seating_cap,room,hall,parking_cap,timing,mic_speaker,table_chair,tv_projector,sofa,main_stage,property_price,property_imgs,facilities,other_info)
				 values('{$event_type}','{$property_name}','{$property_details}','{$property_add}','{$standing_cap}','{$seating_cap}','{$room}','{$hall}','{$parking_cap}','{$timing}','{$mic_speaker}','{$table_chair}','{$tv_projector}','{$sofa}','{$main_stage}','{$property_price}','" . addslashes($filepath) . "','{$chk}','{$chk2}')") or die(mysqli_error(($connection)));
	} else {
		$filepath = "";
	}


	// $query = mysqli_query($connection, "insert into property_tbl(property_id,property_name,property_address,standing_cap,seating_cap,room,hall,parking_cap,timing,mic_speaker,table_chair,tv_projector,sofa,main_stage,property_price,property_imgs)
	//  values('{$property_type}','{$property_name}','{$property_add}','{$standing_cap}','{$seating_cap}','{$room}','{$hall}','{$parking_cap}','{$timing}','{$mic_speaker}','{$table_chair}','{$tv_projector}','{$sofa}','{$main_stage}','{$property_price}','".addslashes($filepath)."')") or die(mysqli_error(($connection)));

	if ($query) {

		// move_uploaded_file($_FILES['fileUpload']['tmp_name'], $property_imgs);
		$msg = '<div class="alert alert-success" role="alert">
						Record inserted Successfully. Redirecting you to the Display page </div> ';
	}
	header('Refresh: 5; url=view-property.php');
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
	<title>Add Property Details</title>
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
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Add Property</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="view-property.php">Property Details</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Property</li>
							</ol>
						</div>
					</div>

					<form id="myform" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12">
							<?php echo $msg; ?>
								<div class="card-box">
									<div class="card-head">
										<header>Add Property</header>
									</div>
									<div class="card-body row">
										<div class="col-lg-6 p-t-20">
											<?php
											$selectq = mysqli_query($connection, "SELECT * from event_tbl") or die(mysqli_error($connection));
											echo '<label>Event Type</label>';
											echo "<select class='form-control' name='e_stype'>";
											while ($propertyrow = mysqli_fetch_array($selectq)) {
												echo "<option value='{$propertyrow['event_id']}'>{$propertyrow['event_type']}</option>";
											}
											echo "</select>";
											?>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="text" name="pl_name">
												<label class="mdl-textfield__label">Property Name</label>
											</div>
										</div>
										<div class="col-lg-12 p-t-20">
											<div class="mdl-textfield mdl-js-textfield txt-full-width">
												<textarea class="mdl-textfield__input" rows="2" id="text6" name="pl_details"></textarea>
												<label class="mdl-textfield__label">Property Details</label>
											</div>
										</div>
										<div class="col-lg-12 p-t-20">
											<div class="mdl-textfield mdl-js-textfield txt-full-width">
												<textarea class="mdl-textfield__input" rows="2" id="text7" name="pl_address"></textarea>
												<label class="mdl-textfield__label">Property Address</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="number" name="seat_cap_1">
												<label class="mdl-textfield__label">Seating Capacity</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="number" name="seat_cap">
												<label class="mdl-textfield__label">Standing Capacity</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="text" name="room">
												<label class="mdl-textfield__label">No of Room </label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="text" name="hall">
												<label class="mdl-textfield__label">No of Hall</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="number" name="park_cap">
												<label class="mdl-textfield__label">Parking Capacity</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="time" id="time" name="time">
												<label class="mdl-textfield__label">Timing</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="number" name="mic">
												<label class="mdl-textfield__label">Mic/Speaker</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="number" name="table">
												<label class="mdl-textfield__label">Table/Chair</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="number" name="tv">
												<label class="mdl-textfield__label">TV/Projector</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="number" name="sofa">
												<label class="mdl-textfield__label">Sofa</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="number" name="stage">
												<label class="mdl-textfield__label">Main Stage</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="number" name="price">
												<label class="mdl-textfield__label">Property Price</label>
											</div>
										</div>
										<div class="col-lg-12 p-t-20">
											<style>
												.container {
													max-width: 450px;
												}

												.imgGallery img {
													padding: 8px;
													max-width: 100px;
												}
											</style>
											<div class="container mt-5">
												<div class="user-image mb-3 text-center">
													<div class="imgGallery">
														<!-- Image preview -->
													</div>
												</div>

												<div class="custom-file">
													<input type="file" name="fileUpload[]" class="custom-file-input" id="chooseFile" multiple accept="image/*">
													<label class="custom-file-label" for="chooseFile">Images</label>
												</div>
											</div>
										</div>
										<div class="col-lg-6 p-t-20"></div>
										<div class="col-lg-12 p-t-5"><input type="checkbox" style="width: 0px" value="" id="flexCheck0" name="chkbox[]"></div>
										<div class="col-lg-12 p-t-5"><label class="" style="color: #a6aeb1;">Facilities</label></div>
										<div class="col-lg-3 p-t-10">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="AV Equipment" id="flexCheck1" name="chkbox[]">
												<label class="form-check-label" for="flexCheck1">
													AV Equipment
												</label>
												<input class="form-check-input" type="checkbox" value="Roof Top" id="flexCheck2" name="chkbox[]">
												<label class="form-check-label" for="flexCheck2">
													Roof Top
												</label>
												<input class="form-check-input" type="checkbox" value=" WiFi" id="flexCheck3" name="chkbox[]">
												<label class="form-check-label" for="flexCheck3">
													WiFi
												</label>
											</div>
										</div>
										<div class="col-lg-3 p-t-10">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="Valet Parking" id="flexCheck4" name="chkbox[]">
												<label class="form-check-label" for="flexCheck4">
													Valet Parking
												</label>
												<input class="form-check-input" type="checkbox" value="Power Backup" id="flexCheck5" name="chkbox[]">
												<label class="form-check-label" for="flexCheck5">
													Power Backup
												</label>
												<input class="form-check-input" type="checkbox" value="Fire Crackers Allowed" id="flexCheck6" name="chkbox[]">
												<label class="form-check-label" for="flexCheck6">
													Fire Crackers Allowed
												</label>
											</div>
										</div>
										<div class="col-lg-3 p-t-10">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="Laundary Service" id="flexCheck7" name="chkbox[]">
												<label class="form-check-label" for="flexCheck7">
													Laundary Service
												</label>
												<input class="form-check-input" type="checkbox" value="Taxi Service" id="flexCheck8" name="chkbox[]">
												<label class="form-check-label" for="flexCheck8">
													Taxi Service
												</label>
												<input class="form-check-input" type="checkbox" value="Beauty Salon" id="flexCheck9" name="chkbox[]">
												<label class="form-check-label" for="flexCheck9">
													Beauty Salon
												</label>
											</div>
										</div>
										<div class="col-lg-3 p-t-10">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="Open Outdoor Seating" id="flexCheck10" name="chkbox[]">
												<label class="form-check-label" for="flexCheck10">
													Open Outdoor Seating
												</label>
												<input class="form-check-input" type="checkbox" value="Mandap Setup" id="flexCheck11" name="chkbox[]">
												<label class="form-check-label" for="flexCheck11">
													Mandap Setup
												</label>
												<input class="form-check-input" type="checkbox" value="Hawan Allowed" id="flexCheck12" name="chkbox[]">
												<label class="form-check-label" for="flexCheck12">
													Hawan Allowed
												</label>
											</div>
										</div>



										<div class="col-lg-12 p-t-5"><input type="checkbox" style="width: 0px" value="" id="flexCheck0" name="chkbox_1[]"></div>
										<div class="col-lg-12 p-t-5"><label class="" style="color: #a6aeb1;">Other Information</label></div>
										<div class="col-lg-3 p-t-10">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="A.C or Cooler or Fan" id="flexCheck13" name="chkbox_1[]">
												<label class="form-check-label" for="flexCheck13">
													A.C or Cooler or Fan
												</label>
												<input class="form-check-input" type="checkbox" value="Decoration Inside & Outside" id="flexCheck14" name="chkbox_1[]">
												<label class="form-check-label" for="flexCheck14">
													Decoration Inside & Outside
												</label>
												<input class="form-check-input" type="checkbox" value="Trained Staff" id="flexCheck15" name="chkbox_1[]">
												<label class="form-check-label" for="flexCheck15">
													Trained Staff
												</label>
											</div>
										</div>
										<div class="col-lg-3 p-t-10">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="Only Decoration inside" id="flexCheck16" name="chkbox_1[]">
												<label class="form-check-label" for="flexCheck16">
													Only Decoration inside
												</label>
												<input class="form-check-input" type="checkbox" value="Only Decoration Outside" id="flexCheck17" name="chkbox_1[]">
												<label class="form-check-label" for="flexCheck17">
													Only Decoration Outside
												</label>
											</div>

										</div>
										<div class="col-lg-12 p-t-20 text-center">
											<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Add</button>
											<button type="reset" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Reset</button>
										</div>
									</div>
								</div>
							</div>
					</form>
				</div>
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