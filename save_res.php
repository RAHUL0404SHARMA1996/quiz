<?php
   session_start();
   if(!isset($_SESSION['email']))
    {
   	 header('location:index');
    }
   @require('db.php');
   $status=$_POST['status'];
   
   if($status==2)
   {
   
   	$contest_id=$_POST['contest_id'];
   	$dataset_id=$_POST['dataset_id'];
   	
   	$sql="select * from result where  contest_id=$contest_id and email='".$_SESSION['email']."'";
   	$res=$con->query($sql);
   	if($res->num_rows >0)
   	{
   	echo 4;	
   	}
   	
   	else if(isset($_SESSION['current']) && isset($_SESSION['questions']))
   	{
   	echo 3;
   	}	
   	
   	else 
   	{
   		$qry=$con->query("select * from quiz_master where id='$contest_id'");	
   		if($qry->num_rows >0)
   		{
   		require_once 'first.php';
   		quiz_time($contest_id);
   		echo 1;
   		}		
   		else
   		echo  2;	
   	}
   	
   	
   }
   
   else if($status==1)
   {
   	$email=$_SESSION['email'];
   	$dataset_id=$_SESSION['dataset_id'];
   
   	$qid=$_POST['qid'];
   	$ans=$_POST['answer'];
   	if($con->query("insert into temp_data values('$email',$dataset_id,$qid,'$ans')"))
   	echo 1;	
   	else
   	echo 0;
   	
   }
   
   else if($status==3)
   {
   	date_default_timezone_set("Asia/kolkata");
   	$date=date("Y-m-d h:i:sa");
   
   	$email=$_SESSION['email'];
   	$contest=$_POST['contest'];
   	$contest_id=$_POST['contest_id'];
   	$marks=$_POST['total'];
   	$id=rand(100000,1000000);
   	$id=md5($id);
   	$id=md5($email);
   	$con->query("insert into result(email,date,contest,marks,contest_id)values('$email','$date','$contest','$marks',$contest_id)");
   	$con->query("delete from temp_data where email='$email'");
   	echo 3;
   }
   
   else if($status==4)
   {
   	date_default_timezone_set("Asia/kolkata");
   	$email = $_POST['email'];
   	$name = $_POST['user'];
   	$msg = $_POST['msg'];
   	$date=date("Y-M-D h:i:sa");
   	$query ="INSERT INTO feedback VALUES('$date','$email','$name','$msg')";
   
   	if($con->query($query))
   	{
   	echo 1;
   	} 
   
   }
   
   
   ?>