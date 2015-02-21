<?php
require_once '../config/init.php';

if(!Session::Get('twitter_user'))
	header('Location: ../index.php');

$user_data = Session::Get('twitter_user');
if(isset($_POST['continue']))
{
	$validator = new Validate();
	if($validator->AddValue('email', $_POST['email'])->AddPattern('email-unique')->Check())
	{
		$user_data['email'] = $_POST['email'];
		Authentication::ConnectTwitter($user_data);
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body style="text-align:center;margin:auto;width:300px;">
		<h2>Twitter doesn`t allow us to access your email account. Please enter your email adress to continue.</h2>
		<form method="POST" action="">
			<?php if(Error::HasErrors()): ?>
			<div class="message-box"><!--  add your error class here -->
				<ul>
					<?php foreach (Error::GetAll() as $key => $value) {echo '<li>'.$value.'</li>';}?>
				</ul>
			</div>
			<?php endif; ?>
			Email:
			<input type="text" name="email"><br>
			<button type="submit" name="continue">CONTINUE</button> 
		</form>
	</body>
</html>
