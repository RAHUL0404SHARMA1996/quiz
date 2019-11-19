<?php
   @require('db1.php');
   session_start();
   error_reporting(0);
   if(isset($_POST['search']))
   {
   	$datatable=$_POST['datatable'];
   	$_SESSION['datatable']=$datatable;
   
   }
   ?>
<!DOCTYPE html >
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>DELETE QUESTION</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
      <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
         #toast {
         visibility: hidden;
         max-width: 50px;
         height: 50px;
         /*margin-left: -125px;*/
         margin: auto;
         background-color: #333;
         color: #fff;
         text-align: center;
         border-radius: 2px;
         position: fixed;
         z-index: 1;
         left: 5%;right:0;
         bottom: 30px;
         font-size: 17px;
         white-space: nowrap;
         }
         #toast #img{
         width: 50px;
         height: 50px;
         float: left;
         padding-top: 16px;
         padding-bottom: 16px;
         box-sizing: border-box;
         background-color: #111;
         color: #fff;
         }
         #toast #desc{
         color: #fff;
         padding: 16px;
         overflow: hidden;
         white-space: nowrap;
         }
         #toast.show {
         visibility: visible;
         -webkit-animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
         animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
         }
         @-webkit-keyframes fadein {
         from {bottom: 0; opacity: 0;} 
         to {bottom: 30px; opacity: 1;}
         }
         @keyframes fadein {
         from {bottom: 0; opacity: 0;}
         to {bottom: 30px; opacity: 1;}
         }
         @-webkit-keyframes expand {
         from {min-width: 50px} 
         to {min-width: 350px}
         }
         @keyframes expand {
         from {min-width: 50px}
         to {min-width: 350px}
         }
         @-webkit-keyframes stay {
         from {min-width: 350px} 
         to {min-width: 350px}
         }
         @keyframes stay {
         from {min-width: 350px}
         to {min-width: 350px}
         }
         @-webkit-keyframes shrink {
         from {min-width: 350px;} 
         to {min-width: 50px;}
         }
         @keyframes shrink {
         from {min-width: 350px;} 
         to {min-width: 50px;}
         }
         @-webkit-keyframes fadeout {
         from {bottom: 30px; opacity: 1;} 
         to {bottom: 60px; opacity: 0;}
         }
         @keyframes fadeout {
         from {bottom: 30px; opacity: 1;}
         to {bottom: 60px; opacity: 0;}
         }
      </style>
      <script>
         function select()
         {
         var a = document.forms["myform"]["datatable"].value;
         if (a == "") {
         alert("select subject");
         return false;
         }
         }
         
      </script>	
   </head>
   <body>
      <?php
         require_once 'header.php';
         ?>
      <div class="container">
      <div class="jumbotron">
         <CenteR>
            <h1>DELETE</h1>
         </centeR>
      </div>
      <div class="row">
         <form method="post"  name="myform" onsubmit="return select()";>
            <div class="col-md-3 col-xs-7 form-group">
               <select class = "form-control" id="datatable" name="datatable">
                  <option value = "" disabled selected>Select DataSet</option>
                  <?php
                     @require('db1.php');
                     $qry=mysqli_query($con,"select * from dataset");
                     while($row=mysqli_fetch_array($qry))
                     {
                     ?>
                  <option><?=$row['data'];?></option>
                  <?php
                     }
                     ?>
               </select>
            </div>
            <div class="col-md-3 col-xs-2 form-group">
               <button style='background-image:linear-gradient(#f2709c,#ff9472);' class="btn waves-effect waves-light" type="submit" name="search">search <span class="glyphicon glyphicon-search"></span>
               </button>
            </div>
         </form>
      </div>
      <?php
         $qry=mysqli_query($con,"select * from $datatable");
         while($row=mysqli_fetch_array($qry))
         {
         ?>
      <div class='table-responsive'>
         <table class="table table-bordered">
            <tr id='tr<?=$row['id'];?>'>
               <td name="question"><?=$row['question']?>
                  <button style='background-image:linear-gradient(#f2709c,#ff9472);float:right'  class="btn waves-effect waves-light"  onclick="del(this.id);" id="<?=$row['id'];?>"> <span class="glyphicon glyphicon-trash"></span>
                  </button>
               </td>
            </tr>
         </table>
      </div>
      <?php
         }
         ?>
      <div id="toast">
         <div id="img">MSG</div>
         <div id="desc">QUESTION DELETEED..</div>
      </div>
   </body>
   <Script>
      function del(str)
      {
      	
      	$.ajax
      	(
      	{
      	type:"POST",
      	data:{id:str,status:2},
      	url: "add_success.php",
      	success: function(result){
      	console.log(result);
      	if(result==1)
      	{
      	$("#tr"+str).remove();
      	var x = document.getElementById("toast")
      	x.className = "show";
      	setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
      	}
      	}
      	});
      }
   </script>		
</html>