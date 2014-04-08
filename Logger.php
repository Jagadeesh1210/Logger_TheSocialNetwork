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
$msg="Comment or Send A MSG To Ur Colleague about the work/TodoActivities/Status of the selected Circle!";
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
 //if($status!='MESSAGE')
  // { 
 if($user_data && $status!='MESSAGE')
   {
 $msg="You Have Already Inserted the Same Record...!!!";  
}
//}
else
 {

//echo $select.$txt ;
/* if((($_POST["date"]==date("Y-m-d",mktime(0,0,0,date('m'),date('d')-1,date('y')))) && (($_POST["status"]=='COMPLETED')||($_POST["status"]=='NOTCOMPLETED'))) || ( )
  {
  $msg="Given Information Is Not Valid...!!!";
}*/
 //else
if($status=='MESSAGE')
  {
$sin=$iuq."'$uname',"."'$select',"."'$status',"."'$date',"."'$txt')";
mysql_query($sin,$link);
$msg="Message Added Successfully...!!!";

}

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
header("location: Logger.php");
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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Style-Type" content="text/css">
<LINK HREF="style.css" TYPE="text/css" REL="stylesheet">
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


var r=confirm("Please Reconfirm It...!!!");
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
	if(document.getElementById('mcircle').value=="")
	{
		alert('Please Select the Circle!!!');
		return false;
	}
   
else 
{
 return true;
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

var lastDiv="one";

function showDiv(divName) 
{
        // hide last div
    //document.write(divName);    
     //divName="two";
     if(divName =="one")
     { 
    lastDiv="two";
   document.getElementById(lastDiv).className = "hiddenDiv";
   document.getElementById(divName).className = "visibleDiv";
    lastDiv="one";
     }
    else
  {
  if (lastDiv) {
                document.getElementById(lastDiv).className = "hiddenDiv";
              }
        //if value of the box is not nothing and an object with that name exists, then change the class
        if (divName && document.getElementById(divName)) {
                document.getElementById(divName).className = "visibleDiv";
                lastDiv = divName;
        }
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

<body>
<table width="1000" border="0" cellspacing="0" cellpadding="0" height="100%"  class="page">
  <tr>
    <td width="10" height="10" valign="top" class="top">
		<div class="left">
			
		</div>
		
	</td>
  </tr>
  <tr>
    <td width="1000" height="165" valign="top" class="header">	
		   <div>
               <b></b><strong>OBD</strong> <br>
                          <strong>Logger*</strong>

		</div>

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
<td align='center'>
<strong class="big_text"><font face="calibri" color="green"><?php echo "Welcome --> ".$_SESSION['UName']; ?></font></strong>
</td>
</tr>

<tr width='3%'>
<td>

          <strong class="med_text">     <font face="calibri" color="#63312F">Services:</font>
         <select name="service" id='service' value='service' onchange="showDiv(this.value);" selected="">
       <option value="one">Choose...!!!</option> 
        <option value="one">Logger</option>
        <option value="two">MessageWall</option>        
      </select>
       </strong>
           <div align='center'>           
             </div>     
</td>
</tr>

<tr>
    <td width="1000" class="line_border" valign="top"> </td>

  </tr>



  <tr>     <td align='left'> 
       <br>
     <form id="one"  method="post" name="one"  class="<?php if(isset($_POST["mcircle"])){ echo 'hiddenDiv';} else {echo 'visibleDiv'; } ?>" onsubmit="return submitForm1()" >



<font face="calibri" color="black">DateType:&nbsp;&nbsp;&nbsp;&nbsp;</font><select name="date" id='date' value='date'>
        <option value="0">PleaseSelect</option>
        <option value="<?php echo date('Y-m-d')?>">TODAY</option>
        
        <option value="<?php echo date('Y-m-d',mktime(0,0,0,date('m'),date('d')-1,date('y'))); ?>">YESTERDAY</option>
      </select><label><font face="calibri" color="red">*</font></label>
     
&nbsp;&nbsp;&nbsp;&nbsp;
<font face="calibri" color="black">Circle:&nbsp;&nbsp;&nbsp;&nbsp;</font><select name="circle" id='circle' value='circle'>
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
      </select><label><font face="calibri" color="red">*</font></label>
&nbsp;&nbsp;&nbsp;&nbsp;
 <font face="calibri" color="#000000">Status:&nbsp;&nbsp;&nbsp;&nbsp;</font><select name="status" id='status' value='status'>
        <option value="0">PleaseSelect</option>
        <option value="COMPLETED">COMPLETED</option>
        <option value="NOTCOMPLETED">NOTCOMPLETED</option>
        <option value="PARTIALLYCOMPLETED">PARTIALLYCOMPLETED</option>
        <option value="MESSAGE">MESSAGE</option>
        </select><label><font face="calibri" color="red">*</font></label>
        

<div align="right">
<font face="calibri" color="green"><?php echo $msg; ?></font>
</div>
 <div align="right">
<font face="calibri" color="#000000">Comment/Message:&nbsp;&nbsp;</font></font><textarea name='txt' id='txt' value='txt' rows="3" cols="50"></textarea>
<br>
 <input  type="submit" value="Submit"/>
 </div>
<br>
 
<font face="calibri" color="red">*</font><font face="calibri" color="#000000"> Latest  Logs</font>
<table border=1 border-width:5px;>
                
          <tr>
       
             <th align='center'> <font face="calibri" color="#000000">CIRCLE</font></th>
             <th align='center'> <font face="calibri" color="#000000">STATUS</font></th>
             <th align='center'> <font face="calibri" color="#000000">DATE</font></th>
       
                  </tr>

          <?php  
                 $squery=$ulog."'".$_SESSION['UName']."' order by iSNo desc limit 3"; 
                 $R_result=mysql_query($squery,$link);
                  while($row_R=mysql_fetch_row($R_result))
                  {
          ?>
                  <tr>
                 
             <td align='center'><font face="calibri" color="#000000"><?php echo $row_R[0];  ?></font></td>
             <td align='center'> <font face="calibri" color="#000000"><?php echo $row_R[1];  ?></font></td>
             <td align='center'> <font face="calibri" color="#000000"><?php echo $row_R[2];  ?></font></td>
                 
                  </tr>
       <?php }?>
            
 
                 </table>      


</form> 

                  <form id="two" action="" method="post" name="two"  class="<?php if($_POST["mcircle"]){ echo 'visibleDiv';} else {echo 'hiddenDiv'; } ?>  " onsubmit="return submitForm2()">
                     <font face="calibri" color="#000000">MessageWall:</font>
   <br>
             &nbsp;&nbsp;&nbsp;&nbsp;
<font face="calibri" color="black">Circle:&nbsp;&nbsp;&nbsp;&nbsp;</font><select name="mcircle" id='mcircle' value='mcircle'>
        <option value="">PleaseSelect</option> 
        <option value="ALL">ALL</option>
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
      </select><label><font face="calibri" color="red">*</font></label>
&nbsp;&nbsp;&nbsp;&nbsp;           
                     <input  type="submit" value="Submit"/>

<table border=1 border-width:5px; align='right'>
      <tr><td align='center' colspan=4><font face="calibri" color="#000000"><?php echo $_POST['mcircle']; ?> Circle Message Wall</font></td></tr>
          <tr align='right'>
             <th align='center'> <font face="calibri" color="#000000">USER</font></th>
             <th align='center'> <font face="calibri" color="#000000">CIRCLE</font></th>
             <th align='center'> <font face="calibri" color="#000000">InsertedDATE</font></th>
             <th align='center'> <font face="calibri" color="#000000">MESSAGE</font></th>

                  </tr>

          <?php
                if($_POST["mcircle"])
                   {
                $cn=$_POST["mcircle"];
                $mquery=$mlog." where vcCName='$cn' order by iSNo desc limit 10";
                  if($cn=='ALL')
                    {
                     $mquery=$mlog." order by iSNo desc limit 10";     
                     }  
                  }
                  else{
                    $mquery=$mlog." order by iSNo desc limit 10";    
                    }
                 $M_result=mysql_query($mquery,$link); 
                  while($row_M=mysql_fetch_row($M_result))
                  {
          ?>
                  <tr>

             <td align='center'><font face="calibri" color="#000000"><?php echo $row_M[0];  ?></font></td>
             <td align='center'> <font face="calibri" color="#000000"><?php echo $row_M[1];  ?></font></td>
             <td align='center'> <font face="calibri" color="#000000"><?php echo $row_M[2];  ?></font></td>
             <td align='center'> <font face="calibri" color="#000000"><?php echo $row_M[3];  ?></font></td>
             
                  </tr>
       <?php } if($_POST["mcircle"])
                   { unset($_POST['mcircle']); } ?>
            
                
                 </table>

                    </form>

             </td>
               </tr>
<tr>
    <td width="1000" class="line_border" valign="top"></td>
  </tr>
 
   <tr><td width="1000" height="65" valign="top" class="bg_brown">

         
        <br>    
                                        <strong class="med_text"> NoticeBoard::
  <?php
$N_result=mysql_query($snot,$link);
$row_N=mysql_fetch_row($N_result);
  ?>  
<marquee behavior="scroll" direction="left" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();"><?php echo $row_N[0]; ?></marquee
>   </strong> 



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

