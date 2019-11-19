<?php
   @require('db1.php');
   session_start();
   $status=$_POST['status'];
   
   if($status==1)//add question
   {	
   	$table=$_POST['datatable'];
   	$question=$_POST['question'];
   	$opt1=$_POST['opt1'];
   	$opt2=$_POST['opt2'];
   	$opt3=$_POST['opt3'];
   	$opt4=$_POST['opt4'];
   	$correct=$_POST['correct'];
   
   	$qry=mysqli_query($con,"select id from dataset where data='$table'");
   	while($row=mysqli_fetch_array($qry))
   	{
   		$id=$row['id'];
   	}	
   if(mysqli_query($con,"insert into $table(dataset_id,question,opt1,opt2,opt3,opt4,correct)values($id,'$question','$opt1','$opt2','$opt3','$opt4','$correct')"))	
   echo 1;
   else
   echo 0;
   }
   //delte question
   if($status==2)
   {
   
   $datatable=$_SESSION['datatable'];
   $id=$_POST['id'];
   mysqli_query($con,"delete from $datatable where id='$id'");
   echo 1;
   }
   	
   ?>