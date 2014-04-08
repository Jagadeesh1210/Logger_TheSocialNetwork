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
$str=$email;
$str = strtolower($str);
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
			        
                                    if($str=='admin')	
                                      {
                                     //echo $email;  
                                     header("Location:Admin.php");  
                                        }
				         else
                                              {
				             echo $email;    
                                     header("Location:Logger.php");
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


<html>
<head>
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

<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css">
<LINK HREF="style.css" TYPE="text/css" REL="stylesheet">
</head>
<body>
<table width="1000" border="0" cellspacing="0" cellpadding="0" height="100%"  class="page">
  <tr>
    <td width="10" height="10" valign="top" class="top">
		<div class="left">
			
		</div>
		
	</td>
  </tr>
  <tr>
    <td width="1000" height="280" valign="top" class="header">	
		<div>
			<b>“</b><strong>Logger</strong><br><br>
			streamline Your Activities<br> ”
			<small>Tanla!!!</small>
		</div>
	</td>
  </tr>
<tr>
    <td width="1000" class="line_border" valign="top"></td>
  </tr>
<tr>
<td>
<form name="loginForm" method="post" onsubmit="return submitLoginForm()">
			  <table width="100%" border="0" cellspacing="2" cellpadding="0">
                  
                  <tr>
                    <td colspan="2" class="HeadingOne" align="right"><strong><font face="calibri" color="#595148">Login</font></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="right"><font face="calibri" color="red">&nbsp;<?php echo $msg?></font></td>
                  </tr>
                  <tr>
                    <td width="85%" align="right" class="loginText"><strong><font face="calibri" color="#595148">User Name</font></strong></td>
                    <td width="15%" align="right">&nbsp;
                      <input type="text" name="email" id="email" style="width:120px"></td>
                  </tr>
                  <tr>
                    <td class="loginText" align="right"><strong><font face="calibri" color="#595148">Password</font></strong></td>
                    <td align="right">&nbsp;<input type="password" name="passwd" id="passwd" style="width:120px"></td>
                  </tr>
                  <tr>
                    <td align='left'><a href="ChangePassword.php"><font face="calibri" color="">changePassword</a></td>
                    <td align="right">&nbsp;<input  type="submit" value="Submit" /></td>
                  </tr>
                  <tr>
                    <td colspan="2" align='right'></td>
                  </tr>                  
              </table>
			  </form>
</td>
</tr>
<tr>
    <td width="1000" class="line_border" valign="top"></td>
  </tr>
 
   <tr><td width="1000" height="100" valign="top" class="bg_brown">
		<div class="left">
			<a href="http://www.tanla.com/">Home</a>
			<a href="http://www.tanla.com/">About us</a>
			<a href="http://www.tanla.com/">Services</a>
			<a href="http://www.tanla.com/">Projects</a>
			<a href="http://www.tanla.com/">Solutions</a>
			<a href="http://www.tanla.com/">Contacts</a>
		</div>
		<div class="right">
			<div>
					<strong class="big_text"></strong><a href=""></a><br>
			</div>
			<div>
					
			</div>
		
		</div>
	</td>
  </tr>
  <tr>
    <td width="1000" height="5" valign="top" class="footer">
		Tanla © Privacy policy
	</td>
  </tr>
</table>


</body>
</html>
