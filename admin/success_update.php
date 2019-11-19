<?php
session_start();
@require('db1.php');
$datatable=$_SESSION['datatable'];
	$id=$_POST['id'];
	$dataset_id=$_POST['dataset_id'];
	
	$question=$_POST['question'];
	$opt1=$_POST['opt1'];
	$opt2=$_POST['opt2'];
	$opt3=$_POST['opt3'];
	$opt4=$_POST['opt4'];
	$correct=$_POST['correct'];
	//echo "$id<br>";
	//echo "$qid<br>";
	//echo "$question<bR>";
	//echo "$opt1<bR>";
	//echo "$correct<br>";
	


mysqli_query($con,"update $datatable set question='$question',opt1='$opt1',opt2='$opt2',opt3='$opt3',opt4='$opt4',correct='$correct' where id='$id'");

echo 1;

?>