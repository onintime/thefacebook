<?php
require_once '../config/init.php';

if(!Authentication::IsLogged())
	header('Location: ../index.php');

$user = Session::Get('current_user');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../assets/jcrop/css/jquery.Jcrop.min.css" />
		<script type="text/javascript"> var PLS_config = {	ajax_url : '<?php echo Config::Get('base_url').'auth/ajax.php'; ?>',};</script>
		<script type="text/javascript" src="../assets/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="../assets/js/premiumlogin.min.js"></script>
		<script type="text/javascript" src="../assets/jcrop/js/jquery.Jcrop.min.js"></script>
	</head>
	<body style="text-align:center;width:30%;margin:auto;">
		<img class="avatar" src="<?php echo $user->GetAvatar(); ?>" style="width:30px;"> 
		<span class="username"><?php echo $user->Get('username') ?></span><br>
		<a href="./">Settings</a><br>
		<?php if($user->IsAdmin()) : ?>
			<a href="../admin/">Admin</a><br>
		<?php endif; ?>
		<a href="../auth/logout.php">Logout</a>
		<br><br><br>
		<h2>Update your profile settings</h2>
		<form class="ajaxform" method="POST" action="">	
			<div class="message-box"></div>
			Username:
			<input type="text" name="username" value="<?php echo $user->Get('username');?>"><br>
			Email:
			<input type="text" name="email" value="<?php echo $user->Get('email');?>"><br>
			Full name:
			<input type="text" name="fullname" value="<?php echo $user->Get('fullname');?>"><br>
			Phone:
			<input type="text" name="phone" value="<?php echo $user->Get('phone');?>"><br>
			Location:
			<input type="text" name="location" value="<?php echo $user->Get('location');?>"><br>
			About:
			<textarea name="about"><?php echo $user->Get('about');?></textarea><br>
			Gender:
			<input type="radio" name="gender" value="F" id="female" <?php if($user->Get('gender') == 'F') echo 'checked';?>><label for="female">Female</label>
			<input type="radio" name="gender" value="M" id="male" <?php if($user->Get('gender') == 'M') echo 'checked';?>><label for="male">Male</label>
			<input type="radio" name="gender" value="O" id="other" <?php if($user->Get('gender') == 'O') echo 'checked';?>><label for="other">Other</label><br>
			<input type="hidden" name="action" value="settings_general">
			<button type="submit" name="changegeneral">SAVE SETTINGS</button><br>
		</form>
		<h2>Upload a new profile image</h2>
		<div class="crop_upload">
			<input type="file" name="upload_field">
	    </div>
	    <form class="ajaxform crop_form" method="POST" action="">
	    	<div class="message-box"></div>
	    	<div class="crop_image"></div>
			<input type="hidden" id="x" name="x">
			<input type="hidden" id="y" name="y">
			<input type="hidden" id="w" name="w">
			<input type="hidden" id="h" name="h">
			<input type="hidden" name="action" value="settings_crop">
			<button class="crop_save" type="submit" name="save" disabled style="display:none">Save</button>
	    </form>
		<h2>Change your password</h2>
		<form class="ajaxform" method="POST" action="">
			<div class="message-box"></div>
			Old password:
			<input type="password" name="opassword"><br>
			New password:
			<input type="password" name="password"><br>
			Confirm new password:
			<input type="password" name="cpassword"><br>
			<input type="hidden" name="action" value="settings_password">
			<button type="submit" name="changepassword">CHANGE PASSWORD</button>
		</form>
	</body>
</html>