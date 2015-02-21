<!DOCTYPE html>
<html xmlns:fb="//www.facebook.com/2008/fbml">
	<head>
		<meta charset="utf-8" />
        <style>  
 
  .title {
    color:#000000;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 18px;
    font-weight: bold;
    text-decoration:none;
  }
  
  .larger {
    color:#000000;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 13px;
    font-weight: none;
    text-decoration:none;
  }
 
  .larger-a {
    //color:#D19160;
    color:#538ADC;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 13px;
    font-weight: none;
    text-decoration:none;
  }
 
  .larger-a:hover {
    //color:#FF0000;
    color:#77C9F3;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 13px;
    font-weight: none;
    text-decoration:underline;
  }
  
  select {
    font-family: Tahoma;
    font-size: 11px;
  }
   
  .white {
    color:#FFFFFF;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 12px;
    font-weight: none;
    text-decoration:none;
  }
 
  .blue {
    color:#3B5998;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 12px;
    font-weight: none;
    text-decoration:none;
  } 
  
  .red {
    color:#FF0000;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
 
  .menu {
    color:#FFFFFF;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
 
  .menu:hover {
    color:#77C9F3;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
 
  .alternate {
    color:#3B5998;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
 
  .alternate:hover {
    color:#000000;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:underline;
  }
  
  a {
    //color:#D19160;
    color:#538ADC;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
  
  a:hover {
    //color:#FF0000;
    color:#77C9F3;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:underline;
  }
 
  .bordertable {
    border-width: 1px;
    border-color: #3B5998;
    border-style: solid;
  }
 
  .dashedtable {
    border-width: 1px;
    border-color: #3B5998;
    border-style: dashed;
  }
 
  .bottomborder {
    border-style:solid;
    border-color: #3B5998;
    border-top-width:0px;
    border-bottom-width:1px;
    border-right-width:0px;
    border-left-width:0px;
  }
 
  .one-column {
    color:#000000;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
    border-style:solid;
    border-color: #3B5998;
    border-top-width:1px;
    border-bottom-width:0px;
    border-right-width:1px;
    border-left-width:1px;
  }
 
  .text {
    font-Family: Serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
  
  .td0 {
    color:#000000;
    background-color:#D9DFEA;
    border: 0;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
 
  .td1 {
    color:#000000;
    background-color:#86A1CE;
    border: 0;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }    
 
  .schedule_table {
    border-right-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 1px;
    border-top-width: 1px;
    border-style: solid;
    border-color: #000000;
  }
 
  .top-border {
    border-right-width: 0px;
    border-bottom-width: 0px;

    border-left-width: 0px;
    border-top-width: 1px;
    border-style: solid;
    border-color: #3B5998;
  }
  
  .schedule {
    color:#000000;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 0px;
    border-top-width: 0px;
    border-style: solid;
    border-color:#000000;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
 
  .border-td {
    color:#000000;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 1px;
    border-top-width: 1px;
    border-style: solid;
    border-color:#3B5998;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
  
  td {
    color:#000000;
    border: 0;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
    font-size: 11px;
    font-weight: none;
    text-decoration:none;
  }
  input[type=text],input[type=email],input[type=password] {
    border:1px solid #999;
    background-color:#d9dfea;
    font-size:11px;
    color: #000000;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
  }
  .inputtext {
    border:double;
    border-width:1;
    border-color:#555555;
    background-color:#D9DFEA;
    font-size:11px;
    color: #000000;
    font-Family: Tahoma, Arial, Helvetica, sans-serif;
  }
  
  .inputsubmit {
    border-style:solid;
    border-top-width:1px;
    border-bottom-width:2px;
    border-right-width:2px;
    border-left-width:1px;
    border-top-color:#D9DFEA;
    border-bottom-color:#3B5998;
    border-right-color:#3B5998;
    border-left-color:#D9DFEA;
    background-color:#538ADC;
    font-family:Tahoma, arial;
    font-size:11px;
    color:#FFFFFF;
    font-weight:none;
  }
  a img{
	border:none !important;
}
#container{
	margin:0 auto;
	width:500px;
	padding:40px;
	text-align:left;
	background-color:#fff;
}

#lightbox h2{
	margin:0 0 1em 0;
}
#lightbox h3{
	color:#FF713F;
}
#lightbox.done p{
	color:#333;
}

#form{
	text-align:left;
	margin:25px;
}
#form ul{
	list-style:none;
}
#form li{
	margin:0 0 1em 0;
}
#form textarea{
	width:100%;
	height:150px;
}

#definition{
	margin:25px;
}
.highlight{
	background-color:#FEFFAF;
}
#lightbox{
	display:none;
	position: absolute;
	top:50%;
	left:50%;
	z-index:9999;
	width:400px;
	height:200px;
	padding:10px;
	margin:-220px 0 0 -250px;
	border:1px solid #fff;
	background:#FDFCE9;
	text-align:left;
}
#lightbox[id]{
	position:fixed;
}

#overlay{
	display:none;
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
	z-index:5000;
	background-color:#000;
	-moz-opacity: 0.8;
	opacity:.80;
	filter: alpha(opacity=80);
}
#overlay[id]{
	position:fixed;
}

#lightbox.done #lbLoadMessage{
	display:none;
}
#lightbox.done #lbContent{
	display:block;
}
#lightbox.loading #lbContent{
	display:none;
}
#lightbox.loading #lbLoadMessage{
	display:block;
}

