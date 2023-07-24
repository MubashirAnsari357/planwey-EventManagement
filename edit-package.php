<?php
session_start();
include 'class/conn.php';
if (!isset($_SESSION['admin_id'])) {
	header("Location: login.php");
}

$msg = "";

if ($_POST) {
	$id = mysqli_real_escape_string($connection, $_POST['id']);
	$property_name = mysqli_real_escape_string($connection, $_POST['pl_name']);
	$package_name = mysqli_real_escape_string($connection, $_POST['p_name']);
	$package_desc = mysqli_real_escape_string($connection, $_POST['p_details']);
	$food_type = mysqli_real_escape_string($connection, $_POST['food_type']);
	$food_price = mysqli_real_escape_string($connection, $_POST['v_price']);
	$food_details = mysqli_real_escape_string($connection, $_POST['food_details']);
	$dj_price = mysqli_real_escape_string($connection, $_POST['dj_price']);
	$photographer_price = mysqli_real_escape_string($connection, $_POST['pv_price']);

	// $query = mysqli_query($connection, "UPDATE package_tbl SET property_id='{$property_name}',package_name='{$package_name}',package_desc='{$package_desc}',food_type='{$food_type}',food_details='{$food_details}',food_price='{$food_price}',dj_price='{$dj_price}',photographer_price='{$photographer_price}' WHERE package_id='{$id}'") or die(mysqli_error(($connection)));

	extract($_POST);

	if (isset($_FILES['fileUpload']['name'])) 
	{
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
			
		}
		$query = mysqli_query($connection, "UPDATE package_tbl SET property_id='{$property_name}',package_name='{$package_name}',package_desc='{$package_desc}',food_type='{$food_type}',food_details='{$food_details}',food_price='{$food_price}',dj_price='{$dj_price}',photographer_price='{$photographer_price}',package_imgs='{$filepath}' WHERE package_id='{$id}' ") or die(mysqli_error(($connection)));
	} 
	else 
	{
		$filepath = "";
	}
	if($query)
	{
		$msg = '<div class="alert alert-success" role="alert">
				Record Updated Successfully. Redirecting you to the Display page </div> ';
				header("Refresh: 3; URL=view-package.php");
	}
	

}

$eid = $_GET['eid'];
if (!isset($_GET['eid']) || empty($_GET['eid'])) {
	header("Location: view-package.php");
}

$squery = "SELECT
	`package_tbl`.`package_id`
	, `property_tbl`.`property_name`
	, `package_tbl`.`package_name`
	, `package_tbl`.`package_desc`
	, `package_tbl`.`food_type`
	, `package_tbl`.`food_price`
	, `package_tbl`.`food_details`
	, `package_tbl`.`dj_price`
	, `package_tbl`.`photographer_price`
	, `package_tbl`.`package_imgs`
	FROM
		`property_tbl`
	INNER JOIN `package_tbl` 
		ON (`property_tbl`.`property_id` = `package_tbl`.`property_id`) WHERE package_id='{$eid}'";
$selectq = mysqli_query($connection, $squery) or die(mysqli_error($connection));
$productrow = mysqli_fetch_array($selectq);


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
	<title>Edit Package</title>
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
								<div class="page-title">Edit Package</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="view-package.php">Package</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Edit Package</li>
							</ol>
						</div>
					</div>
					<form action="#" id="myform" method="POST"  enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12">
								<?php echo $msg; ?>
								<div class="card-box">
									<div class="card-head">
										<header>Edit Package</header>
									</div>
									<div class="card-body row">
										<input type="hidden" name="id" value="<?php echo $productrow['package_id']; ?>">
										<div class="col-lg-6 p-t-20">
											<?php
											$selectq = mysqli_query($connection, "SELECT * from property_tbl") or die(mysqli_error($connection));
											echo '<label>Property Name</label>';
											echo "<select class='form-control' name='pl_name'>";
											while ($propertyrow = mysqli_fetch_array($selectq)) {
												echo "<option value='{$propertyrow['property_id']}'>{$propertyrow['property_name']}</option>";
											}
											echo "</select>";
											?>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="text" name="p_name" value="<?php echo $productrow['package_name']; ?>">
												<label class="mdl-textfield__label">Package Name</label>
											</div>
										</div>
										<div class="col-lg-12 p-t-20">
											<div class="mdl-textfield mdl-js-textfield txt-full-width">
												<textarea class="mdl-textfield__input" rows="2" id="text8" name="p_details"><?php echo $productrow['package_desc']; ?></textarea>
												<label class="mdl-textfield__label">Package Description</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="text" name="food_type" value="<?php echo $productrow['food_type']; ?>">
												<label class="mdl-textfield__label">Food Type</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="number" name="v_price" value="<?php echo $productrow['food_price']; ?>">
												<label class="mdl-textfield__label">Food Price (Plate)</label>
											</div>
										</div>
										<div class="col-lg-12 p-t-20">
											<div class="mdl-textfield mdl-js-textfield txt-full-width">
												<textarea class="mdl-textfield__input" rows="2" id="text6" name="food_details"><?php echo $productrow['food_details']; ?></textarea>
												<label class="mdl-textfield__label">Food Details</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="number" name="dj_price" value="<?php echo $productrow['dj_price']; ?>">
												<label class="mdl-textfield__label">DJ System Price</label>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="number" name="pv_price" value="<?php echo $productrow['photographer_price']; ?>">
												<label class="mdl-textfield__label">Photo/Video Grapher Price</label>
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
													<input type="file" name="fileUpload[]" class="custom-file-input" id="chooseFile">
													<label class="custom-file-label" for="chooseFile">Images</label>
												</div>
											</div>
										</div>

									</div>
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Update</button>
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