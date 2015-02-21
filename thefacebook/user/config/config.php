<?php

return array(

	//your site base url
	'base_url' => SITE_URL.'/user/',
	'base_dir' => ROOT_DIR.'user/',
	//database connect credentials
	'db' => array(
		'host' => DB_HOST,
		'username' => DB_USER,
		'password' => DB_PASS,
		'name' => DB_NAME,
		'table' => 'premiumlogin',
		),

	//recaptha API keys -- fill in if you want to use captha
	//(www.recaptcha.net)
	'captcha' => array(
		'public' => CAPTCHA_PUBLIC_KEY,
		'private' => CAPTCHA_PRIVATE_KEY,
		),
	
	//social login API --- fill in if you want to connect with social networks
	'social' => array(

		//(https://developers.facebook.com/)
		'facebook' => array(
			'id' => '',
			'secret' => '',
			),
		//(https://console.developers.google.com/project)
		'google' => array(
			'id' => '',
			'secret' => '',
			'dev' => '',
			),
		//(https://dev.twitter.com/)
		'twitter' => array(
			'id' => '',
			'secret' => '',
			),
		),

	'avatar' => array(
		'upload_path' => 'uploads/',
		'maxsize' => '3000000',
		'resolution' => '400',
		),

	'validation' => array(
		'password_lenght' => 6,
		'use_captcha' => true,
		'email_activation' => true,
		),

	'email' => array(
		'use_PHPMailer' => false, //turn false if sendgrid true
		'sendgrid' => false, //using sendgrid
		'use_smtp' => false,
		'smtp_auth' => false,
		'smtp_secure' => 'ssl',
		'host' => 'smtp.live.com',
		'port' => 465,
		'username' => '', //email account / sendgrid username
		'password' => '', 
		'from' => FROM_MAIL,     //email account
		'from_name' => FROM_NAME,// display name
		),
	);