

<?php

//echo "WelCome TO PHP \n";
$sdate=$_POST["start_date"];
$edate=$_POST["end_date"];
//echo "Hai";
//echo $_POST["end_date"];
//if ($date>=date("Y-m-d"))
//{
//exit("Error::InvalidInput");
//}
//$date='2012-05-31';
//if ($sdate>$edate)
//{
//exit("Error::Start Date must be less than End Date");
//}

ob_start();
require_once "class.writeexcel_workbook.inc.php";
require_once "class.writeexcel_worksheet.inc.php";
require_once "functions.writeexcel_utility.inc.php";


$link=mysql_connect("localhost","root","tanla@123") or die(mysql_error());

mysql_select_db("ROBD",$link);



$fname = tempnam("/tmp/","OBDLog.xls");

$workbook = &new writeexcel_workbook($fname);//CREATING A WORKBOOK

$worksheet=& $workbook->addworksheet('ROTN');	


#######################################################################
#
#ADDING THE FORMAT
$header =& $workbook->addformat();
$header->set_align('center');
$header->set_color('black');
$header->set_border(1);
$header->set_font('Tahoma');
$header->set_size('8');

#ADDING THE FORMAT
$center =& $workbook->addformat();
$center->set_color('white');
$center->set_align('center');
$center->set_bg_color('green');
$center->set_bold();
$center->set_border(2);
$center->set_size('8');
$center->set_font('Tahoma');

#ADDING THE FORMAT
$center1=& $workbook->addformat();
$center1->set_align('center');
$center1->set_bg_color('grey');
$center1->set_bold();
$center1->set_color('white');
$center1->set_size('8');
$center1->set_font('Tahoma');
$center1->set_top('2');

#ADDING THE FORMAT
$center2=& $workbook->addformat();
$center2->set_align('center');
$center2->set_bg_color('orange');
$center2->set_bold();
$center2->set_color('white');
$center2->set_size('8');
$center2->set_font('Tahoma');
$center2->set_bottom('2');
$center2->set_top('2');
$center2->set_right('2');
$center2->set_border(2);

$center3=& $workbook->addformat();
$center3->set_align('center');
$center3->set_bg_color('orange');
$center3->set_bold();
$center3->set_color('white');
$center3->set_size('8');
$center3->set_font('Tahoma');
$center3->set_bottom('2');
$center3->set_top('2');
$center3->set_left('2');
######################################################################
######################################################################


//$worksheet->set_column(0, 3, 20);
//$worksheet->set_column(4, 4, 35);
//$worksheet->set_column(5, 5, 20);
//$worksheet->set_column(1, 15, 12);
//$sdate='2012-08-26';
//$edate='2012-08-28';

//--------------------------------------------------------------------ROTN
$worksheet->set_column(0, 3, 20);
$worksheet->set_column(4, 4, 35);
$worksheet->set_column(5, 5, 20);

$worksheet->write(0, 0, 'ROTN', $center2);
$worksheet->write(1, 0, 'Date', $center);
$worksheet->write(1, 1, 'EMPLOYEE NAME', $center);
$worksheet->write(1, 2, 'CIRCLE', $center);
$worksheet->write(1, 3, 'STATUS', $center);
$worksheet->write(1, 4, 'COMMENT', $center);
$worksheet->write(1, 5, 'TIMESTAMP OF LOG', $center);

 $c_query="select dtDate, vcUName,vcCName,vcStatus,txtDescription,dtCreatedOn from UserLogs where dtDate>='$sdate' and dtDate<='$edate' and vcCName='ROTN' order by dtDate";

//echo $c_query."\n";
$c_result=mysql_query($c_query,$link);
$rc=2;
while($row_c=mysql_fetch_row($c_result))
{
//echo $row_c[2];
$worksheet->write($rc, 0,$row_c[0], $header);
$worksheet->write($rc, 1,$row_c[1], $header);
$worksheet->write($rc, 2,$row_c[2], $header);
$worksheet->write($rc, 3,$row_c[3], $header);
$worksheet->write($rc, 4,$row_c[4], $header);
$worksheet->write($rc, 5,$row_c[5], $header);
$rc=$rc+1;
}

