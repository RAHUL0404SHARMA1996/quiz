<?php
   session_start();
   if(!isset($_SESSION['email']))
    {
   	 header('location:index');
    }
   //error_reporting(0);
   @require('db.php');
   $email=$_SESSION['email'];
   $contest_id=$_GET['contest_id'];
   //echo $contest_id;
   
   $qry=$con->query("SELECT * FROM result  where contest_id=$contest_id ORDER BY marks desc");
   while($row=$qry->fetch_assoc())
   {
   	$records[]=$row;
   }
   
   
   function getRankImg($rank) {
   	$img = '';
   	switch($rank) {
   		case 1:
   			$img = "<img src='images/first.png' style='height:30px;margin-top:-10%;'>";
   		break;
   		case 2:
   			$img = "<img src='images/second.png' style='height:30px;margin-top:-10%;'>";
   		break;
   		case 3:
   			$img = "<img src='images/third.png' style='height:30px;margin-top:-10%;'>";
   		break;
   		default:
   			$img = '';
   	}
   	return $img;
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>RANK</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel = "stylesheet"
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel = "stylesheet"
         href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
         $(document).ready(function(){
           $("#myInput").on("keyup", function() {
             var value = $(this).val().toLowerCase();
             $("#myTable tr").filter(function() {
               $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
           });
         });
      </script>
   </head>
   <body>
      <div class="container-fluid">
         <div class="jumbotron" style='background-image:linear-gradient(#f2709c,#ff9472);'>
            <h5 align="center">RANK</h5>
         </div>
      </div>
      <div class="container">
         <div class='row'>
            <div class="input-field col s12 m4 l4 col s12 m4 l2">
               <input id="myInput" type="text" class="validate">
               <label for="search">Search  email..</label>
            </div>
         </div>
         <div class='table-responsive'>
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th>CONTEST</th>
                     <th>DATE</th>
                     <th>EMAIL</th>
                     <th>MARKS</th>
                     <th></th>
                     <th>RANK</TH>
                  </tr>
               </thead>
               <?php
                  $rank = 0;
                  if(mysqli_num_rows($qry)>0)
                  {
                  	foreach($records as $key => $row)
                  	{
                  		if( !$key || $old != $row['marks']) 
                  		{
                  			$old = $row["marks"];
                  			$rank++;
                  		}
                  	?>
               <tbody id="myTable">
                  <tr>
                     <td><?=$row['contest']?></td>
                     <td><?=$row['date']?></td>
                     <td><?=$row["email"]?></td>
                     <td><?=$row["marks"]?></td>
                     <td>
                        <?=getRankImg($rank)?>		
                     </td>
                     <td><?=$rank ?></td>
                  </tr>
                  <?php
                     }
                    }
                    ?>
               </tbody>
            </table>
         </div>
      </div>
      <div class="fixed-action-btn ">
         <a class="btn-floating btn-large green">
         <i class="large material-icons">mode_edit</i>
         </a>
         <ul>
            <li><a href="/chartjs/bargraph.php?contest_id=<?=$contest_id;?>" class="btn-floating orange"><i class="material-icons">insert_chart</i></a>graph</li>
         </ul>
      </div>
      <center style=" bottom: 10px;">
      <a href="view_result.php" ><button style='background-image:linear-gradient(#f2709c,#ff9472);' type="button" class="btn btn-link">BACK</button></a>
      <centeR>
   </body>
</html>