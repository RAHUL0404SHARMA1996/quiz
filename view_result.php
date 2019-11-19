<?php
   session_start();
   //error_reporting(0);
   @require('db.php');
   if(!isset($_SESSION['email']))
    {
   	 header('location:index');
    }
   $email=$_SESSION['email'];
   
   $qry=$con->query("SELECT * FROM result where email='$email' order by date desc");
   while($row=$qry->fetch_assoc())
   {
   	$items[]=$row;
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>RESULT</title>
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
   </head>
   <body>
      <div class="container-fluid">
         <div class="jumbotron" style='background-image:linear-gradient(#f2709c,#ff9472);'>
            <h5 align="center">RESULT-HISTORY</h5>
         </div>
      </div>
      <div class="container">
         <?php
            $j=1;
            if(mysqli_num_rows($qry)>0)
            {
            ?>
         <div class='table-responsive'>
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th>S.NO</th>
                     <th>DATE</th>
                     <th>CONTEST NAME</th>
                     <TH>MARKS</TH>
                     <th>RANK</th>
                  </tr>
               </thead>
               <?php
                  foreach($items as $row1)
                  {
                  ?>
               <tbody>
                  <tr>
                     <td><?=$j++; ?></td>
                     <td><?=$row1['date'];?></td>
                     <td><?=$row1['contest'];?></td>
                     <td><?=$row1['marks'];?></td>
                     <td><a href="rank?contest_id=<?=$row1['contest_id']?>">
                        <span class="glyphicon glyphicon-signal"></span>
                        </a>
                     </td>
                  </tr>
                  <?php
                     }
                     }
                     else
                     {
                     echo "<center><b>*YOU HAVE NO RECORD TO DISPLAY</B></centeR>";
                     }
                     ?>
               </tbody>
            </table>
         </div>
      </div>
      <center style=" bottom: 10px;">
      <a href="newmain" ><button type="button" style='background-image:linear-gradient(#f2709c,#ff9472);' class="btn btn-link">BACK</button></a>
      <centeR>
   </body>
</html>