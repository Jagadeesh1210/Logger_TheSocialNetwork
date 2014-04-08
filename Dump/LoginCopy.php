<?php

/***
 * @Author: Sudhakar
 * @Date: 10-06-10	
 * @File: For Login page
***/

session_start();
session_unset();

$msg = '';

// Code for login
if(!empty($email) && !empty($passwd))
{

	//checking username and password validity
	$user_data = $db->fetchRow("tbl_User","vcName='".$email."' and tiStatus=1");
	
	if(count($user_data) > 0)
	{
		//checking for password
		$check_pass = $db->fetchOne("vcPassword","tbl_User","vcName='".$email."' and vcPassword='".$passwd."' and tiStatus=1");
		
		if($check_pass)
		{
				$_SESSION['UserId'] = $user_data["iUserId"];
				$_SESSION['UserName'] = $user_data["vcName"];
				$_SESSION['RoleId'] = $user_data["tiRoleId"];
				$_SESSION['CircleId'] = $user_data["vcCircles"];				
				
				if($_SESSION['RoleId']=='2')
				{
				//	header("Location:".$BASE.$USER_MODULE_URL."Home");
					header("Location:".$BASE.$USER_MODULE_URL."Campaigns");
					exit;
				}
				else
				{
				//	header("Location:".$BASE.$ADMIN_MODULE_URL."Home");
					header("Location:".$BASE.$ADMIN_MODULE_URL."Campaigns");
					exit;
				}
		}
		else
		{
			//Invalid Password
			$msg = "Invalid Login!";	
			
		}
	}
	else
	{
		//Invalid Username
		$msg = "Invalid Login!";	
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OBD Logger</title>
<link href="styles/styles.css" rel="stylesheet" type="text/css" />
<script language="javascript1.2">
function submitLoginForm()
{
	if(document.getElementById('email').value=="")
	{
		alert('Please enter User Name');
		return true;
	}
	if(document.getElementById('passwd').value=="")
	{
		alert('Please enter Password');
		return false;
	}
/*	if(!validate_email(document.getElementById('email'),"Please enter valid Email")) 
	{
		document.getElementById('email').value="";
		document.getElementById('email').focus();
		return false;
	}
*/
	return true;
}
</script>
</head>

<body class="bgMain" onload="document.loginForm.email.focus();" bgcolor='799174'>

 <h2 align='left'  style="color:FFFFFF;" > <font face="calibri" color="#FFFFFF">Logger</font></h2>
<hr width="68%" color="#ffffff" size="4" />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td style="height:123px;" valign="middle"><table width="978" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
      	<td colspan="2" align="right" class="user">&nbsp;</td>        
      </tr>
      
      <tr>
        <td><img src="tanla_logo.png" width="120" height="31"  /></td>
        <td align="right" valign="bottom"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td class="bgRed" valign="bottom"><table width="978" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top" class="theamCloudBg">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="50%" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">

                  <!--<tr>
                    <td width="8%"><img src="<?php echo $BASE ?>media/one.gif" width="40" height="34" /></td>
                    <td width="92%"><span class="capction">Send Free SMS To</span> <span class="capctionSmall">anyone in the world!</span> </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo $BASE ?>media/two.gif" width="40" height="34" /></td>
                    <td><span class="capction">Send Free SMS To</span> <span class="capctionSmall">anyone in the world!</span> </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo $BASE ?>media/three.gif" width="40" height="34" /></td>
                    <td><span class="capction">Send Free SMS To</span> <span class="capctionSmall">anyone in the world!</span> </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>-->
				  <tr>
                     <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                     <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
              </table></td>
              <td valign="top">
			  <form name="loginForm" method="post" onsubmit="return submitLoginForm()">
			  <table width="100%" border="0" cellspacing="2" cellpadding="0">
                  
                  <tr>
                    <td colspan="2" class="HeadingOne" align="right"><strong><font face="calibri" color="#FFFFFF">Login</font></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="right"><font face="calibri" color="#FFFFFF">&nbsp;<?php echo $msg?></font></td>
                  </tr>
                  <tr>
                    <td width="72%" align="right" class="loginText"><strong><font face="calibri" color="#FFFFFF">User Name</font></strong></td>
                    <td width="28%" align="right">&nbsp;
                      <input type="text" name="email" id="email" style="width:120px"></td>
                  </tr>
                  <tr>
                    <td class="loginText" align="right"><strong><font face="calibri" color="#FFFFFF">Password</font></strong></td>
                    <td align="right">&nbsp;<input type="password" name="passwd" id="passwd" style="width:120px"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right">&nbsp;<input  type="submit" value="Submit" /></td>
                  </tr>
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>                  
              </table>
			  </form>
			  </td>
            </tr>
          </table>

        </td>
        </tr>

    </table></td>
  </tr>
  <tr>
    <td valign="top" class="bgBelloRedStrip" height="50">
 	
  <table width="978" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#799174">
      <tr>
        <td height="10">&nbsp;</td>
      </tr>
     <hr width="68%" color="#ffffff" size="4" /> 
     <tr>
        <td align="center" valign="bottom" class="footer"><font face="calibri" color="#ffffff">Copyright &copy; 2012 tanla All rights reserved</font></td>
      </tr>
    </table></td>
  </tr>
</table>
<hr width="68%" color="#ffffff" size="4" />
</body>
</html>
