<?PHP

include($_SERVER["DOCUMENT_ROOT"].'/admin/classes/classes.php');		// Include local class lib
		$sess = new SessionData();
		$log= new log($_SERVER["PHP_SELF"]);
			
?>
<html>
<head>
<title>TheFacebook | About</title> 
<link rel="stylesheet" href="style.css"> 
<link rel="shortcut icon" href="favicon.ico"> 
<meta name="description" content="TheFacebook is an online directory that connects people through social networks at colleges." /> 
<meta name="keywords" content="TheFacebook, facebook, old, original, mark, zuckerberg, winklevoss, tyler, cameron, .co, connectu" /> 
<meta name="Generator" content="JB engine designed" /> 
<meta name="robots" content="index, follow" /> 
<meta name="OriginalPublicationDate" content="2011/04/06 00:00:00">
<meta name="Headline" content="TheFacebook | About"> 
<meta name="IFS_URL" content="/about.php"> 
<meta name="contentFlavor" content="PAGE"> 
<meta name="CPS_SITE_NAME" content="TheFacebook | About"> 
<meta name="CPS_SECTION_PATH" content="About"> 
<meta name="CPS_ASSET_TYPE" content="STY"> 
<meta name="CPS_PLATFORM" content="HighWeb"> 
<meta name="CPS_AUDIENCE" content="US"> 
<meta property="og:title" content="TheFacebook is an online directory that connects people through social networks at colleges."> 
<meta property="og:type" content="page"> 
<meta property="og:url" content="/about.php"> 
<meta property="og:site_name" content="TheFacebook">  
</head>
  

<center>

<table class="bordertable" cellspacing=0 cellpadding=0 border=0 width=700>

  <tr><td>

      <table class="bottomborder" cellspacing=0 cellpadding=0 border=0 width=100%>

      <tr><td width=350 bgcolor=#3B5998>

          <img src='images/logo-left.jpg'></td>

          <td><table cellspacing=0 cellpadding=0 border=0 width=100%><tr><td>

          <table cellspacing=0 cellpadding=0 border=0 width=100%>

          <tr><td><a href='index.php'><img src='images/logo-right.jpg' border=0></a></td>

          <td width=100% bgcolor=#3B5998>&nbsp;</td></tr></table></td></tr>

          <tr><td><table cellspacing=0 cellpadding=4 border=0 width=100%><tr height=21>

          <!--<td bgcolor=#3B5998 width=10>&nbsp;</td>-->
		  
		 <?PHP
			
			if(!$sess->CheckValidSession()){			
				include('modules/default/topnav.php');
			}else{
				include('modules/loggedin/topnav.php');		  
			}
			?>

		  <td bgcolor=#3B5998 width=100%>&nbsp;</td>


					
          </tr></table></td>

          </tr></table>

      </td></tr></table>

  </td></tr>

  <tr><td><table cellspacing=0 cellpadding=2 border=0 width=100%>

      <tr><td valign=top>

      <table cellspacing=0 cellpadding=0 border=0 width=105>

        <tr><td>
		 	 <?PHP
			
			if(!$sess->CheckValidSession()){			
				include('modules/default/leftnav.php');
			}else{
				include('modules/loggedin/leftnav.php');		  
			}
			?>



        </td></tr>



      </td></tr>

      </table>

      </td><td width=595 valign=top>

        <table class="bordertable" cellspacing=0 cellpadding=0 border=1 width=100%><tr><td>



	  <table cellspacing=0 cellpadding=2 border=0 width=100%> 
<tr><td class='white' bgcolor=#3B5998>About TheFacebook</td></tr></table><center><p class='title'>[ About ]</p><center><table cellspacing=0 cellpadding=0 border=0 width=95%><tr><td><center><table class='bordertable' cellspacing=0 cellpadding=0 width=90%><tr><td><table cellspacing=0 cellpadding=2 border=0 width=100%> 
<tr><td class='white' bgcolor=#3B5998>The Project</td></tr></table>&nbsp;<br><center><table cellspacing=0 cellpadding=2 border=0 width=95%><tr><td>TheFacebook is an online directory that connects people through social networks at colleges and universities.<br><br>The development and expansion of the website is based on user request.<br>&nbsp;</td></tr></table></td></tr></table>
<br>&nbsp;<center><table class='bordertable' cellspacing=0 cellpadding=0 width=90%><tr><td><table cellspacing=0 cellpadding=2 border=0 width=100%> 
<tr><td class='white' bgcolor=#3B5998>The People</td></tr></table>&nbsp;<br><center>
<table cellspacing=0 cellpadding=2 border=0 width=95%><tr><td>
<table cellspacing=0 cellpadding=4 border=0> 
<tr><td width=100px><a href='#'>Mark Zuckerberg</a>&nbsp;&nbsp;</td><td>Founder, Master and Commander, Enemy of the State.</td></tr>
<tr><td width=100px><a href='#'>Eduardo Saverin</a>&nbsp;&nbsp;</td><td>Business Stuff, Corporate Stuff, Brazilian Affairs.</td></tr>
<tr><td width=100px><a href='#'>Dustin Moskovitz</a>&nbsp;&nbsp;</td><td>No Longer Expendable Programmer, Paid Assassin.</td></tr>
<tr><td width=100px><a href='#'>Andrew McCollum</a>&nbsp;&nbsp;</td><td>Graphic Art, General Rockstar.</td></tr>
<tr><td width=100px><a href='#'>Chris Hughes</a>&nbsp;&nbsp;</td><td>The Secret Weapon.</td></tr>
<tr><td>&nbsp;</td><td></td></tr>
<tr><td><a href='contact.php'>Contact us.</a></td><td></td></tr></table><br>&nbsp;</td></tr></table></td></tr></table><br>&nbsp;
<center>

  </td></tr></table>
</td></tr></table>
  <center>
<?PHP include('modules/default/bottomnav.php');	?> 
</center><br>

  </td></table></table><br>



 
