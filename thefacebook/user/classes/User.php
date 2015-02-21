<?php
class User
{
	private $userData = array();
	private $changes = array();
	private $db;

	function __construct($userData = null)
	{
		$this->db = new Database_user();
		if($userData != null)
		{
			foreach ($userData as $key => $value) 
			{
				if(!is_numeric($key))
					$this->userData[$key] = $value;
			}
		}
	}

	function IsAdmin()
	{
		return ($this->userData['user_type'] == 'admin') ? true : false;
	}

	function Set($field, $value)
	{
		$this->userData[$field] = $value;
		$this->changes[$field] = $value;
	}

	function Get($field)
	{
		return (isset($this->userData[$field])) ? $this->userData[$field] : false;
	}

	function Load($userdata)
	{
		$this->db->Select();
		if(is_numeric($userdata))
		{
			$result = $this->db->Where('id', $userdata)->Limit(1)->Get(Config::Get('db.table'));
			if($result)
			{
				$this->__construct($result[0]);
				return true;
			}
		}
		else if(is_array($userdata))
		{
			foreach ($userdata as $key => $value) 
			{
				$this->db->Where($key, $value);
			}
			$result = $this->db->Limit(1)->Get(Config::Get('db.table'));
			if($result)
			{
				$this->__construct($result[0]);
				return true;
			}
		}
		return false;
	}

	function Delete()
	{
		return $this->db->Delete()->Where('id', $this->userData['id'])->Limit(1)->Execute(Config::Get('db.table'));
	}

	function GetAvatar()
	{	
		if(!empty($this->userData['avatar']))
			$avatar = $this->userData['avatar'];
		else
			$avatar = "assets/img/default.png";
		
		if(strpos($avatar, 'http') === false)
			$avatar = Config::Get('base_url').$avatar;
		return $avatar;
	}

	function Save()
	{
		if(isset($this->userData['id']))
		{
			$this->db->Update($this->changes)
			   	     ->Where('id', $this->userData['id'])
			   	     ->Limit(1)
			         ->Execute(Config::Get('db.table'));
		    $result = true;
		    if(Session::Get('current_user') && $this->userData['id'] == Session::Get('current_user')->Get('id'))
				Session::Set('current_user', $this);
		}
		else
		{
			  $result = $this->db->Insert($this->userData)
			   		  	       ->Execute(Config::Get('db.table'));
		$data = array("id"=>$this->userData['id'],"name"=>$this->userData['username'],"email"=>$this->userData['email'],'password'=>$this->userData['password'],"accountstatusid"=>"2");
		   $result = $this->db->Insert($data)
		   		  	       ->Execute('user'); 
		}
		$this->changes = array();
		return $result;	
	}

	function ChangePassword($fields)
	{
		$continue = true;

		if(isset($fields['opassword']))
		{
			if(Validate::Encrypt($fields['opassword']) != $this->userData['password'] && !empty($this->userData['password']))
			{
				$continue = false;
				Error::Set('password', 'passwordinvalid');
			}
		}
		
		if($continue)
		{
			$validator = new Validate();
			$result =  $validator->AddValue('password', $fields['password'])->AddPattern('password')
								 ->AddValue('cpassword', $fields['cpassword'])->AddRule('match', $fields['password'])
								 ->Check();
			if($result)
			{
				$this->Set('password', Validate::Encrypt($fields['password']));
				return $this->Save();
			}
		}
		return false;
	}


	private function NeedToUpdate($field, $fields)
	{
		return (isset($fields[$field]) && $this->userData[$field] != $fields[$field]);
	}

	function ChangeSettings($fields)
	{
		$validator = new Validate();
		if($this->NeedToUpdate('username', $fields))
		{
			if($validator->AddValue('username', $fields['username'])->AddPattern('username-unique')->Check())
				$this->Set('username', $fields['username']);
		}
		if($this->NeedToUpdate('email', $fields))
		{
			if($validator->AddValue('email', $fields['email'])->AddPattern('email-unique')->Check())
				$this->Set('email', $fields['email']);
		}
		if($this->NeedToUpdate('activation_state', $fields))
		{
			if($fields['activation_state'] == '1')
				$this->Set('activation_state', '1');
			else
				$this->Set('activation_state', '0');
		}
		if($this->NeedToUpdate('user_type', $fields))
		{
			if($fields['user_type'] == 'admin')
				$this->Set('user_type', 'admin');
			else
				$this->Set('user_type', 'user');
		}
		$info = array('fullname', 'phone', 'location', 'about', 'gender', 'avatar');
		foreach ($info as $value) 
		{
			if($this->NeedToUpdate($value, $fields))
			{
				$fields[$value] = Validate::Escape($fields[$value]);
				$this->Set($value, $fields[$value]);
			}
		}
		return $this->Save();
	}

	static function GetUsers()
	{
		if(Authentication::IsLogged())
			$id = Session::Get('current_user')->Get('id');
		$db = new Database_user();
		$users = array();
		$db->Select();
		if(isset($id))
			$db->Where('id', $id, '!=');
		$result = $db->Get(Config::Get('db.table'));
		if($result)
		{
			foreach ($result as $value) 
			{
				$users[] = new User($value);
			}
			return $users;
		}
		return false;
	}

	static function AddUser($fields, $use_captcha = false)
	{
		$data = array();
		$validator = new Validate();
		$result = $validator->AddValue('username', $fields['username'])->AddPattern('username-unique')
							->AddValue('email', $fields['email'])->AddPattern('email-unique')
							->Check();
							
		if(isset($fields['password']))
		{
			$result = ($validator->AddValue('password', $fields['password'])->AddPattern('password')->Check() && $result);
		}

		if(isset($fields['cpassword']))
		{
			$result = ($validator->AddValue('cpassword', $fields['cpassword'])->AddRule('match', $fields['password'])->Check() && $result);
		}

		if($use_captcha)
		{
			$result = (Validate::ValidCaptcha($fields['recaptcha_challenge_field'], $fields['recaptcha_response_field']) && $result);
		}

		if($result)
		{
			$data['username'] = $fields['username'];
			$data['email'] = $fields['email'];
			$data['password'] = (isset($fields['password'])) ? Validate::Encrypt($fields['password']) : '';
			$data['user_type'] =  (isset($fields['user_type']) && $fields['user_type'] == 'admin') ? 'admin' : 'user';
			$data['activation_state'] = (isset($fields['activation_state']) && $fields['activation_state'] == '1') ? '1' : '0';

			$info = array('phone', 'about', 'location', 'fullname', 'gender', 'social_id', 'social_type', 'activation_key', 'avatar');
			foreach ($info as $value) 
			{
				$data[$value] = (isset($fields[$value])) ? Validate::Escape($fields[$value]) : '';
			}
			$new_user = new User($data);
			if($new_user->Save()){
				return $new_user;
			}
			else
			{
				Error::Set("database", "databaseinsert");
			}
		}
		return false;
	}

}