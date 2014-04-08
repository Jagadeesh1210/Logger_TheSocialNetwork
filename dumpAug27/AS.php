<?php
ob_start();
session_start();
//session_unset();
 include('config.php');

$BASE2="../AircelInteractiveOBD/";
include($BASE2.'class/DB.class.php');
$msg='Admin Services....!!!';
if($_POST["duser"])
  {
//echo "delete";
 
}


if($_POST["uname"])
  {
echo "Add";
 }

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html>

	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
		<title>Untitled Page</title>
		<script type="text/javascript"><!--
var lastDiv = "one";
function showDiv(divName) {
	// hide last div
	if (lastDiv) {
		document.getElementById(lastDiv).className = "hiddenDiv";
	}
	//if value of the box is not nothing and an object with that name exists, then change the class
	if (divName && document.getElementById(divName)) {
		document.getElementById(divName).className = "visibleDiv";
		lastDiv = divName;
	}
}


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

function submitForm2()
{
	if(document.getElementById('uname').value=="")
	{
		alert('Please Enter New User Name!');
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

//-->
</script>
		<style type="text/css" media="screen"><!--
.hiddenDiv {
	display: none;
	}
.visibleDiv {
	display: block;
	border: 0px grey solid;
	}

--></style>
	</head>

	<body class="bgMain" onLoad=""  bgcolor='799174'>
	   
          <h1 align='left'  style="color:FFFFFF;" > <font face="calibri" color="#D4D066">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin</font></h2>
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
            				  <tr>
                     <td align='right'><strong><font face="calibri" color="#FFFFFF">Services:</font></strong>             
 
              <form id="FormName" action="blah.php" method="get" name="FormName">
			<select name="selectName" size="1" onchange="showDiv(this.value);">
				
				<option value="one">Logs</option>
				<option value="two">AddUser</option>
				<option value="three">Report</option>
			</select>
		</form>
               
     <label><font face="calibri" color="#D94518">*</font></label></td>
                  </tr>
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
               <form id="one" action="" method="post" name="one"  class="">
                  
             
             <INPUT class=text readOnly maxLength=10 size=10 name="start_date" id="start_date" value="<?=$stdate?>">     
              <INPUT onclick="popUpCalendar(this, this.form.start_date,'yyyy-mm-dd');return false;" type=image height=16 alt="Pick a Date" width=16 src="<?php echo $BASE2."calender/ew_calendar.gif";?>" align="bottom">                   

                   <input  type="submit" value="GetLog"/>     
                 </form>		

		<p id="two" class="hiddenDiv">This is paragraph 2.</p>
		<p id="three" class="hiddenDiv">This is paragraph 3.</p>		
	
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


