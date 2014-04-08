<?php


//database connection variables
        $HOST = 'localhost'; // Public IP
        //$HOST = '10.179.14.11';
        
        $DBUSER = 'root';
        $DBPASS = 'tanla@123';
        $DBNAME = 'ROBD';
        $REMOTEDBNAME = 'TOBD_CORE_CIRCLE';
     $link=mysql_connect("localhost","root","tanla@123") or die(mysql_error());
    if($link)
mysql_select_db("ROBD",$link);
   $suq="select vcUName from Users where vcUName=";
   $spq="select vcPWord from Users where vcPWord=";
   $iuq="insert into UserLogs(vcUName,vcCName,vcStatus,dtDate,txtDescription) value(";
   $duq="delete from Users where vcUName=";
   $cuq="insert into Users(vcUName,vcPWord) value(";
   $uup="update Users set dtCreatedOn=now(),vcPWord=";
   $check="select vcUName from UserLogs where vcCName=";
   $ulog="select vcCName,vcStatus,dtDate from UserLogs where vcUName=";
   $snot="select Notice from NoticeBoard order by iSNo desc limit 1";
   $nin="insert into NoticeBoard(Notice) values(";
   $mlog="select vcUName,vcCName,dtDate,txtDescription from UserLogs";
?>


