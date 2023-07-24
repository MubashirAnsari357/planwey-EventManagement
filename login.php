<?php
session_start();
$msg = "";
if(isset($_POST['submit']))
{
    include 'class/conn.php';

    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password = ($_POST['password']);

    $sql = "SELECT user_id, full_name, email_id, is_admin FROM user_tbl WHERE email_id = '{$email}' AND password = '{$password}' AND is_admin = 1";
    $result = mysqli_query($connection,$sql) or die('Query Failed');

    if(mysqli_num_rows($result) > 0)
    {
		while($row = mysqli_fetch_assoc($result))
		{
			$_SESSION["username"] = $row['full_name'];
			$_SESSION["admin_id"] = $row['user_id'];
	 
		}
		$msg = '<div class="alert alert-success" role="alert">
						Login Successful. Redirecting you to Dashboard </div> ';
         header("Refresh: 3; url=index.php");
    }
    else
    {
        $msg = '<div class="alert alert-danger" role="alert">
						Invalid Email Or Password </div> ';
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
						Log in
					</span>
					<div class="wrap-input100">
					<?php echo $msg; ?>
					</div>
					<div class="wrap-input100">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="Submit" name="submit">
							Login
						</button>
					</div>
					<div class="text-center p-t-90">
						<a class="txt1" href="forgot-password.php">
							Forgot Password?
						</a>
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