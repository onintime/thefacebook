<?php
require_once '../config/init.php';

if(!Authentication::IsLogged())
  header("Location: ../index.php");

$user = Session::Get('current_user');
if(!$user->IsAdmin())
	header("Location: ../index.php");
else
	define("ADMIN", 1);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script type="text/javascript"> var PLS_config = {	ajax_url : '<?php echo Config::Get('base_url').'auth/ajax.php'; ?>',};</script>
		<script type="text/javascript" src="../assets/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="../assets/js/premiumlogin.min.js"></script>
	</head>
	<body style="text-align:center;width:30%;margin:auto;">
		<img class="avatar" src="<?php echo $user->GetAvatar();?>" style="height:30px;">
		<span class="username"><?php echo $user->Get('username');?></span><br> 
		<a href="../user/">Settings</a><br>
		<a href="./">Admin</a><br>
		<a href="../auth/logout.php">Logout</a><br>
		<a href="./?page=adduser">Add User</a>
		<a href="./?page=compose">Compose Email</a>
		<br><br>
		<?php
		if(isset($_GET['page']))
		{
			switch ($_GET['page']) 
			{
				case 'adduser':
					require 'adduser.php';
					break;
				
				case 'edituser':
					require 'edituser.php';
					break;

				case 'compose':
					require 'compose.php';
					break;

				case 'delete':
					require 'delete.php';
					break;

				default:
					require 'users.php';
					break;
			}
		}
		else
			require 'users.php';
		?>
	</body>
</html>