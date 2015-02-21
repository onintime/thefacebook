<?php
require_once '../config/init.php';

if(isset($_GET['id']))
{
	$user = new User();
	if(!$user->Load(array('id' => $_GET['id'])))
		Error::Set('user', 'usernotfound');
}
else
	Error::Set('user', 'usernotfound');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body style="text-align:center;margin:auto;width:300px;">
		<?php if(Error::HasErrors()): ?>
			<div class="message-box"> <!--  add your error class here -->
				<ul><li><?php echo Error::GetFirst(); ?></li></ul>
			</div>
		<?php else: ?>
			<?php if(Authentication::IsLogged()): ?>
				<h2>Logged as <?php echo Session::Get('current_user')->Get('username'); ?></h2>
				<a href="../user/settings.php">My Account</a>
				<a href="../auth/logout.php">Logout</a>
			<?php else: ?>
				<a href="../auth/login.php">Log in</a>
				<a href="../auth/signup.php">Sign up</a>
			<?php endif; ?>
			<img src="<?php echo $user->GetAvatar();?>" style="width:300px;"><br>
			<?php echo $user->Get('username'); ?><br>
			Joined : <?php echo $user->Get('join_date'); ?>
		<?php endif; ?>
	</body>
</html>
