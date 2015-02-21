<?php
require_once '../config/init.php';
if(Authentication::IsLogged())
	header("Location: ../index.php");
require_once "topsec.php";
?>
		<h2>Reset your password</h2>
		<form class="ajaxform"  method="POST" action="">
			<div class="message-box"></div>
			Password:<br>
			<input type="password" name="password"><br>
			Confirm password:<br>
			<input type="password" name="cpassword"><br>
			<input type="hidden" name="key" value="<?php echo @$_GET['key']; ?>">
			<input type="hidden" name="action" value="reset"><br>
			<button type="submit"  class="inputsubmit" name="reset">RESET PASSWORD</button>
		</form><br><br>
		<a href="../../index.php">Go back</a>

<?php require_once "bottomsec.php"; ?>
