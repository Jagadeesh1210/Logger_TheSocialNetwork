

<?php


//echo "WelCome TO PHP \n";

//$sdate= $_POST["sdt"];
//$edate= $_POST["edt"];
$date=$_POST["dt"];

//echo $date;
if ($date>=date("Y-m-d"))
{
exit("Error::InvalidInput");

}

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

mysql_select_db("TOBD_WEB",$link);



$fname = tempnam("/tmp/WeeklyReportWeb/","OBDReports.xls");

$workbook = &new writeexcel_workbook($fname);//CREATING A WORKBOOK

$worksheet=& $workbook->addworksheet('MIS&OBD-Tracker');	


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



$worksheet->set_column(0, 0, 25);
$worksheet->set_column(1, 15, 12);


//$sdate='2011-11-21';
//$edate='2011-11-27';
//$day=7;
//--------------------------------------------------------------------Chennai
//$date='2011-12-11';
$cid='1400090070';

$capur=0;
$cares=0;
$canor=0;
$casum=0;
$casuc=0;
$caswo=0;
$carom=0;
$cabus=0;
$catot=0;
$casf=0;
$canr=0;
$canp=0;
$cauks=0;
$casfr=0;
$canpv=0;
$cauab=0;

$cdnd=0;
$cosum=0;
$cosuc=0;
$conoa=0;
$corej=0;
$cocon=0;
$cvc=0;
$civc=0;
$cesum=0;
$ctar=0;
$cdur=0;
$ckey=5;
$cskey=0;
$cid1=0;
$cid2=0;
$cid3=0;

$c_query="select  iCampaignId,iTargetListId,vcName  from tbl_CampaignMaster where  iCampaignId in(select iCampaignId from tbl_CampaignDates where date(dtStartTimeStamp)='$date' ) order by vcName";

$c_result=mysql_query($c_query);

while($row_c=mysql_fetch_row($c_result))
{

$c_tarQ="select count(*) from tbl_TargetListNumbers where iTargetListId='$row_c[1]'";
$c_tarR=mysql_query($c_tarQ);

$c_tar=mysql_fetch_row($c_tarR);
$ctar=$ctar+$c_tar[0];

$c_atiQ="select count(*)TOTAL,sum(if(iErrorCode=0,1,0)) SUCCESS,sum(if(iErrorCode=1004,1,0)) SWITCH_OFF,sum(if(iErrorCode=1005,1,0)) MSPurged,sum(if(iErrorCode=1006,1,0)) RetrictedArea,sum(if(iErrorCode=1007,1,0)) NotRegistred,sum(if(iErrorCode=1000,1,0)) ROAMING,sum(if(iErrorCode=1001,1,0)) USER_BUSY,sum(if(iErrorCode=88,1,0)) TIME_OUT,sum(if(iErrorCode=1,1,0)) UnknownSub,sum(if(iErrorCode=34,1,0)) system_failure,sum(if(iErrorCode=102,1,0)) NotProidedfromVLR, sum(if(iErrorCode=90,1,0)) Uabort  from TOBD_CORE.tbl_TransactionDetailsBackup where vcSource='ATI' and iCampaignId=$row_c[0]";

$c_atiR=mysql_query($c_atiQ);

$c_ati=mysql_fetch_row($c_atiR);

  {  
echo "CID ".$row_c[0]."\n";
echo "ATI ".$c_ati[1]."\n";
//$casum=$casum+$c_ati[0];
$casuc=$casuc+$c_ati[1];
$caswo=$caswo+$c_ati[2];
$capur=$capur+$c_ati[3];
$cares=$cares+$c_ati[4];
$canor=$canor+$c_ati[5];
$carom=$carom+$c_ati[6];
$cabus=$cabus+$c_ati[7];
$catot=$catot+$c_ati[8];
$cauks=$cauks+$c_ati[9];
$casfr=$casfr+$c_ati[10];
$canpv=$canpv+$c_ati[11];
$cauab=$cauab+$c_ati[12];

}

$c_dndQ="select count(*) from TOBD_CORE.tbl_TransactionDetailsBackup where vcSource='DND' and iCampaignId=$row_c[0]";

$c_dndR=mysql_query($c_dndQ);

$c_dnd=mysql_fetch_row($c_dndR);

{
$cdnd=$cdnd+$c_dnd[0];
}

$equery="select ceil(siChannels/30) from tbl_CampaignDates where iCampaignId=$row_c[0]";
$eresult=mysql_query($equery);

$eres=mysql_fetch_row($eresult);

$cesum=$cesum+$eres[0];

$c_obdQ="select count(*)TOTAL,sum(if(iErrorCode=0,1,0))SUCCESS,sum(if(iErrorCode=2000,1,0))NOANSWER,sum(if(iErrorCode=2001,1,0))REJECTED,sum(if(iErrorCode=2003,1,0))CONGESTION,sum(if(length(vcValidKeypress)>=1,if(length(vcValidKeypress)<4,1,0),0)) ValidConversions,sum(if(length(vcInvalidKeypress )>=1,if(length(vcInvalidKeypress)<4,1,0),0)) InValidConversions , sum(iDuration) Duration, sum(if(length(vcInvalidKeypress )=1,1,0)),sum(if(iDuration>0&&iDuration<=10,1,0)),sum(if(iDuration>=11&&iDuration<=48,1,0)),sum(if(iDuration>48,1,0))  from TOBD_CORE.tbl_TransactionDetailsBackup where vcSource='OBD' and iCampaignID=$row_c[0]";

$c_obdR=mysql_query($c_obdQ);

$c_obd=mysql_fetch_row($c_obdR);
{
$cosum=$cosum+$c_obd[0];
$cosuc=$cosuc+$c_obd[1];
$conoa=$conoa+$c_obd[2];
$corej=$corej+$c_obd[3];
$cocon=$cocon+$c_obd[4];
$cvc=$cvc+$c_obd[5];
$civc=$civc+$c_obd[6];
$cdur=$cdur+$c_obd[7];
$cskey=$cskey+$c_obd[8];
$cid1=$cid1+$c_obd[9];
$cid2=$cid2+$c_obd[10];
$cid3=$cid3+$c_obd[11];

//OBD Tracker Chennai

$worksheet->write($ckey, 0,$row_c[2], $center);

$worksheet->write($ckey, 1, $date, $header);
$worksheet->write($ckey, 2, $eres[0], $header);
$worksheet->write($ckey, 3, $c_tar[0], $header);
$worksheet->write($ckey, 4, $c_obd[0], $header);
$worksheet->write($ckey, 5, $c_obd[1], $header);

$cnot=$c_obd[2]+$c_obd[3]+$c_obd[4];

$worksheet->write($ckey, 6, $cnot, $header);
$worksheet->write($ckey, 7, round($c_obd[7]/$c_obd[1],2), $header);
$worksheet->write($ckey, 8, $c_obd[5], $header);
$worksheet->write($ckey, 9, 'NA', $header);
$worksheet->write($ckey, 10, 'NA', $header);
$worksheet->write($ckey, 11, 'NA', $header);
$worksheet->write($ckey, 12, round($c_obd[1]/$eres[0],2), $header);
$worksheet->write($ckey, 13, round(($c_obd[5]/$c_obd[1])*100,2).'%', $header);

}

$ckey=$ckey+1;

//echo $ckey;



}



