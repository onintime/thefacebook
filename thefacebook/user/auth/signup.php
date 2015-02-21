<?php
require_once '../config/init.php';

if(Authentication::IsLogged())
header("Location: ../../home.php");
require_once "topsec.php";
?>

		<form class="ajaxform"  method="POST" action="">
			<div class="message-box"></div><br>
            <table style="width:450px; margin:auto;">
            <tr>
                <td width="25%">
                Username:
                </td>
                <td>
                <input type="text" name="username" width="100%" style="width:100%">
                </td>
            </tr>
            <tr>
                <td>
                Email:
                </td>
                <td>
                <input type="text" name="email" style="width:100%">
                </td>
                </tr>
            <tr>
                <td>
                Password:
                </td>
                <td>
                <input type="password" name="password" style="width:100%">
                </td>
            </tr>
            <tr>
                <td>
                Confirm password:
                </td>
                <td>
                <input type="password" name="cpassword" style="width:100%">
                </td>
            </tr>
           </table>
            <table style="width:450px; margin:auto; text-align:left;">
            <tr>
            <td >
			<div id="PLS_recaptcha_widget">
				<div id="recaptcha_image"></div>
				<a href="javascript:Recaptcha.reload()">Reload</a>
				<a class="recaptcha_only_if_image link" href="javascript:Recaptcha.switch_type('audio')">Listen</a>
				<a class="recaptcha_only_if_audio link" href="javascript:Recaptcha.switch_type('image')">Image</a>
				<a class="link" href="javascript:Recaptcha.showhelp()">Help</a><br><br />
				Recaptcha:
				<input type="text" id="recaptcha_response_field" name="recaptcha_response_field">
			</div><br>

			<input type="hidden" name="action" value="signup">
			<button type="submit" class="inputsubmit" name="signup">Sign up</button>
            </td>
            </tr>
            </table>
		</form>
		<br><br>
		<span>or, log in with</span><br>
		<a href="login.php">Log In</a> | 
		<a href="recover.php">Forgot Password</a> | 
		<a href="reactivate.php">Resend Activation Email</a> |
		<script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=<?php echo Config::Get('captcha.public'); ?>"></script>

<?php require_once "bottomsec.php"; ?>