#lightbox.done img{
	width:100%;
	height:100%;
}
 
  <!--
  #8EA7C5 - blue
  #D9DFEA - grey
  59 89 152                (#3B5998)
  217 223 234              (#D9DFEA)
  83 138 220 - link normal (#538ADC)
  119 201 243 - link down  (#77C9F3)
  -->
  </style>
  <title>TheFacebook Login | Welcome to TheFacebook!</title>
		<script type="text/javascript"> var PLS_config = {ajax_url: '<?php echo Config::Get('base_url').'auth/ajax.php'; ?>',};</script>
        <script type="text/javascript"> var RecaptchaOptions = {theme : 'custom', custom_theme_widget: 'PLS_recaptcha_widget'};</script>
		<script type="text/javascript" src="../assets/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="../assets/js/premiumlogin.min.js"></script>
         <meta name="description" content="TheFacebook is an online directory that connects people through social networks at colleges." /> 
<meta name="keywords" content="harvardconnection, harvard, connection, the, facebook, old, original, mark, zuckerberg, winklevoss, tyler, cameron, .co, connectu" /> 
<meta name="Generator" content="JB engine designed" /> 
<meta name="robots" content="index, follow" /> 
<meta name="OriginalPublicationDate" content="2011/04/06 00:00:00">
<meta name="Headline" content="TheFacebook | Welcome to TheFacebook!"> 
<meta name="IFS_URL" content="/index.php"> 
<meta name="contentFlavor" content="PAGE"> 
<meta name="CPS_SITE_NAME" content="TheFacebook | Welcome to TheFacebook"> 
<meta name="CPS_SECTION_PATH" content="Index"> 
<meta name="CPS_ASSET_TYPE" content="STY"> 
<meta name="CPS_PLATFORM" content="HighWeb"> 
<meta name="CPS_AUDIENCE" content="US"> 
<meta property="og:title" content="TheFacebook is an online directory that connects people through social networks at colleges."> 
<meta property="og:type" content="website"> 
<meta property="og:description" content="TheFacebook is an online directory that connects people through social networks at colleges.">
<meta property="og:image" content="http://www.TheFacebook.xyz/images/logo-right.jpg">
<meta property="og:url" content="http://www.TheFacebook.xyz/index.php"> 
<meta property="og:site_name" content="TheFacebook">
	</head>
	<body >
		
<!--		<span>or, connect with</span><br>
		<a href="connect.php?method=facebook">FACEBOOK</a>
		<a href="connect.php?method=twitter">TWITTER</a>
		<a href="connect.php?method=google">GOOGLE +</a><br>-->
        
<center> 
<table class="bordertable" cellspacing=0 cellpadding=0 border=0 width=700> 
  <tr><td> 
      <table class="bottomborder" cellspacing=0 cellpadding=0 border=0 width=100%> 
      <tr><td width=350 bgcolor=#3B5998> 
          <img src='../../images/logo-left.jpg'></td> 
          <td><table cellspacing=0 cellpadding=0 border=0 width=100%><tr><td> 
          <table cellspacing=0 cellpadding=0 border=0 width=100%> 
          <tr><td bgcolor="#3B5998">
              <a href="<?php echo SITE_URL; ?>" style="text-decoration:none; outline:none;">
              <img alt='Register' src='../../images/logo-right.jpg' style="text-decoration:none; outline:none;" />
              </a>
          </td> 
          <td width=100% bgcolor=#3B5998>&nbsp;</td></tr></table></td></tr> 
          <tr><td><table cellspacing=0 cellpadding=4 border=0 width=100%><tr height=21> 
          <!--<td bgcolor=#3B5998 width=10>&nbsp;</td>--> 
 <?PHP
			
				
				include('../../modules/default/topnav.php');
			
			?>                   <td bgcolor=#3B5998 width=100%>&nbsp;</td> 
          </tr></table></td> 
          </tr></table> 
      </td></tr></table> 
  </td></tr> 
  <tr><td><table cellspacing=0 cellpadding=2 border=0 width=100%> 
      <tr> <?php if($_SERVER['PHP_SELF']!="/user/auth/login.php"){ ?><td valign=top> 
     
      <table cellspacing=0 cellpadding=0 border=0 width=105> 
        <tr><td> 
 <?PHP
			
			
				include('../../modules/default/leftnav.php');
?>			
                      </td></tr>  
      </table>
	
      </td> <?php }?> <td width=595 valign=top> 
        <table class="bordertable" cellspacing=0 cellpadding=0 border=1 width=100%><tr><td> 
  
<table cellspacing=0 cellpadding=2 border=0 width=100%> 
<tr><td class='white' bgcolor=#3B5998>Welcome to TheFacebook!</td></tr></table><center><p class='title'>[ <?php
if($_SERVER['PHP_SELF']=="/user/auth/login.php"){
	echo "Login";
}elseif($_SERVER['PHP_SELF']=="/user/auth/signup.php"){
	echo "Register";
}elseif($_SERVER['PHP_SELF']=="/user/auth/recover.php"){
	echo "Recover Account";
}elseif($_SERVER['PHP_SELF']=="/user/auth/reactivate.php"){
	echo "Resend Activation Link";
}



 ?> ]<br>
&nbsp;<table cellspacing=0 cellpadding=0 border=0 width=95%>
<tr><td class='larger'>