//------------------------------------OBD-Tracker 

$worksheet->write(3, 0, 'OBD-Tracker', $center2);

//$worksheet->write(24, 0, 'CHENNAI', $center2);

$worksheet->write(4, 1, 'Date', $center);
$worksheet->write(4, 2, 'No.of E1s', $center);
$worksheet->write(4, 3, 'BaseTaken', $center);
$worksheet->write(4, 4, 'Calls Sent', $center);
$worksheet->write(4, 5, 'Calls Matured', $center);
$worksheet->write(4, 6, 'Not Reachable', $center);
$worksheet->write(4, 7, 'DurationPerCall(Sec)', $center);
$worksheet->write(4, 8, 'Requests', $center);
$worksheet->write(4, 9, 'Activations', $center);
$worksheet->write(4, 10, 'RejectsDueToLowBalance', $center);
$worksheet->write(4, 11, 'RejectsDueToAlreadyActive', $center);
$worksheet->write(4, 12, 'Calls Matured perE1', $center);
$worksheet->write(4, 13, 'RequestsPerCall', $center);



$worksheet=& $workbook->addworksheet('OBD-Report');

$worksheet->set_column(0, 15, 17);


$worksheet->write(0, 0, "OBD-Report", $center2);
$worksheet->write(1, 0, "$date", $center2);


$worksheet->write(5, 0, "ATI", $center);
$worksheet->write(6, 0, "ATI", $center);
$worksheet->write(7, 0, "ATI", $center);
$worksheet->write(8, 0, "ATI", $center);
$worksheet->write(9, 0, "ATI", $center);
$worksheet->write(10, 0, "ATI", $center);
$worksheet->write(11, 0, "ATI", $center);
$worksheet->write(12, 0, "ATI", $center);
$worksheet->write(13, 0, "ATI", $center);
$worksheet->write(14, 0, "ATI", $center);
$worksheet->write(15, 0, "ATI", $center);
$worksheet->write(16, 0, "ATI", $center);
$worksheet->write(17, 0, "DND", $center);
$worksheet->write(18, 0, "OBD", $center);
$worksheet->write(19, 0, "OBD", $center);
$worksheet->write(20, 0, "OBD", $center);
$worksheet->write(21, 0, "OBD", $center);
$worksheet->write(22, 0, "OBD", $center);
$worksheet->write(23, 0, "OBD", $center);
$worksheet->write(24, 0, "OBD", $center);
$worksheet->write(25, 0, "OBD", $center);
$worksheet->write(26, 0, "Duration", $center);
$worksheet->write(27, 0, "Duration", $center);
$worksheet->write(28, 0, "Keypress", $center);
$worksheet->write(29, 0, "Keypress", $center);
$worksheet->write(30, 0, "Keypress", $center);



