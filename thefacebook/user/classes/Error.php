<?php


class Error 
{
	static $errors = array();

	static function Clear()
	{
		self::$errors = array();
	}

	static function Get($field)
	{
		return (isset(self::$errors[$field])) ? self::$errors[$field] : false;
	}

	static function GetFirst()
	{
		$array = self::$errors;
		return array_shift($array);
	}

	static function GetAll()
	{
		return self::$errors;
	}

	static function Set($field, $key)
	{
		$error = Config::Get("errors.$key", $key);
		self::$errors[$field] = $error;
	}

	static function HasErrors()
	{
		return (count(self::$errors) == 0) ? false : true;
	}
}