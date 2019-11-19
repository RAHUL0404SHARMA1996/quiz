<?php 
   session_start();
   if(!isset($_SESSION['email']))
    {
   	 header('location:index');
    }
    unset($_SESSION['duration']);
    unset($_SESSION['start_time']);
    unset($_SESSION['end_time']);
   //error_reporting(0);
   @require('db.php');
   //$id=$_SESSION['id'];
   
   $title=$_SESSION['title'];
   $email=$_SESSION['email'];
   $dataset_id=$_SESSION['dataset_id'];
   
   $qry1=$con->query("select id from quiz_master where title='$title'");
   $row=$qry1->fetch_assoc();
   $contest_id=$row['id'];
   //echo $contest_id;
   
   $qry=$con->query("select data from dataset where id=$dataset_id");
   $row=$qry->fetch_assoc();
   $datatable=$row['data'];
   
   $sql="select count(correct) as total_question from $datatable";
   //echo $sql;
   $res1=$con->query($sql);
   $row = $res1->fetch_assoc();
   $total_question=$row['total_question'];
   //echo $total_question;
   
   $sql="SELECT t.dataset_id,t.qid,t.user_answer,t.email,q.id,q.dataset_id,q.correct FROM temp_data as t,$datatable as q WHERE t.email='$email' and t.dataset_id=q.dataset_id and t.qid=q.id";
   
   //echo $sql;
   
   $res=$con->query($sql);
   
   $attempt=0;
   $right=0;
   $wrong=0;
   $skip=0;
   
   while($row=mysqli_fetch_assoc($res))
   {
   
      //echo $qid."".$ans."<br>";
   	if($row['user_answer']==$row['correct'])
   	{
   		$right++;
   		$attempt++;
   	}
   	else if($row['user_answer']=='e')
   	{
   		$skip++;
   		
   	}
   	else
   	{
   	 $wrong++;
   	 $attempt++;
   	}
   
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>RESULT</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
      <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script>
         document.addEventListener('contextmenu', event => event.preventDefault());
         	document.onkeydown = function() {    
         	switch (event.keyCode) { 
         	case 116 : //F5 button
         	event.returnValue = false;
         	event.keyCode = 0;
         	return false; 
         	case 82 : //R button
         	if (event.ctrlKey) { 
         	event.returnValue = false; 
         	event.keyCode = 0;  
         	return false; 
         	}}}
      </script>
   </head>
   <body>
      <div class="container" >
         <div class="jumbotron">
            <h1 align="center">RESULT</h1>
            <hr>
            <h4 align="center">CONGRANTS YOU HAVE SUCCESSFULLY COMPLETED <?=$title;?> QUIZ</h4>
            <button style='float:right' onclick="save()" class="btn btn-success" name="send">NEXT</button></a>
            <br></h2>
         </div>
         <form>
            <input type='hidden' id='contest_id'  value="<?=$contest_id?>" >
            <input type='hidden' id='title'  value="<?=$title?>" >
         </form>
         <div class='table-responsive'>
            <table class="table table-bordered">
               <tr>
                  <th colspan=2 style="text-align:center">INFORMATION</th>
               </tr>
               <tr>
                  <th cellpadding=20>TOTAL </th>
                  <td><?=$total_question?></td>
               <tr>
               <tr>
                  <th>ATTEMPT</th>
                  <td><?=$attempt?></td>
               </tr>
               <tr>
                  <th>RIGHT</th>
                  <td id='right'><?=$right?></td>
               </tr>
               <tr>
                  <th>WRONG</th>
                  <td id='wrong'><?=$wrong?></td>
               </tr>
               <tr>
                  <th>SKIP</th>
                  <td id='skip'><?=$skip?></td>
               </tr>
            </table>
         </div>
      </div>
      <Script>
         function save()
         {
         	var contest_id=document.getElementById("contest_id").value;
         	var title=document.getElementById("title").value;
         	
         	var right=$("#right").html();
         	var wrong=$("#wrong").html();
         	var skip=$("#skip").html();
         	//alert(contest_id);
         	//alert(right+wrong+skip);
         	var total=(right*2)-(wrong*.5);
         	
         	//alert(total);
         	$.ajax
         		(
         		{
         			type:"POST",
         			url: "save_res.php",
         			data: {total:total,contest_id:contest_id,contest:title,status:3}, 
         			
         			success:function(result){ 
         			console.log(result);
         				if(result == 3 ) {                       
         
         				swal({
         				title: "SAVING RESULT...",
         				text: "your result is saved successfully!",
         				type: "success",
         
         				confirmButtonClass: "btn-info",
         
         				confirmButtonText: "ok",
         				closeOnConfirm: false
         
         				},
         				function(){
         				window.close();
         				window.location='newmain.php';
         				});
         				}}	  
         		});  
         }
         
      </script>
   </body>
</html>