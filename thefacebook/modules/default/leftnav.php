<?php
require_once __dir__.'/../../user/config/init.php';
if(Authentication::IsLogged())
	header("Location: ../../home.php");
?>
<table class="dashedtable" cellspacing=0 cellpadding=2 width=100%>

              <tr><td align=right>

                  <p>

<form  method="POST" action="<?php echo SITE_URL; ?>/user/auth/login.php">
                 <div class="message-box"></div>
			Username:
			<input type="text" name="username" size="20" ><br>
			Password:
			<input type="password" name="password" size="20" ><br>
			<input id="rememberme" type="checkbox" name="rememberme">
			<label for="rememberme">Remember me</label><br>

                 <center><input class="inputsubmit" type="button" value="Register" onclick="javascript:document.location='<?php echo SITE_URL; ?>/user/auth/signup.php'">&nbsp;&nbsp;<button class="inputsubmit" name="submit" type="submit" > Login </button></center>
</form>

                  <!--<br>onclick="javascript:document.location='<?php echo SITE_URL; ?>/user/auth/login.php'"-->

              </td></tr></table>
              
            