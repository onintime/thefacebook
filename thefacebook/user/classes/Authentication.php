<?php
class Authentication
{
	static function IsLogged()
	{
		return !empty($_SESSION['current_user']);
	}

	static function Activate($key)
	{
		if(empty($key))
		{
			Error::Set("activation", "invalidlink");
		}
		else
		{
			$user = new User();
			
			$result = $user->Load(array('activation_key' => $key));

			if($result)
			{
				if($user->Get('activation_state') == '1')
					Error::Set("activation", "alreadyactivated");
				else
				{
					$user->Set("activation_state", "1");
					$user->Set("activation_key", md5(time()));
					$user->Save();
					return true;
				}
			}
			else
				Error::Set("activation", "invalidlink");
		}
		return false;
	}

	static function Reset($key, $password, $cpassword)
	{
		if(empty($key))
			Error::Set("recover", "invalidlink");
		else
		{
			$user = new User();
			$result = $user->Load(array('activation_key' => $key));

			if($result)
			{
				$validator = new Validate();
				$result = $validator->AddValue('password', $password)->AddPattern('password')
									->AddValue('cpassword', $cpassword)->AddRule('match', $password)
									->Check();

				if($result)
				{
					$user->Set("password",  Validate::Encrypt($password));
					$user->Set("activation_key", md5(time()));
					$user->Save();
					return true;
				}
			}
			else
				Error::Set("recover", "invalidlink");
		}
		return false;
	}

	static function Recover($fields)
	{
		$email = $fields['email'];
		$validator = new Validate();
		$result = $validator->AddValue('email', $email)->AddPattern('email')
							->Check();
		
		if(Config::Get("validation.use_captcha"))
			$result = Validate::ValidCaptcha($fields['recaptcha_challenge_field'], $fields['recaptcha_response_field']);

		if($result)
		{
			$user = new User();
			$result = $user->Load(array('email' => $email));

			if($result)
			{
				if($user->Get('activation_state') == '0')
					Error::Set("email", "notactivated");
				else
				{
					$key =  md5(time().$email);
					$user->Set("activation_key", $key);
					$user->Save();
				
					$url = Config::Get("base_url")."auth/reset.php?key=".$key;
					$url = '<a href="'.$url.'">'.$url.'</a>';
					Email_user::SendEmail($email, Config::Get("success.recover_subject"), Config::Get("success.recover_message").$url);
					return true;
				}
			}
			else
				Error::Set("email", "usernotfound");
		}
		return false;		
	}

	static function Reactivate($fields)
	{
		$validator = new Validate();
		$result = $validator->AddValue('email', $fields['email'])->AddPattern('email')
							->Check();
		
		if(Config::Get("validation.use_captcha"))
			$result = Validate::ValidCaptcha($fields['recaptcha_challenge_field'], $fields['recaptcha_response_field']);

		if($result)
		{
			$user = new User();
			$result = $user->Load(array('email' => $fields['email']));

			if($result)
			{
				if($user->Get('activation_state') == '1')
					Error::Set("email", "alreadyactivated");
				else
				{
					$key =  md5(time().$fields['email']);
					$user->Set("activation_key",$key);
					$user->Save();
				
					$url = Config::Get("base_url")."auth/activate.php?key=".$key;
					$url = '<a href="'.$url.'">'.$url.'</a>';
					Email_user::SendEmail($fields['email'], Config::Get("success.activation_subject"), Config::Get("success.activation_message").$url);
					return true;
				}
			}
			else
				Error::Set("email", "usernotfound");
		}
		return false;		
	}

	static function Login($fields, $encrypted = false)
	{
		$username = $fields['username'];
		$password = $fields['password'];

		$validator = new Validate();
		$result = $validator->AddValue('usernameoremail', $username)->AddRule('required', true)
							->AddValue('password', $password)->AddRule('required', true)
							->Check();

		if(!$encrypted)
			$password = Validate::Encrypt($password);

		if($result)
		{	
			if (strpos($username, '@') !== false)
				$type = "email";
			else
			{
				$type = "username";
				$username = Validate::Escape($username);
			}
			
			$user = new User();
			$result = $user->Load(array($type => $username, 'password' => $password));

			if($result)
			{
				if($user->Get('activation_state') == '0')
					Error::Set("email", "notactivated");
				else
				{
					if(isset($fields['rememberme']))
						Cookie::Set($username, $password);

					Session::Set("current_user", $user);
					return true;
				}
			}
			else
				Error::Set("username", "usernotfound");		
		}
		return false;
	}