$worksheet->write(3, 1, "No. of E1's", $center);
$worksheet->write(4, 1, "Total Base", $center);
$worksheet->write(5, 1,"SUCCESS", $center);
$worksheet->write(6, 1, "unknown_subscriber", $center);
$worksheet->write(7, 1, "system_failure", $center);
$worksheet->write(8, 1, "Timeout", $center);
$worksheet->write(9, 1, "UAbort", $center);
$worksheet->write(10, 1, "Not provided from VLR", $center);
$worksheet->write(11, 1, "Roaming:USSN not Set", $center);
$worksheet->write(12, 1, "UserBusy:SMS Not Set", $center);
$worksheet->write(13, 1, "SwitchOFF", $center);
$worksheet->write(14, 1, "MS-Purged(NR)", $center);
$worksheet->write(15, 1, "Restiricted Area(NR)", $center);
$worksheet->write(16, 1, "NotRegistered(NR)", $center);
$worksheet->write(17, 1, "DND", $center);
$worksheet->write(18, 1, "TotalDialled", $center);
$worksheet->write(19, 1, "SUCCESS", $center);
$worksheet->write(20, 1, "NOANSWER", $center);
$worksheet->write(21, 1, "REJECTED", $center);
$worksheet->write(22, 1, "CONGESTION", $center);
$worksheet->write(23, 1, "Duration<10sec", $center);
$worksheet->write(24, 1, "Duration>10&&<48", $center);
$worksheet->write(25, 1, "Duration>48sec", $center);
$worksheet->write(26, 1, "TotalDuration(min)", $center);
$worksheet->write(27, 1, "Duration/E1(min)", $center);
$worksheet->write(28, 1, "ValidKeypress", $center);
$worksheet->write(29, 1, "InvalidKeypress", $center);
$worksheet->write(30, 1, "SingleKeypress", $center);


$worksheet->write(2, 2, "8thServer", $center);

$worksheet->write(3, 2, $cesum, $header);
$worksheet->write(4, 2, $ctar, $header);
$worksheet->write(5, 2, $casuc, $header);
$worksheet->write(6, 2, $cauks, $header);
$worksheet->write(7, 2, $casfr, $header);
$worksheet->write(8, 2, $catot, $header);
$worksheet->write(9, 2, $cauab, $header);
$worksheet->write(10, 2, $canpv, $header);
$worksheet->write(11, 2, $carom, $header);
$worksheet->write(12, 2, $cabus, $header);
$worksheet->write(13, 2, $caswo, $header);
$worksheet->write(14, 2, $capur, $header);
$worksheet->write(15, 2, $cares, $header);
$worksheet->write(16, 2, $canor, $header);
$worksheet->write(17, 2, $cdnd, $header);
$worksheet->write(18, 2, $cosum, $header);
$worksheet->write(19, 2, $cosuc, $header);
$worksheet->write(20, 2, $conoa, $header);
$worksheet->write(21, 2, $corej, $header);
$worksheet->write(22, 2, $cocon, $header);
$worksheet->write(23, 2, $cid1, $header);
$worksheet->write(24, 2, $cid2, $header);
$worksheet->write(25, 2, $cid3, $header);
$worksheet->write(26, 2, round($cdur/60), $header);
$worksheet->write(27, 2, round(($cdur/60)/($cesum)), $header);
$worksheet->write(28, 2, $cvc, $header);
$worksheet->write(29, 2, $civc, $header);
$worksheet->write(30, 2, $cskey, $header);

//$worksheet->write(2, 2, "Chennai", $center);
//11thServer

//Lookup
/*
$worksheet->write(1, 3, "Lookup", $center2);

$worksheet->write(2, 4, "8thServer", $center);
//$worksheet->write(2, 6, "Chennai", $center);

$worksheet->write(3, 3, "Success", $center);
$worksheet->write(4, 3, "System Failure", $center);
$worksheet->write(5, 3, "TimeOut", $center);
$worksheet->write(6, 3, "Not Reachable", $center);
$worksheet->write(7, 3, "Not provided from VLR", $center);
$worksheet->write(8, 3, "Roaming", $center);
$worksheet->write(9, 3, "UserBusy", $center);

//11thServer

$worksheet->write(3, 4, $casuc, $header);
$worksheet->write(4, 4, $casf, $header);
$worksheet->write(5, 4, $catot, $header);
$worksheet->write(6, 4, $canr, $header);
$worksheet->write(7, 4, $canp, $header);
$worksheet->write(8, 4, $carom, $header);
$worksheet->write(9, 4, $cabus, $header);
*/

$workbook->close();

$filename="/tmp/WeeklyReportWeb/OBDReports8".".xls";
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
