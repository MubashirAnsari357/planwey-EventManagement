<?php
session_start();
include 'class/conn.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
}
$msg = "";
if ($_POST) {
    $old_pass = mysqli_real_escape_string($connection, $_POST['old_password']);
    $new_pass = mysqli_real_escape_string($connection, $_POST['password']);
    $confirm_pass = mysqli_real_escape_string($connection, $_POST['confirm_password']);

    $oldpassquery = mysqli_query($connection, "select password from user_tbl where user_id='{$_SESSION['user_id']}'") or die(mysqli_error($connection));
    $oldpassfromdb = mysqli_fetch_array($oldpassquery);

    if ($oldpassfromdb['password'] == $old_pass) {
        if ($new_pass == $confirm_pass) {
            if ($old_pass == $new_pass) {
                $msg = "<div class='alert alert-warning' role='alert'> New and old Password must be different </div>";
            } else {
                $updateq = mysqli_query($connection, "update user_tbl set password='{$new_pass}' where user_id='{$_SESSION['user_id']}'") or die(mysqli_error($connection));
                if ($updateq) {
                    $msg = "<div class='alert alert-success' role='alert'>Password change sucessfully. Redirecting you to Dashboard</div>";
                    header ("Refresh: 3; URL=index.php");
                }
            }
        } else {
            $msg = '<div class="alert alert-warning" role="alert"> New and confirm Password must be same </div>';
        }
    } else {
        $msg = "<div class='alert alert-warning' role='alert'> Old Password doesn't match </div>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="SmartUniversity" />
	<title>Login</title>
	<?php
	include "themepart/styles.php";
	?>
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/jquery.validate.js"></script>
	<script src="assets/js/validate-form.js"></script>
	<style>
		.error{
			color: whitesmoke;
		}
	</style>
</head>

<body>
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="login100-form" id="contactform" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data"> 
					<span class="login100-form-logo">
						<i class="zmdi zmdi-flower"></i>
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Change Password
					</span>
					<div class="wrap-input100">
						<?php echo $msg; ?>
					</div>
					<div class="wrap-input100">
						<input class="input100" type="password" name="old_password" placeholder="Old Password">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100">
						<input class="input100" id="password" type="password" name="password" placeholder="New Password">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100">
						<input class="input100" type="password" name="confirm_password" placeholder="Confirm New Password">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Submit
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- start js include path -->
	<!-- bootstrap -->
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/pages/extra_pages/login.js"></script>
	<!-- end js include path -->
</body>

</html>