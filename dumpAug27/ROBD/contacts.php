<?php
include('kcaptcha/kcaptcha.php');
session_start();
require_once("contact_config.php");
if ($_POST['act']== "y")
{
    if(isset($_SESSION['captcha_keystring']) && $_SESSION['captcha_keystring'] ==  $_POST['keystring'])
    {
        
        if (isset($_POST['posName']) && $_POST['posName'] == "")
        {
         $statusError = "$errors_name";
        }
		elseif (isset($_POST['posEmail']) && $_POST['posEmail'] == "")
        {
         $statusError = "$errors_mailfrom";
        }
        elseif(isset($_POST['posEmail']) && !preg_match("/^([a-z,._,0-9])+@([a-z,._,0-9])+(.([a-z])+)+$/", $_POST['posEmail']))
        {
         $statusError = "$errors_incorrect";

         unset($_POST['posEmail']);
        }
        
		elseif (isset($_POST['posText']) && $_POST['posText'] == "")
        {
         $statusError = "$errors_message";
        }

elseif (!empty($_POST))
{   
 $headers  = "MIME-Version: 1.0\r\n";
 $headers .= "Content-Type: $content  charset=$charset\r\n";
 $headers .= "Date: ".date("Y-m-d (H:i:s)",time())."\r\n";
 $headers .= "From: \"".$_POST['posName'];
 $headers .= "X-Mailer: My Send E-mail\r\n";

 mail("$mailto","$subject","$message","$headers");
 
 $_POST['posRegard'] = "";
 $_POST['posText'] = "";
  $_POST['posCountry'] = "";
 $_POST['posEmail'] = "";
 $_POST['posName'] = "";
 
 
 
 unset($name, $posText, $mailto, $subject, $posRegard, $message);

 $statusSuccess = "$send";
}

       }else{
             $statusError = "$captcha_error";
             unset($_SESSION['captcha_keystring']);
        }
}

$cat_name="Contact  $store_name manager";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Wisdom Biz</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css">
<LINK HREF="style.css" TYPE="text/css" REL="stylesheet">
</head>
<body>
<table width="1000" border="0" cellspacing="0" cellpadding="0" height="100%"  class="page">
  <tr>
    <td width="1000" height="90" valign="top" class="top">
		<div class="left">
			<a href="index.html"><h1>WisdomBiz</h1></a>		
		</div>
		<div class="right">
			<a href="index.html" ><span>Home</span></a>
			<a href="index-1.html" ><span>About us</span></a>
			<a href="index-2.html" ><span>Services</span></a>
			<a href="index-3.html" ><span>Projects</span></a>
			<a href="index-4.html" class="act"><span>Solutions</span></a>
			<a href="contacts.php"><span>Contacts</span></a>
		</div>
	</td>
  </tr>
  <tr>
    <td width="1000" height="295" valign="top" class="header">	
		<div>
			<b>“</b><strong>Quality</strong> <br>
			means doing it right<br>
			when no one is looking ”<br>
			<small>Henry Ford</small>
		</div>
	</td>
  </tr>
  <tr>
    <td width="1000" valign="top" height="30"></td>
  </tr>
  <tr>
    <td width="1000" class="line_border" valign="top"></td>
  </tr>
