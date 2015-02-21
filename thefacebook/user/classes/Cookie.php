<?php
class Cookie
{
	static function Set($username, $password)
	{
		$name = "rememberme";
		$value = base64_encode($username."/".$password);
		$expire = 60 * 60 *24 * 30 + time();
		$path = '/';
		setcookie($name, $value, $expire, $path);
	}

	static function Get()
	{
		if(isset($_COOKIE['rememberme']))
		{
			$value = base64_decode($_COOKIE['rememberme']);
			$value = explode("/", $value);
			$result = array('username' => $value[0], 'password' => $value[1]);
			return $result;
		}
		return false;
	}

	static function Clear()
	{
		if(isset($_COOKIE['rememberme'])) 
		{
  			unset($_COOKIE['rememberme']);
 	 		setcookie('rememberme', '', time() - 3600, '/');
		}
	}
}