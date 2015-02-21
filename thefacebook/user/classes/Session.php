<?php

class Session
{
	static function Set($key, $value)
	{
		$_SESSION[$key] = serialize($value);
	}

	static function Get($key)
	{
		if(isset($_SESSION[$key]))
			return unserialize($_SESSION[$key]);
		else
			return false;
	}

	static function SetValue($key)
	{ 
    	if(isset($_POST[$key]))
    		return Validate::Escape($_POST[$key]);
	}
}