<?php
require_once '../config/init.php';

if(isset($_GET['method']))
{
	$method = $_GET['method'];
	if($method == "facebook")
	{
		require_once '../classes/vendor/facebook/facebook.php';

		$facebook = new Facebook(array( 'appId'  => Config::Get('social.facebook.id'),
		  								'secret' => Config::Get('social.facebook.secret'),
										));
		$user = $facebook->getUser();
		if ($user) 
		{
			$user_profile = $facebook->api('/me');
			if($user_profile)
				Authentication::ConnectFacebook($user_profile);
		}
		else 
		{
			$params = array('scope' => 'email');
			$loginUrl = $facebook->getLoginUrl($params);
			header("Location: $loginUrl");
		}
	}
	else if($method == "google")
	{
		require_once '../classes/vendor/google/Google_Client.php';
		require_once '../classes/vendor/google/contrib/Google_Oauth2Service.php';

		$client = new Google_Client();
		$client->setApplicationName("Google UserInfo PHP Starter Application");
		$client->setClientId(Config::Get('social.google.id'));
		$client->setClientSecret(Config::Get('social.google.secret'));
		$client->setRedirectUri(Config::Get('base_url').'auth/connect.php?method=google');
		$client->setDeveloperKey(Config::Get('social.google.dev'));
		$oauth2 = new Google_Oauth2Service($client);

		if (isset($_GET['code'])) 
		{
			$client->authenticate($_GET['code']);
			$_SESSION['token'] = $client->getAccessToken();
			$redirect = Config::Get('base_url').'auth/connect.php?method=google';
			header("Location: $redirect");
			return;
		}

		if (isset($_SESSION['token'])) 
			$client->setAccessToken($_SESSION['token']);

		if ($client->getAccessToken()) 
		{
			$user = $oauth2->userinfo->get();
			if($user)
				Authentication::ConnectGoogle($user);
			$_SESSION['token'] = $client->getAccessToken();
		} 
		else 
		{
			$authUrl = $client->createAuthUrl();
			header("Location: $authUrl");
		}
	}
	else if($method == "twitter")
	{
		require_once '../classes/vendor/twitter/twitteroauth.php';

		$CONSUMER_KEY = Config::Get('social.twitter.id');
		$CONSUMER_SECRET = Config::Get('social.twitter.secret');
		$OAUTH_CALLBACK = Config::Get('base_url').'auth/connect.php?method=twitter';

		if(isset($_GET['oauth_token']) && isset($_GET['oauth_verifier']))
		{
			$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $_SESSION['request_token'], $_SESSION['request_token_secret']);
			$access_token = @$connection->getAccessToken($_REQUEST['oauth_verifier']);
			if(isset($access_token['oauth_token']) && isset($access_token['oauth_token_secret']))
			{
				$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
				$params = array();
				$params['include_entities']='false';
				$content = $connection->get('account/verify_credentials',$params);

				if($content && isset($content->screen_name) && isset($content->name))
				{
					Authentication::ConnectTwitter(array('id' => $content->id, 
														 'username' => $content->screen_name, 
														 'fullname' => $content->name, 
														 'picture' => $content->profile_image_url,
														 'location' => $content->location,
														 'about' => $content->description
														));
				}
			}
			else
				Error::Set('twitter','unexpectederror');
		}
		else
		{
			$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET);
			$request_token = @$connection->getRequestToken($OAUTH_CALLBACK);
			if(isset($request_token['oauth_token']) && isset($request_token['oauth_token_secret']))
			{
				$_SESSION['request_token'] = $request_token['oauth_token'];
				$_SESSION['request_token_secret'] = $request_token['oauth_token_secret'];

				if($connection->http_code == 200) 
				{
					$url = $connection->getAuthorizeURL($request_token['oauth_token']);
					header('Location: '. $url); 
				}
			}
			else
				Error::Set('twitter','Failed to validate oauth signature and token.');
		}
	}
	else
		header("Location: ../index.php");
}
if(Authentication::IsLogged())
	header("Location: ../index.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body style="text-align:center;margin:auto;width:300px;">	
		<?php if(Error::HasErrors()): ?>
		<div class="message-box"> <!--  add your error class here -->
			<ul>
				<?php foreach (Error::GetAll() as $key => $value) {echo '<li>'.$value.'</li>';}?>
			</ul>
		</div>
		<?php endif; ?>
		<a href="../index.php">Go back</a>
	</body>
</html>