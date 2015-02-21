<?php
require_once 'config/init.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script type="text/javascript">var PLS_config = {ajax_url: '<?php echo Config::Get('base_url').'auth/ajax.php'; ?>'};</script>
	</head>
	<body style="text-align:center;width:30%;margin:auto;">
		<?php if(Authentication::IsLogged()): $user = Session::Get('current_user');echo ("<script>window.location = '../';</script>"); ?><br><br>
<br>
<?php // echo DB_HOST; ?>
        <?php // var_dump($_SESSION['authData']); ?>
<br>
<?php //var_dump($_SESSION['current_user']);
//foreach($arr as $arrv){
	
//	echo $arr[2]."<br>".$arr[4];
//}
 ?>
<br>
<br>
	<?php // if($user->IsLogged()): ?>
    <?php // endif; ?>
			<img src="<?php echo $user->GetAvatar(); ?>" style="width:30px;"> 
			Welcome back, <?php echo $user->Get('username') ?><br>
			<a href="user/">Settings</a><br>
			<?php if($user->IsAdmin()) : ?>
				<a href="admin/">Admin</a><br>
			<?php endif; ?>
			<a href="auth/logout.php">Logout</a>
		<?php else: ?>
			<a href="auth/login.php">LOG IN</a><br>
			<a href="auth/signup.php">SIGN UP</a>
		<?php endif; ?>
	</body>
</html>