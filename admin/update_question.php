<?php
   session_start();
   error_reporting(0);
   @require('db1.php');
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
      <title>UPDATE</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
      <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script>
         function select()
         {
         var a = document.forms["fm"]["datatable"].value;
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
            <h1>UPDATE</h1>
         </centeR>
      </div>
      <div class="row">
         <form  method="post" name="fm" onsubmit="return select();">
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
               <button   style='background-image:linear-gradient(#f2709c,#ff9472);' class="btn btn-default" type="submit" name="search"> <span class="glyphicon glyphicon-search"></span> search
               </button>
            </div>
         </form>
      </div>
      <div class = "row">
         <?php
            $i=1;
            $qry=mysqli_query($con,"select * from $datatable");
            while($row=mysqli_fetch_array($qry))
            {
            		
            	?>
         <form method="post" name="myform" id="myform" >
            <div class="col-md-6">
               <input type="hidden" name="id" value="<?=$row['id'];?>">
               <input type="hidden" name="dataset_id" value="<?=$row['dataset_id'];?>">
               <br>
               <table class="table table-bordered">
                  <tr>
                     <th colspan="2">QUESTION -<?=$i++;?></th>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2"><textarea class="form-control" name="question"><?=$row['question'];?></textarea></TD>
                  </TR>
                  <TR>
                     <TD><input  type="text" class="form-control" name="opt1" value="<?=$row['opt1'];?>">
                     </TD>
                     <Th>OPT1</Th>
                  </TR>
                  <TR>
                     <TD><input  type="text" class="form-control" name="opt2" value="<?=$row['opt2'];?>">
                     </TD>
                     <th>OPT2</Th>
                  </TR>
                  <TR>
                     <TD><input  type="text" class="form-control" name="opt3" value="<?=$row['opt3'];?>">
                     </TD>
                     <Th>OPT3</Th>
                  </TR>
                  <TR>
                     <TD>	<input  type="text" class="form-control" name="opt4" value="<?=$row['opt4'];?>">
                     </TD>
                     <Th>OPT4</Th>
                  </TR>
                  <TR>
                     <TD> <input  type="text" class="form-control" name="correct" value="<?=$row['correct'];?>">
                     </TD>
                     <Th>CORRECT</Th>
                  </TR>
                  <Tr >
                     <TD colspan="2" >
                        <CenteR><button style='background-image:linear-gradient(#f2709c,#ff9472);'  class="btn btn-default"  id="<?=$row['id'];?>"> <span class="glyphicon glyphicon-refresh"></span> update
                           </button>
                        </centeR>
                     </TD>
                  </TR>
               </TABLE>
            </div>
         </form>
         <?php
            }
            ?>
      </div>
   </body>
   <script>
      $(function(e){
      
      	$("#myform").on('submit',function (e)
      	{
      
      	var formData = new FormData(this);
      
      	e.preventDefault();
      	$.ajax
      	(
      	{
      	type:"POST",
      	data:formData,
      	url: "success_update.php",
      	contentType:false,
      	cache:false,
      	processData:false,
      	success: function(result){
      	console.log(result);
      
      	if(result==1)
      	{
      	swal("SUCCESS!", "SUCCESSFULLY UPDATED", "success");
      	}
      	}
      	});
      	});
      	});
      
           
   </script>
</html>