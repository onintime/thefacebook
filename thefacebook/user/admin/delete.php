<?php if(!defined('ADMIN')) die("Access denied!"); ?>

	<form class="ajaxform" method="POST" action="">
		<h2>Confirm action</h2>
		<div class="message-box"></div>
		<p>Are you sure you want to delete user ?</p>
	  	<input type="hidden" name="user_id" value="<?php echo @$_GET['id']; ?>">
	  	<input type="hidden" name="action" value="admin_delete">
		<button type="submit" name="delete">Yes</button>
	</form>