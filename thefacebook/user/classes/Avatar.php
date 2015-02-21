<?php
class Avatar
{
	static function Upload($image)
	{
		$user = Session::Get('current_user');
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $image["name"]);
		$extension = strtolower(end($temp));


		if(in_array($extension, $allowedExts))
		{
			if ($image["error"] > 0)
			{
				if($image["error"] == 1 || $image["error"] == 2)
					Error::Set('avatar', 'The uploaded file exceeds the upload_max_filesize directive in php.ini or in the html form.');
			}
			else if($image["size"] >= Config::Get('avatar.maxsize'))
				Error::Set('avatar', 'imagemaxsize');
			else
			{
				$filename = '_'.md5($user->Get('id')).".".$extension;
				$src = PLSPATH.Config::Get("avatar.upload_path").$filename;
				if(move_uploaded_file($image["tmp_name"], $src))
				{
					Session::Set('current_user_temp_avatar', $filename);
					return true;
				}
				else
					Error::Set('avatar', 'uploadfailed');
			}
		}
		else
			Error::Set('avatar', 'invalidimage');
		return false;
	}

	static function Crop()
	{
		if(Session::Get('current_user_temp_avatar'))
		{
			$user = Session::Get('current_user');
			$src = PLSPATH.Config::Get("avatar.upload_path").Session::Get('current_user_temp_avatar');
			$temp = explode(".", $src);
			$extension = strtolower(end($temp));

			switch ($extension) 
			{
				case 'jpeg':
				case 'jpg': $img_r = @imagecreatefromjpeg($src); break;
				case 'png': $img_r = @imagecreatefrompng($src); break;
				case 'gif': $img_r = @imagecreatefromgif($src); break;
			}

			if(!$img_r)
			{
				Error::Set('avatar', 'imagecorrupt');
				return false;
			}
			else
			{
				$targ_w = $targ_h = Config::Get('avatar.resolution');
				$dst_r = ImageCreateTrueColor($targ_w, $targ_h);

				if($extension == "png")
				{
					imagealphablending( $dst_r, false );
					imagesavealpha( $dst_r, true );
				}

				$size = getimagesize($src);
				if($_POST['w'] > 0 && $_POST['h'] > 0 && $_POST['w'] <= $size[0] && $_POST['h'] <= $size[1])
				{
					$x = $_POST['x'];
					$y = $_POST['y'];
					$width = $_POST['w'];
					$height = $_POST['h'];
				}
				else
				{
					$min_size = min($size[0], $size[1]);
					if($size[0] > $size[1])
					{
						$x = $size[0] / 2 -  $min_size / 2;
						$y = 0;
					}
					else
					{
						$x = 0;
						$y = $size[1] / 2 -  $min_size / 2;
					}
					$width = $height = $min_size;
				}


				imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $width, $height);

				@unlink($src);
				$filename = md5($user->Get('id')).".".$extension;
				$filepath = Config::Get('base_url').Config::Get('avatar.upload_path').$filename;
				$src = PLSPATH.Config::Get('avatar.upload_path').$filename;
				switch ($extension) 
				{
					case 'jpeg':
					case 'jpg': imagejpeg($dst_r, $src, 90); break;
					case 'png': imagepng($dst_r, $src); break;
					case 'gif': imagegif($dst_r, $src); break;
				}

				unset($_SESSION['current_user_temp_avatar']);
				$user->Set('avatar', $filepath.'?'.time());
				return $user->Save();
			}
		}	
	}
}

