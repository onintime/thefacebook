<?PHP

include($_SERVER["DOCUMENT_ROOT"].'/admin/classes/classes.php');		// Include local class lib

$sess = new SessionData();					// Creates session object
$sess->CheckValidFBSession();
if(!$sess->CheckValidSession()){			// Validates Session
	$sess->Login();
}

$log= new log($_SERVER["PHP_SELF"]);
$db = new Database();						// Creates database object
if(!$db->connect()){
	echo "<p>Error connecting to the database</p>";
}

$id=$sess->Retrieve('id');
$profile = new Profile($id);

if($_SERVER['REQUEST_METHOD'] == "POST"){
	if(!setprivacy($id,$_POST)){
		$error = "Error saving. Please try again later";
	}
	/*if(!$profile->save($_POST))
		$error = "Error saving. Please try again later";
	
	else
		$profile = new Profile($id); //reloads profile
		
		//print_r($_POST);
		*/
}
$privacy = getprivacy($id);


$dropdowns = new Dropdowns();
?>
<title>TheFacebook | Account Privacy</title> 
<link rel="stylesheet" href="style.css"> 
<link rel="shortcut icon" href="favicon.ico"> 
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
   FB.Canvas.setAutoResize();
    };
    (function() {
   var e = document.createElement('script'); e.async = true;
   e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
   document.getElementById('fb-root').appendChild(e);
    }());
  </script>


<center>
<form method="post" action="accountprivacy.php">
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
		   include('modules/loggedin/topnav.php');
		   ?>

                    <td bgcolor=#3B5998 width=100%>&nbsp;</td>

          </tr></table></td>

          </tr></table>

      </td></tr></table>

  </td></tr>

  <tr><td><table cellspacing=0 cellpadding=2 border=0 width="100%">

      <tr><td valign=top width="136px" style="width:136px">

      <table cellspacing=0 cellpadding=0 border=0 width=100%>

        <tr><td>

           <?PHP
		   include('modules/loggedin/leftnav.php');
		   ?>

        </td></tr>



      </td></tr>

      </table>

      </td><td width=595 style="width:595px" valign=top>

        <table class="bordertable" cellspacing=0 cellpadding=0 border=1 width=100%><tr><td>



	  <table cellspacing=0 cellpadding=2 border=0 width=100%><tr><td class='white' bgcolor=#3B5998>
	  Account Privacy
	  </td></tr></table>


<br>
<table cellspacing=0 cellpadding=6 border=0 width=97% align=center valign=top>
	<tr>


		<td width="100%" valign=top>
		<font color=red size=3><b><?PHP echo $error; ?></b></font>
			<table class='bordertable' cellspacing=0 cellpadding=0 width=100% valign=top>
				<tr>
					<td>
						<table cellspacing=0 cellpadding=2 border=0 width=100%> 
							<tr>
								<td class='white' bgcolor=#3B5998>
									Network
								</td>
								
							</tr>
						</table>
						<center>
						<table cellspacing=0 cellpadding=2 border=0 width=95%>
							<tr>
								<td>
									<table cellspacing=0 cellpadding=0 border=0 width=100%>
										<tr>
											<td>
												<table cellspacing=0 cellpadding=2 border=0 width=100%>
													<tr>
														<td style="width:110px">
															Choose your network size
														</td>
														<td style="width:430px" align=left>
															<?php $networksize = array("You","Your Residence","Your University","Your City","Your State","Your Country","Your World");								$i=1;
															foreach($networksize as $network){
																$checked = '';
																if($privacy['network']==$i){
																	$checked = 'checked="checked"';
																}
																echo '<input  type="radio" name="networksize" value="'.$i.'" '.$checked.' > '.$network."<br />";
																$i++;
															}
															 ?>
														
															<input type="checkbox" name="searchable" value="1" <?php if($privacy['searchable']==1){echo "checked='checked'";}; ?> > Allow users from broader networks to search for you<br>
															<input class="inputsubmit" type="submit" name="savenetworksize" value="Update">
															
														</td>
													</tr>	

													
												</table>
											
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			
			<br>
			
			<table class='bordertable' cellspacing=0 cellpadding=0 width=100% valign=top>
				<tr>
					<td>
						<table cellspacing=0 cellpadding=2 border=0 width=100%> 
							<tr>
								<td class='white' bgcolor=#3B5998>
									Visibility
								</td>
								
							</tr>
						</table>
						<center>
						<table cellspacing=0 cellpadding=2 border=0 width=95%>
							<tr>
								<td>
									<table cellspacing=0 cellpadding=0 border=0 width=100%>
										<tr>
											<td>
												<table cellspacing=0 cellpadding=2 border=0 width=100%>
													<tr>
														<td style="width:110px">
															Profile is<br>viewable by
														</td>
														<td style="width:430px" align=left>
															<?php $visible = array("Friends","Friends of Friends","Everyone");								$i=1;
															foreach($visible as $viewers){
																$checked = '';
																if($privacy['visibility']==$i){
																	$checked = 'checked="checked"';
																}
																echo '<input  type="radio" name="visibility" value="'.$i.'" '.$checked.' > '.$viewers."<br />";
																$i++;
															}
															 ?>
															
															<input class="inputsubmit" type="submit" name="savevisibility" value="Update">
														
														</td>
													</tr>	

													
												</table>
											
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>			
		
	<br>
			
			<table class='bordertable' cellspacing=0 cellpadding=0 width=100% valign=top>
				<tr>
					<td>
						<table cellspacing=0 cellpadding=2 border=0 width=100%> 
							<tr>
								<td class='white' bgcolor=#3B5998>
									Notifications
								</td>
								
							</tr>
						</table>
						<center>
						<table cellspacing=0 cellpadding=2 border=0 width=95%>
							<tr>
								<td>
									<table cellspacing=0 cellpadding=0 border=0 width=100%>
										<tr>
											<td>
												<table cellspacing=0 cellpadding=2 border=0 width=100%>
													<tr>
														<td style="width:110px">
															Email me when
														</td>
														<td style="width:430px" align=left>
															
															<input  type="checkbox" name="newsletters" value="1" <?php if($privacy['newsletter']==1){echo "checked='checked'";}; ?>> Newsletters are sent<br>
															<input class="inputsubmit" type="submit" name="savenotifications" value="Update">
															
														</td>
													</tr>	

													
												</table>
											
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>	

	
	</table>
    </form>
	<br>&nbsp;<center>
	<table class='bordertable' cellspacing=0 cellpadding=0 width=96%><tr><td><table cellspacing=0 cellpadding=2 border=0 width=100%> 

  </td></tr></table>

  <center>

<?PHP include('modules/default/bottomnav.php');	?> 

  </center><br>

  </td></table><br></table>



 
