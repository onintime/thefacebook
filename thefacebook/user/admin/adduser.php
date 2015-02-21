<?php if(!defined('ADMIN')) die("Access denied!");?>
	<form class="ajaxform" method="POST" action="">
		<h2>Create a new user</h2>
		<div class="message-box"></div>
		Username:
		<input type="text" name="username"><br>
		Email:
		<input type="text" name="email"><br>
		User type:
		<select name="user_type">
			<option value="user">user</option>
			<option value="admin">admin</option>
		</select><br>
		Activation state:
		<select name="activation_state">
			<option value="1">activated</option>
			<option value="0">unactivated</option>
		</select><br>
		Password:
		<input type="password" name="password"><br>
		Confirm password:
		<input type="password" name="cpassword" ><br>
		<input id="emailpassword" type="checkbox" name="emailpassword"><label for="emailpassword">Email password to the user.</label><br>
		<input type="hidden" name="action" value="admin_add">
		<button type="submit" name="adduser">ADD USER</button>
	</form>
