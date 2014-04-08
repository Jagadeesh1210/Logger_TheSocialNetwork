<?php
ob_start();
session_start();
//session_unset();
 include('config.php');
if(!$_SESSION['UName'])
{
   // Do not show protected data, redirect to login...
    header('Location: Login.php');
}
$msg="Comment the work done about the selected Circle";
$select=$_POST["circle"];
$txt=$_POST["txt"];
$uname=$_SESSION['UName'];
if(!empty($select) && !empty($txt))
  {

//echo $select.$txt ;

 $sin=$iuq."'$uname',"."'$select',"."'$txt')";
 mysql_query($sin,$link);
 $msg="Submitted Successfully...!!!";
 //mysql_query("insert into UserLogs(vcUName,vcCName,txtDescription) value('tanla','CHENNAI','HAI')",$link) ;
//echo Hai;
$select="";
$txt="";
}

/*	
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
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<title>OBD Logger</title>
<link href="styles/styles.css" rel="stylesheet" type="text/css" />
<script language="javascript1.2">

function check()
{
var r=confirm("Are you sure...");
if(r)
{
 return true;
}
else 
{
 return false;
}
}

function submitForm()
{
	if(document.getElementById('circle').value=="0")
	{
		alert('Please Select Circle Name!');
		return false;
	}
	if(document.getElementById('txt').value=="")
	{
		alert('Please Comment on TextArea!!!');
		return false;
	}
/*	if(!validate_email(document.getElementById('email'),"Please enter valid Email")) 
	{
		document.getElementById('email').value="";
		document.getElementById('email').focus();
		return false;
	}
*/

var r=confirm("Please Reconfirm It...!!!");
if(r)
{
 return true;
}
else 
{
 return false;
}	
      
//return true;

//return check();	

}

//window.history.forward();
//function noBack() { window.history.forward(); }

</script>
</head>

<body class="bgMain" onLoad=""  bgcolor='799174'>

 <h1 align='left'  style="color:FFFFFF;" > <font face="calibri" color="#D4D066">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logger</font></h2>
<h2 align='right'  style="color:FFFFFF;" > <a href="LogOut.php" onclick=""><font face="calibri" color="#AD3121">Logout</font></a></h2>
<h3 align='center'  style="color:FFFFFF;" ><font face="calibri" color="#FFFFFF"><?php echo "Welcome -- ".$_SESSION['UName']; ?></font></h3>
<hr width="68%" color="#ffffff" size="4" />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td style="height:123px;" valign="middle"><table width="978" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
      	<td colspan="2" align="right" class="user">&nbsp;</td>        
      </tr>
      
      <tr>
        <td align='right'><img src="tanla_logo.png" width="120" height="31"  /></td>
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

                 <form name="InsertForm" method="post" onsubmit="return submitForm()"> 

				  <tr>
                     <td align='right'><strong><font face="calibri" color="#FFFFFF">Circle:</font></strong></td>
                    <td><select name="circle" id='circle' value='circle'>
        <option value="0">PleaseSelect</option>
        <option value="HP">HP</option>
        <option value="2">JK</option>
        <option value="3">Delhi</option>
        <option value="4">UPE</option>
        <option value="5">UPW</option>
        <option value="6">Mumbai</option>
        <option value="7">ROM</option>
        <option value="8">Rajasthan</option>
        <option value="9">Haryana</option>
        <option value="10">Gujarat</option>
        <option value="11">MP</option>
        <option value="12">Punjab</option>
        <option value="13">NorthEast</option>
        <option value="14">Assam</option>
        <option value="15">Kolkata</option>
        <option value="16">Orissa</option>
        <option value="17">WestBengal</option>
        <option value="18">Bihar</option>
      </select>
     <label><font face="calibri" color="#D94518">*</font></label></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right"><strong><font face="calibri" color="#FFFFFF">Description</font></strong></td>
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
			  
			  <table width="100%" border="0"  cellpadding="0">
                  
                  <tr>
                    <td  class="HeadingOne" align="right"><strong><font face="calibri" color="#FFFFFF"></font></strong></td>
                  </tr>
                  
                  <tr>
                <td>
                  <textarea name='txt' id='txt' value='txt' rows="8" cols="50"></textarea>
             </td> 
             </tr>
                    
  <label><font face="calibri" color="#D94518">*</font><font face="calibri" color="#E8E527"> <?php echo $msg; ?><font></label> 
             
     <td align="right">
  <input  type="submit" value="Submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
     
     <tr>
       </td>
      </tr>
    </table></td>
  </tr>
</table>
<hr width="68%" color="#ffffff" size="4" />
</body>
</html>
