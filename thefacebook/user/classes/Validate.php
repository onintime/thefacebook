<?php

/**
* 
*/
class Validate
{
	private $data = array();
	private $index;

	public static function Escape($value)
	{
		 return trim(htmlentities($value, ENT_QUOTES, 'UTF-8'));
	}

	public static function Encrypt($value)
	{ 
        return md5($value);
	}

	public static function ValidCaptcha($recaptcha_challenge_field, $recaptcha_response_field)
	{
		if(empty($recaptcha_response_field))
		{
			Error::Set("captcha", "invalidcaptcha");
		}
		else
		{
			$resp = recaptcha_check_answer (Config::Get("captcha.private"),
                            				$_SERVER["REMOTE_ADDR"],
	                                        $recaptcha_challenge_field,
	                                        $recaptcha_response_field
	                                        );
			if($resp->is_valid)
				return true;
			Error::Set("captcha", "invalidcaptcha");
		}
		return false;
	}

	public function AddValue($name, $value)
	{
		$this->data[$name] = array('value' => $value);
		$this->index = $name;
		return $this;
	}

	public function AddRule($name, $value)
	{
		$this->data[$this->index][$name] = $value;
		return $this;
	}

	public function AddPattern($name)
	{
		switch ($name) 
		{
			case 'username':
				$this->AddRule('required', true)
					 ->AddRule('min', 4)
					 ->AddRule('contents', 'nospecialchar');
				break;

			case 'username-unique':
				$this->AddRule('required', true)
					 ->AddRule('min', 4)
					 ->AddRule('contents', 'nospecialchar')
					 ->AddRule('unique', Config::Get('db.table'));
				break;

			case 'email':
				$this->AddRule('required', true)
					 ->AddRule('min', 4)
					 ->AddRule('contents', 'email');
				break;

			case 'email-unique':
				$this->AddRule('required', true)
					 ->AddRule('min', 4)
					 ->AddRule('contents', 'email')
					 ->AddRule('unique', Config::Get('db.table'));
				break;

			case 'password':
				$this->AddRule('required', true)
					 ->AddRule('min', Config::Get('validation.password_lenght'));
				break;
		}
		return $this;
	}

	public function Check()
	{
		$passed = true;
		foreach ($this->data as $name => $rules) 
		{
			if(!$this->Validator($name, $rules) && $passed)
				$passed = false;
		}
		$this->data = array();
		return $passed;
	}

	private function Validator($name, $rules = array())
	{
		$value = array_shift($rules);
		foreach ($rules as $rule => $rule_val) 
		{
			switch ($rule) 
			{
				case 'required':
					if($rule_val && empty($value))
					{
						Error::Set($name, $name.'required');
						return false;
					}
					break;

				case 'min':
					if(strlen($value) < $rule_val)
					{
						Error::Set($name, $name.'min');
						return false;
					}
					break;

				case 'max':
					if(strlen($value) > $rule_val)
					{
						Error::Set($name, $name.'max');
						return false;
					}
					break;

				case 'unique':
					$db = new Database_user();
					if($db->Select($name)->Where($name, $value)->Limit(1)->Get($rule_val))
					{
						Error::Set($name, $name.'unique');
						return false;
					}
					break;

				case 'match':
					if($value !== $rule_val)
					{
						Error::Set($name, $name.'match');
						return false;
					}
					break;

				case 'contents':
					switch ($rule_val) 
					{
						case 'nospecialchar':
							if(!preg_match('/^[a-zA-Z0-9]+[a-zA-Z0-9\_\.]+[a-zA-Z0-9]+$/i', $value))
							{
								Error::Set($name, $name.'contents');
								return false;
							}
							
							break;

						case 'email':
							if(!filter_var($value, FILTER_VALIDATE_EMAIL))
							{
								Error::Set($name, $name.'contents');
								return false;
							}
							break;

						case 'alphanumeric':
							if(!ctype_alnum($value))
							{
								Error::Set($name, $name.'contents');
								return false;
							}
							break;

						case 'numeric':
							if(!ctype_digit($value))
							{
								Error::Set($name, $name.'contents');
								return false;
							}
							break;

						default:
							return false;
							break;
					}
					break;
				
				default:
					return false;
					break;
			}
		}
		return true;
	}
}