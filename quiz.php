<?php
   session_start();
   if(!isset($_GET['dataset_id']))
    {
   	 header('location:newmain');
    }
   @require('db.php');
   //error_reporting(0);
   $dataset_id=$_GET['dataset_id'];
   $contest_id=$_GET['contest_id'];
   
   //$title=$_GET['title'];
   $sql=mysqli_query($con,"select title from quiz_master where id=$contest_id");
   $res=mysqli_fetch_assoc($sql);
   $title=$res['title'];
   
   $title=strtoupper($title);
   
   $_SESSION['title']=$title;
   
   $email=$_SESSION['email'];
   
   $_SESSION['dataset_id']=$dataset_id;
   
   
   if(!isset($_SESSION['current']))
   	{
   	$_SESSION['questions']= null;
   	$_SESSION['current'] = 0 ;
   
   	$result="SELECT * FROM  dataset where id=$dataset_id ";
   	//echo $result;
   	$data=mysqli_query($con,$result);
   	$row=mysqli_fetch_assoc($data);
   	$data=$row['data'];
   	
   	$result1 = $con->query("SELECT * FROM $data where dataset_id=$dataset_id order by rand() limit 10");
   		if($result1->num_rows >0)
   		{
   			while($row=$result1->fetch_assoc()){
   				$question[] = $row;
   			}
   			$_SESSION['questions'] = $question;
   		}
   	
   	}
   	
   	//print_r($question);
   
   else {
   		
   		if(isset($_GET['p'])) {
   			$_SESSION['current'] = $_GET['p'];
   		}else {
   			$_SESSION['current'] = 0;
   		}
   	
   		//echo $_SESSION['current'] .":". count($_SESSION['questions']);
   		if($_SESSION['current'] >= count($_SESSION['questions'])) {
   			
   			//echo "Thanks for Quiz!";
   			unset($_SESSION['current']);
   			unset($_SESSION['questions']);
   			header('location:display_res');
   		}	
   }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title><?=$title;?></title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>  
      <style>
         .timer {
         font-size: 1.5em;
         margin-left:82%;
         color:red;
         position:fixed;
         width:100%;
         z-index:1;
         }
      </style>
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
      <script type="text/javascript">
         function fetchdata(){
          $.ajax({
           url: 'response.php',
           type: 'post',
           success: function(response){
         	  document.getElementById("response").innerHTML=response;
            // Perform operation on the return value
         	//console.log(response);
            if(response==0){
         	   alert("Your Time is Over srry!");
         	  window.location="display_res.php";
            }
           }
          });
         }
         
         $(document).ready(function(){
          setInterval(fetchdata,1000);
         });
         
      </script>
      <div class="container">
         <center>
            <h1><?=$title;?></h1>
         </center>
         <div class="row">
            <ol>
               <?php
                  $current = $_SESSION['current'];
                  $row1 = $_SESSION['questions'][$current];
                  ?>
               <div class="container col-md-4" style="position: absolute;  right: 0; left: 0;margin-top:3%;">
                  <div class="panel panel-info">
                     <div class="panel-heading"><b> <?=$current+1?>. <?=$row1['question']?> </b>
                     </div>
                     <div class="panel-body">
                        <div class="radio">
                           A.<label><input type="radio" name='opt' id="opt1" value="a"><?=$row1['opt1']?></label>
                        </div>
                        <div class="radio">
                           B.<label><input type="radio"  name='opt' id="opt2" value="b"><?=$row1['opt2']?></label>						
                        </div>
                        <div class="radio">
                           C.<label><input type="radio"   name='opt'  id="opt3" value="c"><?=$row1['opt3']?></label>
                        </div>
                        <div class="radio">
                           D.<label><input type="radio"   name='opt'  id="opt4" value="d"><?=$row1['opt4']?></label>			
                        </div>
                     </div>
                     </li>	
                  </div>
                  <ul class="pager">
                     <!-- <li><a href="#">Previous</a></li> -->
                     <li><button data-url="?dataset_id=<?=$dataset_id;?>&contest_id=<?=$contest_id;?>&p=<?=$current+1?>" id='<?=$row1['id']?>' class="btn btn-info nextQuestion">Next</button></li>
                  </ul>
                  <Center>
                     <div id="response" style='font-size:30px;'></div>
                  </center>
               </div>
            </ol>
         </div>
      </div>
   </body>
   <script>
      $(document).on('click', '.nextQuestion', function() {
      	
       var opt=($("input[type=radio]:checked").val());
       if(opt==null)
      opt='e';
      	var id = $(this).attr('id');
      	var url = $(this).data('url');
      	$.ajax({	
      		type:"post",
      		data:{qid:id,answer:opt,status:'1'},
      		url: "save_res.php",
      		success: function(result){
      			console.log(result);
      			window.location = url;
      		}	
      	})		
      });
      
      
   </script>
</html>