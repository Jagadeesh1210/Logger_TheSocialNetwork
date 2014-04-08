<?php

 include('config.php');

  //echo $suq."'tanla'";
session_start();
session_unset();

//echo $_POST["user"];
//echo $_POST["opasswd"];
//echo $_POST["passwd"];
//echo $_POST["passwd1"];
$user=addslashes(str_replace(" ", "",$_POST["user"]));
$opasswd=addslashes(str_replace(" ", "",$_POST["opasswd"]));
$passwd=addslashes(str_replace(" ", "",$_POST["passwd"]));
$passwd1=addslashes(str_replace(" ", "",$_POST["passwd1"]));

//echo $user.$opasswd.$passwd.$passwd1 ;

$msg = '';

//$user_data=mysql_fetch_row(mysql_query($suq."'tanla'",$link));
//echo $user_data[0];
// Code for login
 $pl=strlen($passwd);
if($_POST)
 {
  
if(!empty($user) && !empty($passwd) && !empty($passwd1) && !empty($opasswd) )
{

      $user_data=mysql_fetch_row(mysql_query($suq."'$user'",$link));	
    if(count($user_data) > 0)
	{
		//checking for password
	       $check_pass=mysql_fetch_row(mysql_query($spq."'$opasswd' and vcUName='$user'",$link));
         	
		if($check_pass[0]==$opasswd)
		{
				//$_SESSION['UName'] = $email;
				//$_SESSION['UserName'] = $user_data["vcName"];
				//$_SESSION['RoleId'] = $user_data["tiRoleId"];
				//$_SESSION['CircleId'] = $user_data["vcCircles"];				
			        if($pl>8)
                                  {
                                $up=$uup."'$passwd' where vcUName="."'$user'";
                                //echo $up ;
                                 mysql_query($up,$link);
                                 
                                $msg="Password Changerd....!!!";  
                                  if($passwd==$opasswd)
                                         {
                                           $msg="Old and NewPassword's are Same....!!!";      
                                           }
                                  }
                                  else
                                    $msg="New Password Does't meet the Requirements..!!!";
                  }
                                 
					
		else
		{
			//Invalid Password
			$msg = "Old Password is Not Correct...!!!!";	
			
		}
	}
	else
	{
		//Invalid Username
		$msg = "Invalid Login!";	
	}
}
}


 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
<link href="styles/styles.css" rel="stylesheet" type="text/css" />
<script language="javascript1.2">
function submitLoginForm()
{
	
      if(document.getElementById('user').value=="")
        {
                alert('Please Select the User');
                return false;
        }
       if(document.getElementById('opasswd').value=="")
	{
		alert('Please enter Old Password');
		return false;
	}
	if(document.getElementById('passwd').value=="")
	{
		alert('Please enter New Password');
		return false;
	}
        
    if(document.getElementById('passwd1').value=="")
        {
                alert('Reconfirm New Password');
                return false;
        } 
     if(document.getElementById('passwd').value != document.getElementById('passwd1').value)
              {
    alert('New Password is not Matching!!!');
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

 <h2 align='center'  style="color:FFFFFF;" > <font face="calibri" color="#FFFFFF">Change Password</font></h2>
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
                    <td><a href="LogOut.php"><font face="calibri" color=""><strong>OBD-Logger</strong></a></font></td>
                    <td>&nbsp;</td>
                  </tr>
              </table></td>
              <td valign="top">
			  <form name="loginForm" method="post" onsubmit="return submitLoginForm()">
			  <table width="100%" border="0" cellspacing="2" cellpadding="0">
                  
                  <tr>
                 <td colspan="2" class="HeadingOne" align="right"><strong><font face="calibri" color="#FFFFFF">User</font></strong>
            <select name="user" id='user' value='user' onchange="">
                   <option value="">SelectUser</option> 
                   <option value="admin">Admin</option>
                   <?php
                       $myq=mysql_query("select vcUName from Users where vcUName not in('admin')",$link);
                       while($row_R=mysql_fetch_row($myq))
                           {
                   ?>
                 <option value="<?php echo $row_R[0]; ?>"><?php echo $row_R[0];?></option>
                  <?php
                     }
                     ?>
                  </select>

</td>
                  </tr>
                  <tr>
                    <td colspan="2" align="right"><font face="calibri" color="#E8E527">&nbsp;<?php echo $msg?></font></td>
                  </tr>

                      <tr>
                    <td width="72%" align="right" class="loginText"><strong><font face="calibri" color="#FFFFFF">Old Password</font></strong></td>
                    <td width="28%" align="right">&nbsp;
                      <input type="password" name="opasswd" id="opasswd" style="width:120px"></td>
                  </tr>
                  <tr>
                   <td class="loginText" align="right"><strong><font face="calibri" color="#FFFFFF">New Password</font></strong></td>
                    <td align="right">&nbsp;<input type="password" name="passwd" id="passwd" style="width:120px"></td>
                  </tr>
                   <td class="loginText" align="right"><strong><font face="calibri" color="#FFFFFF">Reconfirm Password</font></strong></td>
                    <td align="right">&nbsp;<input type="password" name="passwd1" id="passwd1" style="width:120px"></td>
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
