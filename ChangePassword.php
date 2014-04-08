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
                                 
                                $msg="Password Changed....!!!";  
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

<html>
<head>
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

<title>ChangePassword</title>
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
			<b>“</b><strong>Be-Secure</strong> <br>
			Change Your Password<br> ”
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
                 <td colspan="2" class="HeadingOne" align="right"><strong><font face="calibri" color="#000000">User</font></strong>
            <select name="user" id='user' value='user' onchange="">
                   <option value="">SelectUser</option> 
                   <option value="admin">admin</option>
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
                    <td colspan="2" align="right"><font face="calibri" color="green">&nbsp;<?php echo $msg?></font></td>
                  </tr>

                      <tr>
                    <td width="85%" align="right" class="loginText"><strong><font face="calibri" color="#000000">Old Password</font></strong></td>
                    <td width="15%" align="right">&nbsp;
                      <input type="password" name="opasswd" id="opasswd" style="width:120px"></td>
                  </tr>
                  <tr>
                   <td class="loginText" align="right"><strong><font face="calibri" color="#000000">New Password</font></strong></td>
                    <td align="right">&nbsp;<input type="password" name="passwd" id="passwd" style="width:120px"></td>
                  </tr>
                   <td class="loginText" align="right"><strong><font face="calibri" color="#000000">Reconfirm Password</font></strong></td>
                    <td align="right">&nbsp;<input type="password" name="passwd1" id="passwd1" style="width:120px"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;<a href="LogOut.php"><font face="calibri" color="">OBD-Logger</a></td>
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