	static function Signup($fields)
	{
		$fields['user_type'] = 'user';
		$fields['social_type'] = 'normal';

		if(Config::Get("validation.email_activation"))
		{
			$key = md5(time().$fields['username']);
			$fields['activation_key'] = $key;
			$url = Config::Get("base_url")."auth/activate.php?key=".$key;
			$url = '<a href="'.$url.'">'.$url.'</a>';
		}
		else
			$fields['activation_state'] = 1;

		if(User::AddUser($fields, Config::Get('validation.use_captcha')))
		{	
			if(Config::Get("validation.email_activation"))
				Email_user::SendEmail($fields['email'], Config::Get("success.activation_subject"), Config::Get("success.activation_message").$url);
			return true;
		}			
		return false;
	}

	static function Logout()
	{
		Cookie::Clear();
		session_destroy();
	}
	
	static function ConnectFacebook($user_data)
	{
		$user = new User();
		$result = $user->Load(array('social_id' => $user_data['id']));

		if($result)
		{
			Session::Set("current_user", $user);
			return true;
		}
		else
		{
			$img = 'https://graph.facebook.com/'.$user_data['id'].'/picture?type=large';
			$data = array(  'avatar' => $img,
							'email' => $user_data['email'],
							'fullname' => $user_data['name'], 
							'social_id' => $user_data['id'], 
							'social_type' => 'facebook', 
							'activation_state' => '1', 
							'user_type' => 'user'
							);

			if(isset($user_data['username']))
				$data['username'] = $user_data['username'];
			else
				$data['username'] = strtolower($user_data['first_name']).'.'.strtolower($user_data['last_name']);
			if(isset($user_data['hometown']['name']))
				$data['location'] = $user_data['hometown']['name'];
			if(isset($user_data['gender']))
				$data['gender'] = ($user_data['gender'] == 'male') ? 'M' : 'F';
			if(isset($user_data['bio']))
				$data['about'] = $user_data['bio'];

			$user = User::AddUser($data);
			if($user)
			{
				$user->Load(array('social_id' => $user_data['id']));
				Session::Set("current_user", $user);
				header('Location: '.Config::Get('base_url').'index.php');
				return true;
			}
		}
		return false;
	}

	static function ConnectGoogle($user_data)
	{
		$user = new User();
		$result = $user->Load(array('social_id' => $user_data['id']));
		if($result)
		{
			Session::Set("current_user", $user);
			return true;
		}
		else
		{
			$img = $user_data['picture'];
			$data = array(  'avatar' => $img,
							'email' => $user_data['email'],
							'fullname' => $user_data['name'], 
							'social_id' => $user_data['id'], 
							'social_type' => 'google', 
							'activation_state' => '1', 
							'user_type' => 'user'
							);

			if(isset($user_data['username']))
				$data['username'] = $user_data['username'];
			else
				$data['username'] = strtolower($user_data['given_name']).'.'.strtolower($user_data['family_name']);
			if(isset($user_data['gender']))
				$data['gender'] = ($user_data['gender'] == 'male') ? 'M' : 'F';

			$user = User::AddUser($data);
			if($user)
			{
				$user->Load(array('social_id' => $user_data['id']));
				Session::Set("current_user", $user);
				header('Location: '.Config::Get('base_url').'index.php');
				return true;
			}
		}
		return false;
	}

	static function ConnectTwitter($user_data)
	{
		$user = new User();
		$result = $user->Load(array('social_id' => $user_data['id']));

		if($result)
		{
			Session::Set("current_user", $user);
			return true;
		}
		else 
		{
			if(Session::Get('twitter_user'))
			{
				$img = str_replace("_normal", "", $user_data['picture']);
				$data = array(  'avatar' => $img,
								'email' => $user_data['email'],
								'username' => $user_data['username'], 
								'fullname' => $user_data['fullname'],
								'location' => $user_data['location'],
								'about' => $user_data['about'],  
								'social_id' => $user_data['id'], 
								'social_type' => 'twitter', 
								'activation_state' => '1', 
								'user_type' => 'user'
								);
				$user = User::AddUser($data);
				if($user)
				{
					$user->Load(array('social_id' => $user_data['id']));
					unset($_SESSION['twitter_user']);
					Session::Set('current_user', $user);
					header('Location: '.Config::Get('base_url').'index.php');
					return true;
				}
			}
			else
			{
				Session::Set('twitter_user', $user_data);
				header('Location: '.Config::Get('base_url').'auth/twitteremail.php');
			}	
		}
		return false;
	}
}