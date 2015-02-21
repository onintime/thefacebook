<?php
include('../../admin/classes/classes.php');
require_once '../config/init.php';
if(Authentication::IsLogged()){
	header("Location: ../../home.php");
}
$error = "";
if(isset($_POST['submit'])){
	if(((!empty($_POST['username'])))||(!empty($_POST['password']))){
		$auth = new Authenticate();
		$check = $auth->login($_POST['username'],$_POST['password']);
		if(!empty($_SESSION['authData'])){
			header("Location: ../../home.php");
			//echo "Loading...";
			//echo "<script>window.location='".SITE_URL."';</script>";
		}else{
		$error = "Invalid username / password. Please Try again!";	
		}
	}elseif(((empty($_POST['username'])))&&(empty($_POST['password']))){
		$error = "username / password are not set. Please Try again!";	
	}else{
	$error = "Invalid Session. Please Try again!";
	}
}
require_once "topsec.php";
?>
		<form class="ajaxform" method="POST" action="">
			<div class="message-box" style="text-align:center;
            padding:5px;"><?php echo $error; ?></div>
            <table style="width:450px; margin:auto;">
            <tr>
            <td width="20%">
			<label>Username:</label>
            </td>
            <td>
			<input type="text" name="username" style="width:100%" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>" />
            </td>
            </tr>
            <tr>
            <td>
			<label>Password:</label>
            </td>
            <td>
			<input type="password" name="password" style="width:100%" />
            </td>
            </tr>
            </table>
             <table style="width:450px; margin:auto; text-align:center;">
            <tr>
            <td >
			<input id="rememberme" type="checkbox" name="rememberme">
			<label for="rememberme">Remember me</label><br><br>
			<input type="hidden" name="action" value="login">
			<button type="submit" class="inputsubmit" name="login">LOG IN</button>&nbsp; &nbsp;<input class="inputsubmit" type="button" value="Register" onclick="javascript:document.location='signup.php'">
            </td>
            </tr>
            </table>
		</form>
            <br>
		<a href="signup.php">Sign Up</a> | 
		<a href="recover.php">Forgot Password</a> | 
		<a href="reactivate.php">Resend Activation Email</a>
<?php require_once "bottomsec.php"; ?>