<?php
   @require('db1.php');
   if(isset($_POST['btnadd']))
   {
   
   	$title=$_POST['title'];
   	$date=$_POST['date'];
   
   	$duration=$_POST['time'];
   	$dataset_id=$_POST['dataset'];
   	mysqli_query($con,"insert into quiz_master (title,date,duration,dataset_id) values('$title','$date','$duration',$dataset_id)");
   	
   		
   }
   if(isset($_POST['adddata']))
   {
   $data=$_POST['data'];
   mysqli_query($con,"insert into dataset(data)values('$data')");
   
   	mysqli_query($con,"CREATE TABLE `$data`(
   	`id` int(100) NOT NULL AUTO_INCREMENT,
   	`dataset_id` int(100) NOT NULL,
   	`question` varchar(500) NOT NULL,
   	`opt1` varchar(100) NOT NULL,
   	`opt2` varchar(100) NOT NULL,
   	`opt3` varchar(100) NOT NULL,
   	`opt4` varchar(100) NOT NULL,
   	`correct` varchar(100) NOT NULL,
   	PRIMARY KEY(id)
   	) ENGINE=InnoDB DEFAULT CHARSET=latin1");
   
   }
   if(isset($_POST['deldata']))
   {
   	$dataset=$_POST['dataset1'];
   	echo $dataset;
   	mysqli_query($con,"delete from dataset where data='$dataset'");
   	mysqli_query($con,"drop table $dataset");
   }
   
   if(isset($_POST['delquiz']))
   {
   	$title=$_POST['title'];
   	//echo $dataset;
   	mysqli_query($con,"delete from quiz_master where id='$title'");
   	
   }
   
   $sql="select * from quiz_master";
   $res=$con->query($sql);
   if($res->num_rows > 0)
   {
	   while($row=$res->fetch_assoc())
	   {
		   $contest[]=$row;
	   }
   }
   ?>
<!DOCTYPE html >
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>CREATE QUIZ</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
      <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script>
         function validate()
         {
         var a = document.forms["myform"]["title"].value;
         if (a == "") {
         alert("title must be filled out");
         return false;
         }
         else
         alert(a+' '+" quiz created");
         
         }
         function valid()
         {
         var a = document.forms["myform1"]["data"].value;
         if (a == "") {
         alert("data must be filled out");
         return false;
         }
         else
         alert(a+' '+" dataset created");
         
         }
         
         
           
      </script>
	  <style>
	  .red {
  background-color: #e74c3c;
}
.circle {
  width: 15px;
  height: 15px;
  line-height: 200px;
  border-radius: 50%; /* the magic */
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
 
  margin: 0 auto 40px;
}
.green {
  background-color: #16a085;
}