//---------------------------------------------------------------CHENNAI

$circle='CHENNAI';
$worksheet=& $workbook->addworksheet($circle);

$worksheet->set_column(0, 3, 20);
$worksheet->set_column(4, 4, 35);
$worksheet->set_column(5, 5, 20);

$worksheet->write(0, 0, $circle, $center2);
$worksheet->write(1, 0, 'Date', $center);
$worksheet->write(1, 1, 'EMPLOYEE NAME', $center);
$worksheet->write(1, 2, 'CIRCLE', $center);
$worksheet->write(1, 3, 'STATUS', $center);
$worksheet->write(1, 4, 'COMMENT', $center);
$worksheet->write(1, 5, 'TIMESTAMP OF LOG', $center);
 
   $c_query="select dtDate, vcUName,vcCName,vcStatus,txtDescription,dtCreatedOn from UserLogs where dtDate>='$sdate' and dtDate<='$edate' and vcCName='$circle' order by dtDate";

//echo $c_query."\n";
$c_result=mysql_query($c_query,$link);
$rc=2;
while($row_c=mysql_fetch_row($c_result))
{
//echo $row_c[2];
$worksheet->write($rc, 0,$row_c[0], $header);
$worksheet->write($rc, 1,$row_c[1], $header);
$worksheet->write($rc, 2,$row_c[2], $header);
$worksheet->write($rc, 3,$row_c[3], $header);
$worksheet->write($rc, 4,$row_c[4], $header);
$worksheet->write($rc, 5,$row_c[5], $header);
$rc=$rc+1;
}

//---------------------------------------------------------------DELHI

$circle='DELHI';
$worksheet=& $workbook->addworksheet($circle);

$worksheet->set_column(0, 3, 20);
$worksheet->set_column(4, 4, 35);
$worksheet->set_column(5, 5, 20);

$worksheet->write(0, 0, $circle, $center2);
$worksheet->write(1, 0, 'Date', $center);
$worksheet->write(1, 1, 'EMPLOYEE NAME', $center);
$worksheet->write(1, 2, 'CIRCLE', $center);
$worksheet->write(1, 3, 'STATUS', $center);
$worksheet->write(1, 4, 'COMMENT', $center);
$worksheet->write(1, 5, 'TIMESTAMP OF LOG', $center);
 
  $c_query="select dtDate, vcUName,vcCName,vcStatus,txtDescription,dtCreatedOn from UserLogs where dtDate>='$sdate' and dtDate<='$edate' and vcCName='$circle' order by dtDate";

//echo $c_query."\n";
$c_result=mysql_query($c_query,$link);
$rc=2;
while($row_c=mysql_fetch_row($c_result))
{
//echo $row_c[2];
$worksheet->write($rc, 0,$row_c[0], $header);
$worksheet->write($rc, 1,$row_c[1], $header);
$worksheet->write($rc, 2,$row_c[2], $header);
$worksheet->write($rc, 3,$row_c[3], $header);
$worksheet->write($rc, 4,$row_c[4], $header);
$worksheet->write($rc, 5,$row_c[5], $header);
$rc=$rc+1;
}

//---------------------------------------------------------------UPE

$circle='UPE';
$worksheet=& $workbook->addworksheet($circle);

$worksheet->set_column(0, 3, 20);
$worksheet->set_column(4, 4, 35);
$worksheet->set_column(5, 5, 20);

$worksheet->write(0, 0, $circle, $center2);
$worksheet->write(1, 0, 'Date', $center);
$worksheet->write(1, 1, 'EMPLOYEE NAME', $center);
$worksheet->write(1, 2, 'CIRCLE', $center);
$worksheet->write(1, 3, 'STATUS', $center);
$worksheet->write(1, 4, 'COMMENT', $center);
$worksheet->write(1, 5, 'TIMESTAMP OF LOG', $center);

   $c_query="select dtDate, vcUName,vcCName,vcStatus,txtDescription,dtCreatedOn from UserLogs where dtDate>='$sdate' and dtDate<='$edate' and vcCName='$circle' order by dtDate";

