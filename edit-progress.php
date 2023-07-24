<?php
session_start();
include 'class/conn.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
}

$eid = $_GET['eid'];
if (!isset($_GET['eid']) || empty($_GET['eid'])) {
    header("Location: view-progress.php");
}

$selectq = mysqli_query($connection, "select * from progress_tbl WHERE progress_id='{$eid}'") or die(mysqli_error($connection));
$productrow = mysqli_fetch_array($selectq);

$msg = "";

if ($_POST) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $booking_id = mysqli_real_escape_string($connection, $_POST['b_id']);
    $event_status = mysqli_real_escape_string($connection, $_POST['e_status']);
    $progress_date = ($_POST['p_date']);
    $progress_img = "upload/" . $_FILES['fileUpload']['name'];
    $query = mysqli_query($connection, "UPDATE progress_tbl SET booking_id='{$booking_id}', event_status='{$event_status}', progress_date='{$progress_date}', progress_img='{$progress_img}' WHERE progress_id='{$id}'") or die(mysqli_error(($connection)));

    if ($query) {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], $progress_img);
        $msg = '<div class="alert alert-success" role="alert">
                            Record Updated Successfully. Redirecting you to the Display page </div> ';
        header('Refresh: 3; url=view-progress.php');
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
    <title>Edit Progress</title>
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
                                <div class="page-title">Edit Progress</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="view-progress.php">Progress</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Edit Progress</li>
                            </ol>
                        </div>
                    </div>
                    <form action="#" id="myform" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php echo $msg; ?>
                                <div class="card-box">
                                    <div class="card-head">
                                        <header>Edit Progress</header>
                                    </div>
                                    <div class="card-body row">
                                        <input type="hidden" name="id" value="<?php echo $productrow['progress_id']; ?>">
                                        <div class="col-lg-6 p-t-20">
                                            <?php
                                            $selectq = mysqli_query($connection, "SELECT * from booking_tbl") or die(mysqli_error($connection));
                                            echo '<label>Booking ID</label>';
                                            echo "<select class='form-control' name='b_id'>";
                                            while ($propertyrow = mysqli_fetch_array($selectq)) {
                                                echo "<option>{$propertyrow['booking_id']}</option>";
                                            }
                                            echo "</select>";
                                            ?>
                                        </div>
                                        <div class="col-lg-6 p-t-20">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                <input class="mdl-textfield__input" type="text" name="e_status" value="<?php echo $productrow['event_status']; ?>">
                                                <label class="mdl-textfield__label">Event Status</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 p-t-20">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                <input class="mdl-textfield__input" type="date" id="date" name="p_date" value="<?php echo $productrow['progress_date']; ?>">
                                                <label class="mdl-textfield__label">Date</label>
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
                                                    <input type="file" name="fileUpload" class="custom-file-input" id="chooseFile">
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