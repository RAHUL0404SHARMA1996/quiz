<!DOCTYPE html >
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>ADD QUESTION</title>
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
         #a
         {
         margin-left:30%;	
         }
         @media screen and (max-width: 600px) {
         #a
         {
         margin:auto;
         }}
      </style>
   </head>
   <body>
      <?php
         require_once 'header.php';
         ?>
      <div class="container" >
         <div class="jumbotron">
            <CenteR>
               <h1>INSERT</h1>
            </centeR>
         </div>
         <div id='a'>
            <div class="row">
               <div class="col-md-8 col-xs-12">
                  <label>SUBJECT</label>
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
            </div>
            <br>
            <div class="row">
               <div class="col-md-8 col-xs-12">
                  <div class='table-responsive'>
                     <table class="table table-bordered">
                        <tr>
                           <td><input  type="text" class="form-control"  id="question" name="question"></TD>
                           <th>QUESTION</Th>
                        </TR>
                        <TR>
                           <TD><input  type="text"  id="opt1" class = "form-control" name="opt1">
                           </TD>
                           <Th>OPT1</Th>
                        </TR>
                        <TR>
                           <TD><input  type="text" id="opt2" class = "form-control" name="opt2">
                           </TD>
                           <th>OPT2</Th>
                        </TR>
                        <TR>
                           <TD><input  type="text" id="opt3" class = "form-control" name="opt3">
                           </TD>
                           <Th>OPT3</Th>
                        </TR>
                        <TR>
                           <TD>	<input  type="text" id="opt4" class = "form-control" name="opt4">
                           </TD>
                           <Th>OPT4</Th>
                        </TR>
                        <TR>
                           <TD>
                              <label>CORRECT</label>
                              <select class = "form-control" name="correct" id="correct">
                                 <option value = "" disabled selected>CHOOSE ONE</option>
                                 <option>a</option>
                                 <option>b</option>
                                 <option>c</option>
                                 <option>d</option>
                              </select>
                           </TD>
                           <Th>CORRECT</Th>
                        </TR>
                        <Tr >
                           <TD colspan="2">
                              <Center><button style='background-image:linear-gradient(#f2709c,#ff9472);'  onclick="insert()" class="btn btn-deffault" name="send">INSERT  <span class="glyphicon glyphicon-chevron-right"></span>
                                 </button>
                              </centeR>
                           </TD>
                        </TR>
                     </table>
                  </div>
               </div>
            </div>
            <div id="toast">
               <div id="img">MSG</div>
               <div id="desc">QUESTION INSERTED!</div>
            </div>
         </div>
      </div>
      <script>
         function insert()
         	{
         	var datatable =  document.getElementById("datatable").value; 
         	var question =  $('#question').val();  
         	var opt1 =  $('#opt1').val();  
         	var opt2 =  $('#opt2').val();  
         	var opt3 = $('#opt3').val();  
         	var opt4 =  $('#opt4').val();  
         	var correct =  document.getElementById("correct").value; 
         
         
         	if (datatable == "") {
         	alert("select dataset");
         	return false;
         	}
         
         	else if (question == "") {
         	alert("plzz insert question");
         	return false;
         	}
         
         	else  if (opt1 == "") {
         	alert("option 1 is blank");
         	return false;
         	}
         
         	else if (opt2 == "") {
         	alert("option 2 is blank");
         	return false;
         	}
         
         	else if (opt3 == "") {
         	alert("option 3 is blank");
         	return false;
         	}
         
         	else if (opt4 == "") {
         	alert("option 4 is blank");
         	return false;
         	}
         
         	else if (correct == "") {
         	alert("choose correct");
         	return false;
         	}
         	else
         	{
         	$.ajax
         	(
         	{
         	type:"POST",
         	data:{datatable:datatable,question:question,opt1:opt1,opt2:opt2,opt3:opt3,opt4:opt4,correct:correct,status:1},
         	url: "add_success.php",
         	success: function(result){
         	console.log(result);
         	if(result==1)
         	{
         	//alert("question added successfully");
         	var x = document.getElementById("toast")
         	x.className = "show";
         	setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
         	$('#question').val('');  
         	$('#opt1').val('');  
         	$('#opt2').val('');  
         	$('#opt3').val('');  
         	$('#opt4').val('');  
         	$('#correct').val('');  
         	}
         	}
         	});
         	}
         	}
         		 
      </script>				
   </body>
</html>