//echo $c_query."\n";
$c_result=mysql_query($c_query,$link);
$rc=2;
while($row_c=mysql_fetch_row($c_result))
{
//echo $row_c[2];
$worksheet->write($rc, 0,$row_c[0], $header);
$worksheet->write($rc, 1,$row_c[1], $header);
$worksheet->write($rc, 2,$row_c[2], $header);
$worksheet->write($rc, 3,$row_c[3], $header);
$worksheet->write($rc, 4,$row_c[4], $header);
$worksheet->write($rc, 5,$row_c[5], $header);
$rc=$rc+1;
}

//---------------------------------------------------------------MUMBAI

$circle='MUMBAI';
$worksheet=& $workbook->addworksheet($circle);

$worksheet->set_column(0, 3, 20);
$worksheet->set_column(4, 4, 35);
$worksheet->set_column(5, 5, 20);

$worksheet->write(0, 0, $circle, $center2);
$worksheet->write(1, 0, 'Date', $center);
$worksheet->write(1, 1, 'EMPLOYEE NAME', $center);
$worksheet->write(1, 2, 'CIRCLE', $center);
$worksheet->write(1, 3, 'STATUS', $center);
$worksheet->write(1, 4, 'COMMENT', $center);
$worksheet->write(1, 5, 'TIMESTAMP OF LOG', $center);

   $c_query="select dtDate, vcUName,vcCName,vcStatus,txtDescription,dtCreatedOn from UserLogs where dtDate>='$sdate' and dtDate<='$edate' and vcCName='$circle' order by dtDate";

//echo $c_query."\n";
$c_result=mysql_query($c_query,$link);
$rc=2;
while($row_c=mysql_fetch_row($c_result))
{
//echo $row_c[2];
$worksheet->write($rc, 0,$row_c[0], $header);
$worksheet->write($rc, 1,$row_c[1], $header);
$worksheet->write($rc, 2,$row_c[2], $header);
$worksheet->write($rc, 3,$row_c[3], $header);
$worksheet->write($rc, 4,$row_c[4], $header);
$worksheet->write($rc, 5,$row_c[5], $header);
$rc=$rc+1;
}

//---------------------------------------------------------------KERALA

$circle='KERALA';
$worksheet=& $workbook->addworksheet($circle);

$worksheet->set_column(0, 3, 20);
$worksheet->set_column(4, 4, 35);
$worksheet->set_column(5, 5, 20);

$worksheet->write(0, 0, $circle, $center2);
$worksheet->write(1, 0, 'Date', $center);
$worksheet->write(1, 1, 'EMPLOYEE NAME', $center);
$worksheet->write(1, 2, 'CIRCLE', $center);
$worksheet->write(1, 3, 'STATUS', $center);
$worksheet->write(1, 4, 'COMMENT', $center);
$worksheet->write(1, 5, 'TIMESTAMP OF LOG', $center);

   $c_query="select dtDate, vcUName,vcCName,vcStatus,txtDescription,dtCreatedOn from UserLogs where dtDate>='$sdate' and dtDate<='$edate' and vcCName='$circle' order by dtDate";

//echo $c_query."\n";
$c_result=mysql_query($c_query,$link);
$rc=2;
while($row_c=mysql_fetch_row($c_result))
{
//echo $row_c[2];
$worksheet->write($rc, 0,$row_c[0], $header);
$worksheet->write($rc, 1,$row_c[1], $header);
$worksheet->write($rc, 2,$row_c[2], $header);
$worksheet->write($rc, 3,$row_c[3], $header);
$worksheet->write($rc, 4,$row_c[4], $header);
$worksheet->write($rc, 5,$row_c[5], $header);
$rc=$rc+1;
}

//---------------------------------------------------------------KARNATAKA

$circle='KARNATAKA';
$worksheet=& $workbook->addworksheet($circle);

$worksheet->set_column(0, 3, 20);
$worksheet->set_column(4, 4, 35);
$worksheet->set_column(5, 5, 20);

