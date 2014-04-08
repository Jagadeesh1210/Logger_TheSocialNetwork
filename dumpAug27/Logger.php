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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
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


<title>OBD Logger</title>
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
    <td width="1000" height="200" valign="top" class="header">	
		   <div>
               <b>“</b><strong>OBD</strong> <br>
                          <strong>Logger</strong>

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
              <td width="50%" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">

                 <form name="InsertForm" method="post" onsubmit="return submitForm()"> 

				  <tr>
                     <td align='right'><strong><font face="calibri" color="#000000">DateType:</font></strong></td>
                    <td>&nbsp;<select name="date" id='date' value='date'>
        <option value="0">PleaseSelect</option>
        <option value="<?php echo date('Y-m-d')?>">TODAY</option>
        
        <option value="<?php echo date('Y-m-d',mktime(0,0,0,date('m'),date('d')-1,date('y'))); ?>">YESTERDAY</option>
      </select>
     <label><font face="calibri" color="#D94518">*</font></label></td>
                  </tr>
                  <tr>
                   <td>&nbsp; </td> 
                    <td align="right"><strong><font face="calibri" color="#000000">Description:</font></strong></td>
                  </tr>
                   <td align='right'><strong><font face="calibri" color="#000000">Circle:</font></strong></td>
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
                    <td align='right'><strong><font face="calibri" color="#000000">Status:</font></td>
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
              </table>
            </td>
              <td>
	<table width="50%" border="0"  cellpadding="0">
                  
                  <tr>
           <td>
      <label><font face="calibri" color="#D94518">*</font><font face="calibri" color="green"> <?php echo $msg; ?><font></label>
               <td>               
   </tr>
                  <tr>
                <td rowspan=3>
                  <textarea name='txt' id='txt' value='txt' rows="3" cols="50"></textarea>
             </td> 
             </tr>
  
             
     <td align="right">
  <input  type="submit" value="Submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>          
                  <tr>
                    <td>&nbsp; <label><font face="calibri" color="#D94518">*</font><font face="calibri" color="#000000">  Latest  Logs<font></label></td>
                  </tr> 
               <tr>
                <table border=1 border-width:5px;>
               
          <tr>
                 
             <th> <font face="calibri" color="#000000"><label >CIRCLE       </label></font></th>
             <th> <font face="calibri" color="#000000"><label >STATUS       </label></font></th>
             <th> <font face="calibri" color="#000000"><label >DATE         </label></font></th>
                 
                  </tr>
                 
          <?php  
                 $squery=$ulog."'".$_SESSION['UName']."' order by iSNo desc limit 5"; 
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
		<div class="left">
			<div>
					<strong class="med_text">NoticeBoard::</strong><br>
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
