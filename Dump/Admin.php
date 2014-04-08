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

$BASE2="../AircelInteractiveOBD/";
include($BASE2.'class/DB.class.php');
$msg='Admin Services....!!!';
if($_POST["duser"])
  {
//echo "delete";
 $duser=$_POST["duser"];
 $dq=$duq."'$duser'";
 mysql_query($dq,$link);	 
 $msg=$duser.' User Deleted Successfully....!!!';
}

if($_POST["uname"])
  {
//echo "Add";
$iuser=addslashes(str_replace(" ", "",$_POST["uname"]));
$pword=$_POST["pword"];
$user_data=mysql_fetch_row(mysql_query($suq."'$iuser'",$link)); 
  if($user_data[0]==$iuser)
   {
$msg='Given User is Already There....!!!';
} 
else 
  {
 $iq=$cuq."'$iuser',"."'$pword')"; 
 mysql_query($iq,$link);
 $msg='User Created Successfully....!!!';
 //echo "Inserted";

 }
}

/*if($_POST['start_date'] && $_POST['end_date'])
   {
echo $_POST['start_date'];
echo $_POST['end_date'];

}

/*if(!$_SESSION['UName']=='admin')
{
   // Do not show protected data, redirect to login...
    header('Location: Login.php');
}
//$msg="Comment the work done about the selected Circle";
//$select=$_POST["circle"];
//$txt=$_POST["txt"];
//$uname=$_SESSION['UName'];
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

function submitForm1()
   {

 if(document.getElementById('start_date').value=="")
        {
                alert('Please Select the Start Date!');
                return false;
        }
 if(document.getElementById('end_date').value=="")
        {
                alert('Please Select the End Date!');
                return false;
        }
           
 if(document.getElementById('start_date').value > document.getElementById('end_date').value)
        {
                alert('Start Date must be Less than End Date!');
                return false;
        }    

if(document.getElementById('start_date').value > '<?php echo date("Y-m-d")?>' )
        {
                alert('Start Date is Invalid!!!');
                return false;
        }

return true;

}

function submitForm2()
{
	if(document.getElementById('uname').value=="")
	{
		alert('Please Enter New User Name!');
		return false;
	}
     if(document.getElementById('pword').value=="")
        {
                alert('Please Enter Password!');
                return false;
        }
   
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

function submitForm3()
{
        if(document.getElementById('duser').value=="")
        {
                alert('Please Select User Name!');
                return false;
        }

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

var lastDiv = "one";
function showDiv(divName) 
{
        // hide last div
    //document.write(divName);    
     //  divName="three";
       if (lastDiv) {
                document.getElementById(lastDiv).className = "hiddenDiv";
              }
        //if value of the box is not nothing and an object with that name exists, then change the class
        if (divName && document.getElementById(divName)) {
                document.getElementById(divName).className = "visibleDiv";
                lastDiv = divName;
        }
}

 

//window.history.forward();
//function noBack() { window.history.forward(); }

</script>
 

  <style type="text/css" media="screen">
.hiddenDiv {
        display: none;
        }
.visibleDiv {
        display: block;
        border: 0px grey solid;
        }

</style>
</head>

<body class="bgMain" onLoad=""  bgcolor='799174'>

 <h1 align='left'  style="color:FFFFFF;" > <font face="calibri" color="#D4D066">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin</font></h2>
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

                  <form id="FormName" action="" method="get" name="FormName">

				  <tr>
                     <td align='right'><strong><font face="calibri" color="#FFFFFF">Services:</font></strong></td>
                    <td><select name="service" id='service' value='service' onchange="showDiv(this.value);">
        
        <option value="one">Logs</option>
        <option value="two">AddUser</option>
        <option value="three">DeleteUser</option>
      </select>
     <label><font face="calibri" color="#D94518">*</font></label></td>
                  </tr>
       </form>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right"><strong><font face="calibri" color="#FFFFFF"></font></strong></td>
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
		<script language="javascript" src="<?php echo  $BASE2?>calender/popupcalendar.js"></script>	  
			  <table width="100%" border="0"  cellpadding="0">
                  
                  <tr>
                    <td  class="HeadingOne" align="right"><strong><font face="calibri" color="#FFFFFF"></font></strong></td>
                  </tr>
                  
                  <tr>
                <td align="">
                   <form id="one" action="OBDLog.php" method="post" name="one"  class="" onsubmit="return submitForm1()" >
                  
               <font face="calibri" color="#FFFFFF">ActivityLogs:</font>
               <br><br> 
           <font face="calibri" color="#FFFFFF">StartDate:</font><INPUT class=text readOnly maxLength=10 size=10 name="start_date" id="start_date" value="<?=$stdate?>">     
              <INPUT onclick="popUpCalendar(this, this.form.start_date,'yyyy-mm-dd');return false;" type=image height=16 alt="Pick a Date" width=16 src="<?php echo $BASE2."calender/ew_calendar.gif";?>" align="bottom">                   
                 
  <font face="calibri" color="#FFFFFF">EndDate:</font><INPUT class=text readOnly maxLength=10 size=10 name="end_date" id="end_date" value="<?=$eddate?>">     
     <INPUT onclick="popUpCalendar(this, this.form.end_date,'yyyy-mm-dd');return false;" type=image height=16 alt="Picka Date" width=16 src="<?php echo $BASE2."calender/ew_calendar.gif";?>" align="bottom">  
                  
                   <input  type="submit" value="GetLog" align='right'/>     
                 </form>
                 
                         
             <form id="two" action="" method="post" name="two"  class="hiddenDiv" onsubmit="return submitForm2()">
                     <font face="calibri" color="#FFFFFF">AddUser:</font>
               <br><br>  
              <font face="calibri" color="#FFFFFF">UserName:</font>       
             <input type="text" name="uname" id="uname" style="width:120px">
             <font face="calibri" color="#FFFFFF">Password:</font>
             <input type="text" name="pword" id="pword" style="width:120px" value='tanla@123'>
                      <input  type="submit" value="AddUser"/>     
                    </form>
                    
               <form id="three" action="" method="post" name="three"  class="hiddenDiv" onsubmit="return submitForm3()" >
                     <font face="calibri" color="#FFFFFF">DeleteUser:</font>
               <br><br>
                    <select name="duser" id='duser' value='duser' onchange="">
                    <option value="">Choose...!!!</option>  
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
                <input  type="submit" value="DeleteUser"/>     
                 </form>
             </td> 
             </tr>
         <div align='center'>           
  <label><font face="calibri" color="#D94518">*</font><font face="calibri" color="#E8E527"> <?php echo $msg; ?><font></label> 
             </div>
     <td align="right">
               </td>
                  </tr>
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>                  
              </table>
			 
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