$worksheet->write(0, 0, $circle, $center2);
$worksheet->write(1, 0, 'Date', $center);
$worksheet->write(1, 1, 'EMPLOYEE NAME', $center);
$worksheet->write(1, 2, 'CIRCLE', $center);
$worksheet->write(1, 3, 'STATUS', $center);
$worksheet->write(1, 4, 'COMMENT', $center);
$worksheet->write(1, 5, 'TIMESTAMP OF LOG', $center);

   $c_query="select dtDate, vcUName,vcCName,vcStatus,txtDescription,dtCreatedOn from UserLogs where dtDate>='$sdate' and dtDate<='$edate' and vcCName='$circle' order by dtDate";

//echo $c_query."\n";
$c_result=mysql_query($c_query,$link);
$rc=2;
while($row_c=mysql_fetch_row($c_result))
{
//echo $row_c[2];
$worksheet->write($rc, 0,$row_c[0], $header);
$worksheet->write($rc, 1,$row_c[1], $header);
$worksheet->write($rc, 2,$row_c[2], $header);
$worksheet->write($rc, 3,$row_c[3], $header);
$worksheet->write($rc, 4,$row_c[4], $header);
$worksheet->write($rc, 5,$row_c[5], $header);
$rc=$rc+1;
}

//---------------------------------------------------------------HP

$circle='HP';
$worksheet=& $workbook->addworksheet($circle);

$worksheet->set_column(0, 3, 20);
$worksheet->set_column(4, 4, 35);
$worksheet->set_column(5, 5, 20);

$worksheet->write(0, 0, $circle, $center2);
$worksheet->write(1, 0, 'Date', $center);
$worksheet->write(1, 1, 'EMPLOYEE NAME', $center);
$worksheet->write(1, 2, 'CIRCLE', $center);
$worksheet->write(1, 3, 'STATUS', $center);
$worksheet->write(1, 4, 'COMMENT', $center);
$worksheet->write(1, 5, 'TIMESTAMP OF LOG', $center);

   $c_query="select dtDate, vcUName,vcCName,vcStatus,txtDescription,dtCreatedOn from UserLogs where dtDate>='$sdate' and dtDate<='$edate' and vcCName='$circle' order by dtDate";

//echo $c_query."\n";
$c_result=mysql_query($c_query,$link);
$rc=2;
while($row_c=mysql_fetch_row($c_result))
{
//echo $row_c[2];
$worksheet->write($rc, 0,$row_c[0], $header);
$worksheet->write($rc, 1,$row_c[1], $header);
$worksheet->write($rc, 2,$row_c[2], $header);
$worksheet->write($rc, 3,$row_c[3], $header);
$worksheet->write($rc, 4,$row_c[4], $header);
$worksheet->write($rc, 5,$row_c[5], $header);
$rc=$rc+1;
}

//---------------------------------------------------------------ROM

$circle='ROM';
$worksheet=& $workbook->addworksheet($circle);

$worksheet->set_column(0, 3, 20);
$worksheet->set_column(4, 4, 35);
$worksheet->set_column(5, 5, 20);

$worksheet->write(0, 0, $circle, $center2);
$worksheet->write(1, 0, 'Date', $center);
$worksheet->write(1, 1, 'EMPLOYEE NAME', $center);
$worksheet->write(1, 2, 'CIRCLE', $center);
$worksheet->write(1, 3, 'STATUS', $center);
$worksheet->write(1, 4, 'COMMENT', $center);
$worksheet->write(1, 5, 'TIMESTAMP OF LOG', $center);

   $c_query="select dtDate, vcUName,vcCName,vcStatus,txtDescription,dtCreatedOn from UserLogs where dtDate>='$sdate' and dtDate<='$edate' and vcCName='$circle' order by dtDate";

//echo $c_query."\n";
$c_result=mysql_query($c_query,$link);
$rc=2;
while($row_c=mysql_fetch_row($c_result))
{
//echo $row_c[2];
$worksheet->write($rc, 0,$row_c[0], $header);
$worksheet->write($rc, 1,$row_c[1], $header);
$worksheet->write($rc, 2,$row_c[2], $header);
$worksheet->write($rc, 3,$row_c[3], $header);
$worksheet->write($rc, 4,$row_c[4], $header);
$worksheet->write($rc, 5,$row_c[5], $header);
$rc=$rc+1;
}

