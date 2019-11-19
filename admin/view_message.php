<?php
   require 'db1.php';
   $qry=mysqli_query($con,"SELECT * FROM feedback order by date desc");
   ?>
<html>
   <head>
      <title>INBOX</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
      <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body>
      <?php
         require_once 'header.php';
         ?>
      <div class="container" id="content">
         <div class="col-md-12">
            <div class="jumbotron">
               <h1 align="center">INBOX</h1>
            </div>
         </div>
      </div>
      <div class="container">
      <?php
         if(mysqli_num_rows($qry)==0)
         {
         echo "no record found";
         }
         else
         {
         ?>
      <div class='table-responsive'>
         <table class="table">
            <thead>
               <tr class="info">
                  <Th>DATE</th>
                  <th>EMAIL</th>
                 
                  <th>MESSAGES</TH>
                  <th>ACTION</th>
               </tr>
            </thead>
            <?php
               while($row=mysqli_fetch_array($qry))
               {?>
          
            <tbody>
               <tr id='info' >
                  <td><?=$row["date"]?></td>
                  <td id='email<?=$row['date']?>'><?=$row["email"]?></td>
                 
                  <td style='color:red'><?=$row["message"]?></td>
                  <td id='btn<?=$p['id'];?>'><button type="button" style='width:50px' name="edit" class="btn btn-primary" value="<?=$row['date'];?>" onclick='snd(this.value)' data-toggle="modal" data-target="#feedback" >
                     <i class="fa fa-paper-plane" aria-hidden="true"></i></button>&nbsp;&nbsp;&nbsp;
                     <button style='width:50px' name="del" class="btn btn-danger" value="<?=$row['date'];?>" onclick="del(this.value)">
                     <i class="fa fa-trash-o"></i></button>
                  </td>
                  <?php
                     }
                     ?>
               </tr>
            </tbody>
            <?php
               }
               
               ?>
            </tbody>
         </table>
      </div>
      <div class="modal fade " id="feedback" role="dialog">
           <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header"  style='background-image:linear-gradient(#f2709c,#ff9472);'>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <centeR>
                     <h5 class="modal-title">FEED BACK</h5>
                  </center>
               </div>
               <div class="modal-body">
                 
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>FROM:</label>
                           <input type="hidden" id="emailform" type="text" name="emailform" value="zotak007@gmail.com">
                           <input disabled id="emailform" type="text" name="emailform"  class="form-control"  autocomplete='off' value="zotak007@gmail.com">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>TO:</label>
                           <input type="hidden" id="emailto1" type="text" name="emailto1">
                           <input disabled id="emailto" type="text" name="email"  class="form-control"  autocomplete='off'>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>MESSAGES:</label>
                           <textarea rows=3 cols=50 id="msg" type="text" name="msg"  class="form-control"  autocomplete='off'></textarea>
                        </div>
                     </div>
                  </div>
                  <div id="result3" style="color:red" align="centeR"></div>
               </div>
               <Br>
               <div class="modal-footer" style=' color:white'>
                  <center><button  style='background-image:linear-gradient(#f2709c,#ff9472);color:black'  name="send" id="send" onclick="sendmail()" class="btn btn-primary">SEND <span class="glyphicon glyphicon-send"> </span></button></center>
               </div>
            </div>
         </div>
      </div>
      <script>
         function snd(date)
         {
			//alert(date);		
			var email=document.getElementById("email"+date).innerHTML;
         	//alert(email);
			$("#emailto").val(email);
         }
         function del(date)
         {
        
         alert(date);	
         
         }
         function sendmail()
         {
         	
         	document.getElementById("result3").value="";	
         	var emailform=document.getElementById("emailform").value;	
         	var emailto=document.getElementById("emailto").value;	
         	
         	var msg=document.getElementById("msg").value;
         		if(msg=="")
         		{
         		alert("body is blank");
         		}
         		else
         		{
         			document.getElementById("send").disabled=true;
         			document.getElementById("send").innerHTML ="SENDING <span class='glyphicon glyphicon-send'> </span>";
         	//alert(emailform);
         	//alert(emailto);
         	//alert(msg);
         				$.ajax({  
                                    
                                     method:"POST",  
                                     data: {emailform:emailform,emailto:emailto,msg:msg}, 
         						url:"phpmailer/mail.php",  					 
                                     success:function(result) 
         						 { 
                 				 console.log(result);
         					 if(result == 0 ) { 
                                          
                                          $("#result3").append("<br> Email failed check network ");
                 							document.getElementById("send").innerHTML ="SEND <span class='glyphicon glyphicon-send'> </span>";	
         							document.getElementById("send").disabled=false;		
                                          } 
         					if(result==1)
         					{
         						//document.getElementById("btn"+date).disabled = true;
         						
									$("#result3").append("<br>Email sent successfully!");
         							document.getElementById("send").innerHTML ="SEND <span class='glyphicon glyphicon-send'> </span>";	
         							document.getElementById("send").disabled=false;								
         					}
         						 }
                                });  
         		}
         }
      </script>
   </body>
</html>