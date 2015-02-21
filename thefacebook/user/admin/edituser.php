<?php if(!defined('ADMIN')) die("Access denied!");
$edit_user = new User();
if(isset($_GET['id']) && $edit_user->Load(array('id' => $_GET['id']))): ?>
	<form class="ajaxform" method="POST" action="">
		<h2>Edit an user</h2>
		<div class="message-box"></div>
		Username:
		<input type="text" name="username" value="<?php echo $edit_user->Get('username');?>"><br>
		Email:
		<input type="text" name="email" value="<?php echo $edit_user->Get('email');?>"><br>
		User type:
		<select name="user_type">
			<option value="user" <?php echo ($edit_user->Get('user_type') == 'user')?'selected':'';?>>user</option>
			<option value="admin" <?php echo ($edit_user->Get('user_type') == 'admin')?'selected':'';?>>admin</option>
		</select><br>
		Activation state:
		<select name="activation_state">
			<option value="1" <?php echo ($edit_user->Get('activation_state') == '1')?'selected':'';?>>activated</option>
			<option value="0" <?php echo ($edit_user->Get('activation_state') == '0')?'selected':'';?>>unactivated</option>
		</select><br>
		Fullname:
		<input type="text" name="fullname" value="<?php echo $edit_user->Get('fullname');?>"><br>
		Phone:
		<input type="text" name="phone" value="<?php echo $edit_user->Get('phone');?>"><br>
		Location
		<input type="text" name="location" value="<?php echo $edit_user->Get('location');?>"><br>
		About:
		<textarea name="about" ><?php echo $edit_user->Get('about');?></textarea><br>
		New password:
		<input type="password" name="password"><br>
		Confirm password:
		<input type="password" name="cpassword"><br>
		<input type="radio" name="gender" value="F" id="female" <?php if($edit_user->Get('gender') == 'F') echo 'checked';?>><label for="female">Female</label>
		<input type="radio" name="gender" value="M" id="male" <?php if($edit_user->Get('gender') == 'M') echo 'checked';?>><label for="male">Male</label>
		<input type="radio" name="gender" value="O" id="other" <?php if($edit_user->Get('gender') == 'O') echo 'checked';?>><label for="other">Other</label><br>
		<input type="hidden" name="action" value="admin_edit">
		<input type="hidden" name="user_id" value="<?php echo $_GET['id']; ?>">
		<button type="submit" name="edituser">SAVE CHANGES</button>
	</form>
<?php else: header('Location: index.php'); endif; ?>