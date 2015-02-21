<?php
require_once '../config/init.php';
sleep(1);

if(isset($_POST['action']))
{
	$success = false;
	$message = array();
	$data = array();

	switch ($_POST['action']) 
	{
		case 'login':
			$success = Authentication::Login($_POST);
			$message = Error::GetAll();
			break;

		case 'signup':
			$success = Authentication::Signup($_POST);
			$message = ($success) ? array(Config::Get('success.created')) : Error::GetAll();
			if(Config::Get('validation.email_activation') && $success)
				$message[] = Config::Get('success.activation');
			break;
		
		case 'recover':
			$success = Authentication::Recover($_POST);
			$message = ($success) ? array(Config::Get('success.recovery')) : Error::GetAll();
			break;

		case 'reactivate':
			$success = Authentication::Reactivate($_POST);
			$message = ($success) ? array(Config::Get('success.activation')) : Error::GetAll();
			break;

		case 'reset':
			$success = Authentication::Reset($_POST['key'], $_POST['password'], $_POST['cpassword']);
			$message = ($success) ? array(Config::Get('success.reset')) : Error::GetAll();
			$data = array('email' => $_POST['key']);
			break;

		case 'settings_general':
			Session::Get('current_user')->ChangeSettings($_POST);
			$success = (Error::HasErrors()) ? false : true;
			$message = ($success) ? array(Config::Get('success.saved')) : Error::GetAll();
			$data = array('email' => Session::Get('current_user')->Get('email'), 'username' => Session::Get('current_user')->Get('username'));
			break;

		case 'settings_upload':
			$success = Avatar::Upload($_FILES['upload_field']);
			$message = ($success) ? array(Config::Get('success.saved')) : Error::GetAll();
			$data = array('avatar' => Config::Get('base_url').Config::Get("avatar.upload_path").Session::Get('current_user_temp_avatar').'?'.time());
			break;

		case 'settings_crop':
			$success = Avatar::Crop();
			$message = ($success) ? array(Config::Get('success.saved')) : Error::GetAll();
			$data = array('avatar' => Session::Get('current_user')->GetAvatar());
			break;

		case 'settings_password':
			$success = Session::Get('current_user')->ChangePassword($_POST);
			$message = ($success) ? array(Config::Get('success.saved')) : Error::GetAll();
			break;

		case 'admin_add':		
    		$_POST['social_type'] = 'normal';
    		$success = User::AddUser($_POST);
    		if(isset($_POST['emailpassword']) && $success)
     			Email_user::SendEmail($_POST['email'], 'New account', 'Admin created an account with your email; Your password is : '.$_POST['password']);
     		$message = ($success) ? array(Config::Get('success.created')) : Error::GetAll();
			break;

		case 'admin_edit':
			$user = new User();
			$user->Load(array('id' => $_POST['user_id']));		
    		$user->ChangeSettings($_POST);
    		$success = (Error::HasErrors()) ? false : true;
			if(!empty($_POST['password']) || !empty($_POST['cpassword']))
				$success = ($success && $user->ChangePassword($_POST));
     		$message = ($success) ? array(Config::Get('success.saved')) : Error::GetAll();
     		$data = array('email' => $user->Get('email'), 'username' => $user->Get('username'));
			break;

		case 'admin_delete':
			$user = new User();
			if($user->Load(array('id' => $_POST['user_id'])))		
    			$success = $user->Delete();
    		else
    			Error::Set('user', 'usernotfound');
     		$message = ($success) ? array(Config::Get('success.saved')) : Error::GetAll();
			break;

		case 'admin_compose':
			$validator = new Validate();
			$success = $validator->AddValue('email', $_POST['email'])->AddPattern('email')->Check();
			$success = ($success && Email_user::SendEmail($_POST['email'], $_POST['subject'], $_POST['message']));
     		$message = ($success) ? array(Config::Get('success.sent')) : Error::GetAll();
			break;

		default:
			$message = array(Config::Get('unexpectederror'));
			break;
	}
	$response = array('success' => $success, 'message' => $message, 'data' => $data);
	echo json_encode($response);
}