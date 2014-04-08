<?php
//header("Content-type:application/pdf");

// It will be called downloaded.pdf

$file="OBDLogs.xls";

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition:attachment;filename=$file");

// The PDF source is in original.pdf
//readfile("/usr/local/apache2/htdocs/MCAWeb/MonthlyReport/EveryMondayReport_20111114.xls");
readfile("/tmp/OBDLogs".".xls");
?>

