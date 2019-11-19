<?php

session_start();
date_default_timezone_set('Asia/Calcutta');
$from_time1=date("H:i:s");
//echo $from_time1;
//echo "<br>";
$to_time1=$_SESSION['end_time'];
//echo $to_time1;

//echo "<br>";
$timefirst=strtotime($from_time1);
$timesecond=strtotime($to_time1);

$differenceinseconds=$timesecond-$timefirst;

if($differenceinseconds==0)
{
echo 0;	
}
else
{
echo gmdate("H:i:s",$differenceinseconds);
}
?> 