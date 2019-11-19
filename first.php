<?php

function quiz_time($contest_id)
{
date_default_timezone_set('Asia/Calcutta');
$con=mysqli_connect("localhost","root","","quiz");
$res=mysqli_query($con,"select duration from quiz_master where id='$contest_id'");
$row=mysqli_fetch_array($res);
$duration=$row['duration'];

$_SESSION['duration']=$duration;
$_SESSION['start_time']=date("H:i:s");
//echo $duration;
//echo "<br>";
//echo $_SESSION['start_time'];
//echo "<br>";
$end_time=$end_time=date(" H:i:s",strtotime('+' .$_SESSION['duration'].'minutes',strtotime($_SESSION['start_time'])));

$_SESSION['end_time']=$end_time;
//echo $_SESSION['end_time'];
}
?>


