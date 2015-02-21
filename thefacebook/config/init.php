<?php
session_start();
define("ROOT_DIR","/home/thefacebook/public_html/beta/");
define("PLSPATH", __DIR__."/../");
include(ROOT_DIR."config.php");
require PLSPATH.'classes/Config.php';
require PLSPATH.'classes/Database.php';
require PLSPATH.'classes/Validate.php';
require PLSPATH.'classes/Authentication.php';
require PLSPATH.'classes/User.php';
require PLSPATH.'classes/Session.php';
require PLSPATH.'classes/Error.php';
require PLSPATH.'classes/Email.php';
require PLSPATH.'classes/Cookie.php';
require PLSPATH.'classes/Avatar.php';

Config::LoadFile("config/config.php");
Config::LoadFile("config/lang.php");
$db = new Database();
$db->Connect();

if(Config::Get("validation.use_captcha"))
	require PLSPATH.'classes/vendor/captcha/recaptchalib.php';
function escapestr($input){
		preg_match('~"(.*?)"~', $input, $output);
		return $output[1]; 
}
if(isset($_SESSION['current_user']))
{
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	$arr = explode(";",$_SESSION['current_user']);
	$qry = "SELECT `id`,`accountstatusid`,`name`,`schoolid` FROM `user` WHERE `email`='".escapestr($arr[6])."'";
	$qry_run = mysql_query($qry);
	if(!$qry_run){
		die(mysql_error());
	}else{
		$qrs = mysql_fetch_assoc($qry_run);
		 $authData = array();
		 $authData['name']  = $qrs['name'];
		 $authData['id'] = $qrs['id'];
		 $authData['accountstatus'] = $qrs['accountstatusid'];
		 $authData['schoolid'] = $qrs['schoolid'];
		$_SESSION['authData'] = $authData; 
		//die($qrs['name']);
	}
	//echo escapestr($arr[6]);
}
		
if(isset($_COOKIE["rememberme"]))
{
	if(!Authentication::Login(Cookie::Get(), true))
	{
		Cookie::Clear();
	}
}