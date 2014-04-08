<?php

 include('config.php');

  //echo $suq."'tanla'";
session_start();
if($_SESSION['UName'])
{
   // Do not show protected data, redirect to login...
     if($_SESSION['UName']=='admin')  
          {
           header('Location:Admin.php'); 
           }
   else 
 header('Location:Logger.php');
}
else
{
//session_start();
session_unset();
}
//echo $_POST["email"];

$email=addslashes(str_replace(" ", "",$_POST["email"]));
$passwd=addslashes(str_replace(" ", "",$_POST["passwd"]));

$msg = '';

//$user_data=mysql_fetch_row(mysql_query($suq."'tanla'",$link));
//echo $user_data[0];
// Code for login
if(!empty($email) && !empty($passwd))
{

	//checking username and password validity
     //	$user_data = $db->fetchRow("tbl_User","vcName='".$email."' and tiStatus=1");
        $user_data=mysql_fetch_row(mysql_query($suq."'$email'",$link));	
      //echo $suq."\n";
	if(count($user_data) > 0)
	{
		//checking for password
//		$check_pass = $db->fetchOne("vcPassword","tbl_User","vcName='".$email."' and vcPassword='".$passwd."' and tiStatus=1");
	       $check_pass=mysql_fetch_row(mysql_query($spq."'$passwd' and vcUName='$email'",$link));
         	
		if($check_pass[0]==$passwd)
		{
				$_SESSION['UName'] = $email;
				//$_SESSION['UserName'] = $user_data["vcName"];
				//$_SESSION['RoleId'] = $user_data["tiRoleId"];
				//$_SESSION['CircleId'] = $user_data["vcCircles"];				
			        
                                    if($email=='admin')	
                                      {
                                       header("Location:Admin.php");  
                                        }
				
				       //header("Location:Logger.php");
                                  
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

 <h2 align='center'  style="color:FFFFFF;" > <font face="calibri" color="#FFFFFF">OBD-Logger</font></h2>
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
                    <td><a href=""><font face="calibri" color=""><strong>changePassword</strong></a></font></td>
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
                    <td colspan="2" align="right"><font face="calibri" color="#E82315">&nbsp;<?php echo $msg?></font></td>
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
                    <td colspan="2" align='right'></td>
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
 <td valign="top" class="bgBelloRedStrip" height="50"> </td>
 </tr>  
<tr>
    <td valign="top" class="bgBelloRedStrip" height="50">
 	
  <table width="978" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#799174">
      <tr>
         <hr width="68%" color="#ffffff" size="2" /> 
      </tr>
     <tr>
        <td align="center" valign="bottom" class="footer"><font face="calibri" color="#ffffff">Copyright &copy; 2012 tanla All rights reserved</font></td>
      </tr>    
</table></td>
  </tr>
</table>
         <hr width="68%" color="#ffffff" size="4" />
      
</body>
</html>
