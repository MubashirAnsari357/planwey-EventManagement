<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'class/conn.php';
$msg = "";
if($_POST)
{
    $email =  mysqli_real_escape_string($connection,$_POST['email']);

    $selectquery = mysqli_query($connection,"select * from user_tbl where email_id='{$email}'") or die(mysqli_error($connection));
    $count = mysqli_num_rows($selectquery);
    $row = mysqli_fetch_array($selectquery);

	$_SESSION["username"] = $row['full_name'];

	$username = $_SESSION["username"];

    if($count>0)
    {
        //Load Composer's autoloader
        require '../MailDemo/vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '';                     //SMTP username
            $mail->Password   = '';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('', 'Planway');
            $mail->addAddress($email, '');     //Add a recipient


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Forgot Password';
            $mail->Body    = "Hi, $username your password is {$row['password']}";
            $mail->AltBody = "Hi, $username your password is {$row['password']}";

            $mail->send();
            $msg = "<div class='alert alert-success' role='alert'>Your password has been sent to your email id.</div>";
        } catch (Exception $e) {
            echo "<div class='alert alert-warning' role='alert'>Email could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
        }
            
        }
        else
        {
            $msg = "<div class='alert alert-warning' role='alert'> Email Id is invalid! </div>";
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
				<form class="login100-form" id="contactform" action="#" method="POST" enctype="multipart/form-data">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-flower"></i>
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Forgot Password
					</span>
					<div class="wrap-input100">
						<?php echo $msg; ?>
					</div>
					<div class="wrap-input100">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100""></span>
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