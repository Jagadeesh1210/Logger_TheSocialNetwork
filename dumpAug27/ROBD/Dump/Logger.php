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
if($_POST)
{
$select=$_POST["circle"];
$txt=addslashes($_POST["txt"]);
$uname=$_SESSION['UName'];
$status=$_POST["status"];
$date=$_POST["date"];
if(!empty($select) && !empty($txt))
  {
 
 $cq=$check."'$select' and "." dtDate='$date' and vcStatus='$status' and vcUName='$uname'";
 //ECHO $cq ;
 $user_data=mysql_fetch_row(mysql_query($cq,$link));
  if($user_data)
   {
 $msg="You Have Already Inserted the Same Record...!!!";  
}
else
 {

//echo $select.$txt ;
/* if((($_POST["date"]==date("Y-m-d",mktime(0,0,0,date('m'),date('d')-1,date('y')))) && (($_POST["status"]=='COMPLETED')||($_POST["status"]=='NOTCOMPLETED'))) || ( )
  {
  $msg="Given Information Is Not Valid...!!!";
}*/
 //else

   if($status=='NOTCOMPLETED')
   {
 $cq=$check."'$select' and "." dtDate='$date' and vcStatus='COMPLETED'";
 //ho $cq ;
 $user_data=mysql_fetch_row(mysql_query($cq,$link));
  if($user_data)
   {
  $msg=$user_data[0]." Already completed the $select circle...!!!";
 }
 else
{
 $sin=$iuq."'$uname',"."'$select',"."'$status',"."'$date',"."'$txt')";
 mysql_query($sin,$link);
 //echo $sin;
 $msg="Submitted Successfully...!!!";
 //echo $_POST["date"];
$select="";
$txt="";
}
 }

 IF($status=='PARTIALLYCOMPLETED')
   {
 $cq=$check."'$select' and "." dtDate='$date' and vcStatus='COMPLETED'";
 //ho $cq ;
 $user_data=mysql_fetch_row(mysql_query($cq,$link));
  if($user_data)
   {
  $msg=$user_data[0]." Already completed the $select circle...!!!";
 }
else
{
 $sin=$iuq."'$uname',"."'$select',"."'$status',"."'$date',"."'$txt')";
 mysql_query($sin,$link);
 //echo $sin;
 $msg="Submitted Successfully...!!!";
 //echo $_POST["date"];
$select="";
$txt="";
}
}
else if($status=='COMPLETED')
 {
  $cq=$check."'$select' and "." dtDate='$date' and vcStatus='COMPLETED'";
 //ho $cq ;
 $user_data=mysql_fetch_row(mysql_query($cq,$link));  
  if($user_data)
   {
  $msg=$user_data[0]." Already registered for the $select circle...!!!";
 }
else
{
 $sin=$iuq."'$uname',"."'$select',"."'$status',"."'$date',"."'$txt')";
 mysql_query($sin,$link);
 //echo $sin;
 $msg="Submitted Successfully...!!!";
 //echo $_POST["date"];
$select="";
$txt="";
}
}
}
}
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
	if(document.getElementById('date').value=="0")
	{
		alert('Please Select DateType!!!');
		return false;
	}
       if(document.getElementById('circle').value=="0")
        {
                alert('Please Select Circle Name!!!');
                return false;
        }
     if(document.getElementById('status').value=="0")
        {
                alert('Please Select the Status!!!');
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
<h3 align='center'  style="color:FFFFFF;" ><font face="calibri" color="#FFFFFF"><?php echo "Welcome --> ".$_SESSION['UName']; ?></font></h3>
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
                     <td align='right'><strong><font face="calibri" color="#FFFFFF">DateType:</font></strong></td>
                    <td>&nbsp;<select name="date" id='date' value='date'>
        <option value="0">PleaseSelect</option>
        <option value="<?php echo date('Y-m-d')?>">TODAY</option>
        
        <option value="<?php echo date('Y-m-d',mktime(0,0,0,date('m'),date('d')-1,date('y'))); ?>">YESTERDAY</option>
      </select>
     <label><font face="calibri" color="#D94518">*</font></label></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right"><strong><font face="calibri" color="#FFFFFF">Description</font></strong></td>
                  </tr>
                   <td align='right'><strong><font face="calibri" color="#FFFFFF">Circle:</font></strong></td>
                    <td>&nbsp;<select name="circle" id='circle' value='circle'>
        <option value="0">PleaseSelect</option>
        <option value="ROTN">ROTN</option>
        <option value="CHENNAI">CHENNAI</option>
        <option value="DELHI">DELHI</option>
        <option value="UPE">UPE</option>
        <option value="MUMBAI">MUMBAI</option>
        <option value="KERALA">KERALA</option>
        <option value="KARNATAKA">KARNATAKA</option>
        <option value="HP">HP</option>
        <option value="ROM">ROM</option>
        <option value="HARYANA">HARYANA</option>
      </select>
     <label><font face="calibri" color="#D94518">*</font></label></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                       </tr>
                <tr>
                    <td align='right'><strong><font face="calibri" color="#FFFFFF">Status:</font></td>
                    <td>&nbsp;<select name="status" id='status' value='status'>
        <option value="0">PleaseSelect</option>
        <option value="COMPLETED">COMPLETED</option>
        <option value="NOTCOMPLETED">NOTCOMPLETED</option>
        <option value="PARTIALLYCOMPLETED">PARTIALLYCOMPLETED</option>
        </select><label><font face="calibri" color="#D94518">*</font></label></td>
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
                  <textarea name='txt' id='txt' value='txt' rows="3" cols="50"></textarea>
             </td> 
             </tr>
                    
  <label><font face="calibri" color="#D94518">*</font><font face="calibri" color="#E8E527"> <?php echo $msg; ?><font></label> 
             
     <td align="right">
  <input  type="submit" value="Submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>          
                  <tr>
                    <td>&nbsp; <label><font face="calibri" color="#D94518">*</font><font face="calibri" color="#E8E527">  Latest  Logs<font></label></td>
                  </tr> 
               <tr>
                <table BORDER="1">
               
          <tr>
                 
             <th> <font face="calibri" color="#000000"><label >CIRCLE</label></font></th>
             <th> <font face="calibri" color="#000000"><label >STATUS</label></font></th>
             <th> <font face="calibri" color="#000000"><label >DATE</label></font></th>
                 
                  </tr>
                 
          <?php  
                 $squery=$ulog."'".$_SESSION['UName']."' order by iSNo desc limit 3"; 
                 $R_result=mysql_query($squery,$link);
                  while($row_R=mysql_fetch_row($R_result))
                  {
          ?>
                  <tr>
                 
             <td align='center'><font face="calibri" color="#000000"> <label ><?php echo $row_R[0];  ?> </label></font></td>
             <td align='center'> <font face="calibri" color="#000000"> <label ><?php echo $row_R[1];  ?> </label></font></td>
             <td align='center'> <font face="calibri" color="#000000"> <label ><?php echo $row_R[2];  ?> </label></font></td>
                 
                  </tr>
       <?php }?>
                
                 </table>          
   
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
