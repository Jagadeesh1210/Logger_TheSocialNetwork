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

var lastDiv = "";
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

<select name="service" id='service' value='service' onchange="showDiv(this.value);">
        
        <option value="">Choose..!</option>
        <option value="one">Reports</option>
        <option value="two">AddUser</option>
        <option value="three">DeleteUser</option>
      </select>


<form id="one" action="" method="post" name="one"  class="hiddenDiv">
                  
             <label align='center'> <font face="calibri" color="#E8E527">ActivityLog<font></label>
               <br><br> 
             <INPUT class=text readOnly maxLength=10 size=10 name="start_date" id="start_date" value="<?=$stdate?>">     
              <INPUT onclick="popUpCalendar(this, this.form.start_date,'yyyy-mm-dd');return false;" type=image height=16 alt="Pick a
 Date" width=16 src="<?php echo $BASE2."calender/ew_calendar.gif";?>" align="bottom">                   

                   <input  type="submit" value="GetLog"/>     
                 </form>
                 
                         
             <form id="two" action="" method="post" name="two"  class="hiddenDiv" >
                    <label align='center'> <font face="calibri" color="#E8E527">AddUser<font></label>
               <br><br>  
                    <input type="text" name="uname" id="uname" style="width:120px">
                      <input  type="submit" value="AddUser"/>     
                    </form>
                    
               <form id="three" action="" method="post" name="three"  class="hiddenDiv">
                     <label align='center'> <font face="calibri" color="#E8E527">DeleteUser<font></label>
               <br><br>
                    <select name="duser" id='duser' value='duser' onchange="">
                    <option value="">Choose...!!!</option>  
                  
                  </select>   
                <input  type="submit" value="DeleteUser"/>     
                 </form>

</body>
</html>
