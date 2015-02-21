<?php
require_once '../config/init.php';

if(Authentication::IsLogged())
	header("Location: ../index.php");
require_once "topsec.php";
?>

		<h2>Recover your password</h2>
		<form class="ajaxform"  method="POST" action="">
			<div class="message-box"></div>
			Email:<br>
			<input type="text" name="email"><br>
			<div id="PLS_recaptcha_widget">
				<div id="recaptcha_image"></div>
				<a href="javascript:Recaptcha.reload()">Reload</a>
				<a class="recaptcha_only_if_image link" href="javascript:Recaptcha.switch_type('audio')">Listen</a>
				<a class="recaptcha_only_if_audio link" href="javascript:Recaptcha.switch_type('image')">Image</a>
				<a class="link" href="javascript:Recaptcha.showhelp()">Help</a><br>
				Recaptcha:
				<input type="text" id="recaptcha_response_field" name="recaptcha_response_field">
			</div><br>
			<input type="hidden" name="action" value="recover">
			<button type="submit" class="inputsubmit" name="recover">RESET PASSWORD</button>	
		</form>
		<br><br>
		<a href="login.php">Log In</a> |
		<a href="signup.php">Sign Up</a> |
		<a href="reactivate.php">Resend Activation Email</a> 
		<script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=<?php echo Config::Get('captcha.public'); ?>"></script>

<?php require_once "bottomsec.php"; ?>