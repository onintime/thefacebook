<?php if(!defined('ADMIN')) die("Access denied!"); 
$compose_user = new User();
if(isset($_GET['id']) && $compose_user->Load(array('id' => $_GET['id'])))
	$email = $compose_user->Get('email');
else
	$email = '';
 ?>
  	<form class="ajaxform" method="POST" action="">
 		<h2>Compose an email</h2>
		<div class="message-box"></div>
		To:
		<input type="text" name="email" value="<?php echo $email; ?>"><br>
		Subject:
		<input type="text" name="subject"><br>
		Message:
		<textarea name="message"></textarea><br>
		<input type="hidden" name="action" value="admin_compose">
		<button type="submit" name="sendemail">SEND EMAIL</button>
	</form>
