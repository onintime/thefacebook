<?php
require_once '../config/init.php';

if(Authentication::IsLogged())
	header("Location: ../index.php");

$success = Authentication::Activate(@$_GET['key']);

require_once "topsec.php";
?>
		<div class="message-box"> <!-- add error/success class here -->
			<ul><li><?php echo (!empty($success)) ? Config::Get('success.activate') : Error::GetFirst(); ?></li></ul>
		</div> 
        <a href="../../index.php">Go back</a>
	

<?php require_once "bottomsec.php"; ?>