//---------------------------------------------------------------HARYANA

$circle='HARYANA';
$worksheet=& $workbook->addworksheet($circle);

$worksheet->set_column(0, 3, 20);
$worksheet->set_column(4, 4, 35);
$worksheet->set_column(5, 5, 20);

$worksheet->write(0, 0, $circle, $center2);
$worksheet->write(1, 0, 'Date', $center);
$worksheet->write(1, 1, 'EMPLOYEE NAME', $center);
$worksheet->write(1, 2, 'CIRCLE', $center);
$worksheet->write(1, 3, 'STATUS', $center);
$worksheet->write(1, 4, 'COMMENT', $center);
$worksheet->write(1, 5, 'TIMESTAMP OF LOG', $center);

   $c_query="select dtDate, vcUName,vcCName,vcStatus,txtDescription,dtCreatedOn from UserLogs where dtDate>='$sdate' and dtDate<='$edate' and vcCName='$circle' order by dtDate";

//echo $c_query."\n";
$c_result=mysql_query($c_query,$link);
$rc=2;
while($row_c=mysql_fetch_row($c_result))
{
//echo $row_c[2];
$worksheet->write($rc, 0,$row_c[0], $header);
$worksheet->write($rc, 1,$row_c[1], $header);
$worksheet->write($rc, 2,$row_c[2], $header);
$worksheet->write($rc, 3,$row_c[3], $header);
$worksheet->write($rc, 4,$row_c[4], $header);
$worksheet->write($rc, 5,$row_c[5], $header);
$rc=$rc+1;
}
//-----------------------------------------------------UserDetails

$circle='USER Log Datails';
$worksheet=& $workbook->addworksheet($circle);
$worksheet->write(0, 0, $circle, $center2);
$worksheet->set_column(0, 3, 20);
$worksheet->set_column(4, 4, 45);
$worksheet->set_column(5, 5, 20);
$worksheet->write(1, 0, 'EMPLOYEE NAME', $center);
$worksheet->write(1, 1, 'Date', $center);
$worksheet->write(1, 2, 'CIRCLE', $center);
$worksheet->write(1, 3, 'STATUS', $center);
$worksheet->write(1, 4, 'COMMENT', $center);
$worksheet->write(1, 5, 'TIMESTAMP OF LOG', $center);

$e_query="select vcUName from Users where vcUName!='admin'";
$e_result=mysql_query($e_query,$link);
$rc=2;
while($row_e=mysql_fetch_row($e_result))
  {
      $worksheet->write($rc, 0,$row_e[0], $center);  
      $rc=$rc+1;
      $rct=$rc;
      $name=$row_e[0];

            $r_query="select vcUName,dtDate,vcCName,vcStatus,txtDescription,dtCreatedOn from UserLogs where dtDate>='$sdate' and dtDate<='$edate' and  vcUName='$name' order by dtDate ";
     $r_result=mysql_query($r_query,$link);
     

  while($row_r=mysql_fetch_row($r_result))
         {
$worksheet->write($rc, 1,$row_r[1], $header);
$worksheet->write($rc, 2,$row_r[2], $header);
$worksheet->write($rc, 3,$row_r[3], $header);
$worksheet->write($rc, 4,$row_r[4], $header);
$worksheet->write($rc, 5,$row_r[5], $header);
$rc=$rc+1;

         }
  
 if($rct==$rc)
  {
  $worksheet->write($rc, 0,'NOLOGS', $header);
$rc=$rc+1;        
   }
$rc=$rc+1;
}

//------------------------------------------


$workbook->close();

$filename="/tmp/OBDLogs".".xls";
$fp=fopen($filename,"w");
$fs=fopen($fname, "r");

while(!feof($fs))
{
$temp=fread($fs,100);
fwrite($fp,$temp);
}
fclose($fp);
fclose($fs);
unlink($fname);
mysql_close($link);
ob_clean();


header('Location:export.php');




?>