<tr>
    <td width="1000" valign="top" height="25"></td>
  </tr>
  <tr>
    <td width="1000" height="100" valign="top">
		
			<table width="1000" border="0" cellspacing="0" cellpadding="0" height="100">
			  <tr>
				<td width="375" height="100" valign="top">
					<h2>Contact Address</h2>
					<img src="images/photo_contacts.jpg" border="0" align="left" class="contacts">
					<strong>The Companyname Inc</strong><br>
					8901 Marmora Road,<br>
					Glasgow, D04 89GR.<br>
					Telephone:    +1 800 123 1234<br>
					E-mail: <a href="mailto:">mail@.companyname.com</a>
					<div class="clear"></div><br>
					<h2>Useful Links</h2>
					<a href="#">www.companyname.com</a><br>
					Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, 
					sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam es<br><br>
					
					<a href="#">www.companyname.com</a><br>
					Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, 
					sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam es<br>
					<br>


				</td>
				<td width="25" height="100" valign="top">&nbsp;</td>
				<td width="585" height="100" valign="top">
				<h2>Contact Form</h2>
					 <p id="emailSuccess"><strong><?php echo "$statusSuccess" ?></strong></p>
				<p id="emailError"><strong style="color:#FF0000;"><?php echo "$statusError" ?></strong>	</p>
				
		<form action="contacts.php" method="post" id="cForm">
				<input type="hidden" name="act" value="y" />
		<table width="580">
			<tr>
				<td width="130"><label for="posName" ><span class="red">*</span><span class="black">Your Name:</span></label></td><td><input  class="input_contact"  type="text" size="25" name="posName" id="posName" value="<?php echo $_POST['posName'] ?>" /></td>
			</tr>
			<tr>
				<td><label for="posEmail"><span class="red">*</span>E-Mail Address:</label></td><td><input   class="input_contact" type="text" size="25" name="posEmail" id="posEmail" value="<?php echo $_POST['posEmail'] ?>"/></td>
			</tr>
				<tr>
				<td><label for="posCountry">Country:</label></td><td><input  class="input_contact" type="text" size="25" name="posCountry" id="posCountry" value="<?php echo $_POST['posCountry'] ?>"/></td>
			</tr>
			<tr>
				<td><label for="posRegard">Phone:</label></td><td><input  class="input_contact" type="text" size="25" name="posRegard" id="posRegard" value="<?php echo $_POST['posRegard'] ?>"/></td>
			</tr>		
			<tr>
				<td><label for="posText"><span class="red">*</span>Comments:</label></td><td><textarea class="textarea_contact" rows="5" name="posText" id="posText"><?php echo $_POST['posText'] ?></textarea></td>
			</tr>
			<tr>
			<td><label for="posCaptcha"><span class="red">*</span>Security code:</label><br></td><td><input  class="input_contact" style="width:150px; float:left;" type="text" size="25" name="keystring" id="keystring" /> <img src="kcaptcha?<?php echo session_name()?>=<?php echo session_id()?>" style="height:35px; float:right">
		</td>
			</tr>
			<tr>
			<td>&nbsp;</td><td><input class="submit_registry" type="submit" name="selfCC" id="selfCC" value="Submit" /></td>
			</tr>
			</table>
			</form>
				</td>
				
				<td width="15" height="100" valign="top">&nbsp;</td>
			  </tr>
			</table>
	
	
	</td>
  </tr>
  <tr>
    <td width="1000" valign="top" height="30"></td>
  </tr>
  <tr>
    <td width="1000" class="line_border" valign="top"></td>
  </tr>
<tr>
    <td width="1000" valign="top" height="30"></td>
  </tr>
  <tr>
    <td width="1000" height="120" valign="top" class="bg_brown">
		<div class="left">
			<a href="index.html">Home</a>
			<a href="index-1.html">About us</a>
			<a href="index-2.html">Services</a>
			<a href="index-3.html">Projects</a>
			<a href="index-4.html">Solutions</a>
			<a href="contacts.php">Contacts</a>
		</div>
		<div class="right">
			<div>
					<strong class="big_text">E-mail Us:</strong><a href="#">WisBiz@wisdombiz.com</a><br><img src="images/skipe.gif" border="0">wisdom_biz
			</div>
			<div>
					<strong class="big_text">Free Speach:</strong>8-800-245-4887<br>8-800-300-3159
			</div>
		
		</div>
	</td>
  </tr>
  <tr>
    <td width="1000" height="60" valign="top" class="footer">
		WisdomBis © Privacy policy
	</td>
  </tr>
</table>


</body>
</html>
