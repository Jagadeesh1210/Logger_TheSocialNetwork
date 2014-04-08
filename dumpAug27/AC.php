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
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

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


<title>OBD Logger</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css">
<LINK HREF="style.css" TYPE="text/css" REL="stylesheet">
<link href="styles/styles.css" rel="stylesheet" type="text/css" />
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
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
    <td width="1000" height="200" valign="top" class="header">	
		   <div>
               <b>“</b><strong>Admin</strong> <br>
                          <strong></strong>

		</div>
	</td>
  </tr>
<tr>
    <td width="1000" class="line_border" valign="top"></td>
  </tr>
<tr>             
<td>
 <h1 align='right'><strong class="big_text" align='right'><font face="calibri" color="red"><a href="LogOut.php" onclick="">Logout</a></font></strong> </h1>
</td>
</tr>

<tr>
<td>
<strong class="big_text"><font face="calibri" color="green"><?php echo "Welcome --> ".$_SESSION['UName']; ?></font></strong>
</td>
</tr>
<tr>
<td>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="50%" valign="top">

                 <form name="InsertForm" method="post" onsubmit="return submitForm()"> 
				  
                     <strong><font face="calibri" color="#000000">Services:</font></strong>
                    
    <select name="service" id='service' value='service' onchange="showDiv(this.value);">
         <option value="one">Logs</option>
        <option value="two">AddUser</option>
        <option value="three">DeleteUser</option>
      </select>
     <label><font face="calibri" color="#D94518">*</font></label>

</td>                             
            <td>                 
<script language="javascript" src="<?php echo  $BASE2?>calender/popupcalendar.js"></script>	

         <div align='center'>           
  <font face="calibri" color="#D94518">*</font><font face="calibri" color="green"> <?php echo $msg; ?><font>
             </div>

<br><br>

<form id="one" action="OBDLog.php" method="post" name="one"  class="" onsubmit="return submitForm1()" >
                  
               <font face="calibri" color="#000000">ActivityLogs:</font>
               <br><br> 
                                    <font face="calibri" color="#000000">StartDate:</font><INPUT class=text readOnly maxLength=10 size=10 name="start_date" id="start_date" value="<?=$stdate?>">     
              <INPUT onclick="popUpCalendar(this, this.form.start_date,'yyyy-mm-dd');return false;" type=image height=16 alt="Pick a Date" width=16 src="<?php echo $BASE2."calender/ew_calendar.gif";?>" align="bottom">                   
                 
  <font face="calibri" color="#000000">EndDate:</font><INPUT class=text readOnly maxLength=10 size=10 name="end_date" id="end_date" value="<?=$eddate?>">     
       <INPUT onclick="popUpCalendar(this, this.form.end_date,'yyyy-mm-dd');return false;" type=image height=16 alt="Picka Date" width=16 src="<?php echo $BASE2."calender/ew_calendar.gif";?>" align="bottom">  
                  
                   <input  type="submit" value="GetLog" align='right'/>     
             </form>

 <form id="two" action="" method="post" name="two"  class="hiddenDiv" onsubmit="return submitForm2()">
                     <font face="calibri" color="#000000">AddUser:</font>
               <br><br>  
              <font face="calibri" color="#000000">UserName:</font>       
             <input type="text" name="uname" id="uname" style="width:120px">
             <font face="calibri" color="#000000">Password:</font>
             <input type="text" name="pword" id="pword" style="width:120px" value='tanla@123'>
                      <input  type="submit" value="AddUser"/>     
                    </form>

<form id="three" action="" method="post" name="three"  class="hiddenDiv" onsubmit="return submitForm3()" >
                     <font face="calibri" color="#000000">DeleteUser:</font>
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
  
             
             

</table>

<table width="1000" border="0" cellspacing="0" cellpadding="0" height="10%"  class="">
  <tr>
    <td width="1000" class="line_border" valign="top"></td>
  </tr> 
   <tr><td width="1000" height="100" valign="" class="bg_brown">
		<div class="left">
		
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