</style>
   </head>
   <body>
      <?php
         require_once 'header.php';
         ?>
      <div class="container">
         <div class="jumbotron">
            <CenteR>
               <h1>CREATE QUIZ</h1>
            </centeR>
         </div>
         <div class="row">
		 <div class='col-md-6'>
		<div class="panel panel-warning">
		 <div class="panel-heading ">QUESTION SET</div>
		  <div class="panel-body">
		 
            <form  method="post" name="myform1" onsubmit="return valid();" >
               <div class="col-md-6 col-xs-6 form-group">
                
                  <input  type="text" class="form-control" name="data" autocomplete="off" placeholder='CREATE DATA SET'  required>
               </div>
               <div class="col-md-3 col-xs-6 form-group">
                 
                  <button style='background-image:linear-gradient(#f2709c,#ff9472);' name="adddata"   class="btn btn-default" type="submit">CREATE<span class="glyphicon glyphicon-plus"></span>
                  </button>
               </div>
            </form>
		</div>
		</div>
		</div>
		
		<div class='col-md-6'>
		  <div class="panel panel-warning">
		 <div class="panel-heading ">REMOVE QUESTION SET</div>
			<div class="panel-body">
            <form  method="post" >
               <div class="col-md-6 col-xs-6 form-group">
                
                  <select class = "form-control" name="dataset1" required>
                     <option value = "" disabled selected>Select DATASET</option>
                     <?php
                        $qry=mysqli_query($con,"select * from dataset");
                        while($row=mysqli_fetch_array($qry))
                        {
                        ?>
                     <option ><?=$row['data'];?></option>
                     <?php
                        }
                        ?>
                  </select>
               </div>
               <div class="col-md-1 col-xs-2 form-group">
               
                  <button style='background-image:linear-gradient(#f2709c,#ff9472);' name="deldata"   class="btn btn-default" type="submit">DELETE<span class="glyphicon glyphicon-minus"></span>
                  </button>
               </div>
            </form>
		</div>
		</div>
         </div>
		</div>
       
         <div class='row'>
		 <div class='col-md-12'>
			<div class="panel panel-warning">
		 <div class="panel-heading ">CREATE CONTEST</div>
		  <div class="panel-body">
            <form  method="post" name="myform" onsubmit="return validate();">
               <div class="col-md-3 col-xs-8 form-group">
                 
                  <input  type="text" class="form-control" name="title" autocomplete="off" placeholder='ADD TITTLE' required>
               </div>
               <div class="col-md-3 col-xs-8 form-group">
                
                  <input  type="date" class="form-control" name="date" autocomplete="off" placeholder='DATE'  required>
               </div>
              
               <div class="col-md-2 col-xs-8 form-group">
               
                  <input  type="text" class="form-control" id="time" name="time" autocomplete="off" placeholder="TIME IN MINUTES"  required>
               </div>
               <div class="col-md-2 col-xs-7 form-group">
			  
                  <select class = "form-control" name="dataset">
                     <option value = "" disabled selected>Select DATASET</option>
                     <?php
                        $qry=mysqli_query($con,"select * from dataset");
                        while($row=mysqli_fetch_array($qry))
                        {
                        ?>
                     <option value='<?=$row['id'];?>'><?=$row['data'];?></option>
                     <?php
                        }
                        ?>
                  </select>
               </div>
               <div class="col-md-1 col-xs-2 form-group">
			   
                  <button style='background-image:linear-gradient(#f2709c,#ff9472);' name="btnadd"   class="btn btn-default" type="submit">CREATE<span class="glyphicon glyphicon-plus"></span>
                  </button>
            </form>
            </div>
		</div>
		</div>
		</div>
         </div>
        
       
       
         <div class='row'>
		 <div class='col-md-6'>
		  <div class="panel panel-warning">
		 <div class="panel-heading ">DELETE CONTEST</div>
			<div class="panel-body">
            <form  method="post" >
               <div class="col-md-6 col-xs-6 form-group">
                 
                  <select class = "form-control" name="title" required>
                     <option value = "" disabled selected>Select Quiz</option>
                     <?php
                        $qry=mysqli_query($con,"select * from quiz_master");
                        while($row=mysqli_fetch_array($qry))
                        {
                        ?>
                     <option value='<?=$row['id'];?>'><?=$row['title'];?></option>
                     <?php
                        }
                        ?>
                  </select>
               </div>
               <div class="col-md-1 col-xs-2 form-group">
               
                  <button style='background-image:linear-gradient(#f2709c,#ff9472);' name="delquiz"   class="btn btn-default" type="submit">DELETE<span class="glyphicon glyphicon-minus"></span>
                  </button>
               </div>
            </form>
		</div>
		</div>
         </div>
		 
		 <div class='col-md-6'>
		 <?php
		  if($res->num_rows > 0)
		  {
			?>
			<div class='table-responsive'>
				 <table class="table table-bordered">
					<tr>
						<th>#.</th>
						<th>CONTEST NAME</th>
						<th>DATE</th>
						<th>DURATION</TH>
						<th>STATUS</th>
					</tr>
					<?php
					$i=1;
					foreach($contest as $c)
					{
					?>
					<tr>
						<td><?=$i;?></td>
						<td><?=$c['title'];?></td>
						<td><?=$c['date'];?></td>
						<td><?=$c['duration'];?> MINUTES</td>
							<?php
							date_default_timezone_set("Asia/kolkata");
							$date=date("Y-m-d");
							if($c['date']==$date)
							{
							?>
							<td>  <div class="circle green"></div></td>
							<?php
							}
							else
							{
							?>
							<td>  <div class="circle red"></div></td>
							<?php
							}
							?>
							
					</tr>
					<?php
					$i++;
					}
					?>
				 </table>
			</div>
			<?php
		  }
		  ?>
		 </div>
		 
		 
      </div>
	  </div>
   </body>
</html>