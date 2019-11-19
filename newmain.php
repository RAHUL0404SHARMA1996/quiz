<?php
session_start();

@require('db.php');
 $email=$_SESSION['email'];
 if(!isset($_SESSION['email']))
 {
	 header('location:index');
 }

mysqli_query($con,"DELETE from temp_data WHERE email='$email'");


	$qry=$con->query("select * from quiz_master where date<='". date("Y-m-d")."'");
	while($row1=$qry->fetch_assoc())
	{
	$sub[]=$row1;	
	}
	

?>
<!DOCTYPE html>
<html>
	<head>
	<title>MAIN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	
		body {
		font-family: "Lato", sans-serif;
		transition: background-color s;
		background:url('images/10.jpeg') ;
		background-size:cover;

		}

		.sidenav {
		height: 100%;
		width: 0;
		position: fixed;
		z-index: 1;
		top: 0;
		left: 0;
		background-color: #111;
		overflow-x: hidden;
		transition: 0.5s;
		padding-top: 60px;

		}

		.sidenav a {
		padding: 8px 8px 8px 32px;
		text-decoration: none;
		font-size: 20px;
		color: #818181;
		display: block;
		transition: 0.3s;
		}

		.sidenav a:hover {
		color: #f1f1f1;
		}

		.sidenav .closebtn {
		position: absolute;
		top: 0;
		right: 25px;
		font-size: 36px;
		margin-left: 50px;
		}

		#main {
		transition: margin-left .5s;
		padding: 16px;


		}

		@media screen and (max-height: 450px) {
		.sidenav {padding-top: 15px;}
		.sidenav a {font-size: 18px;}
		
		}
		img.avatar {
		width: 30%;
		border-radius: 50%;
		}
		.imgcontainer {
		text-align: center;
		margin: 24px 0 12px 0;
		}
	
		
	</style>

	<script>
		function openNav() {
			document.getElementById("mySidenav").style.width = "280px";
			document.getElementById("main").style.marginLeft = "280px";
			document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
			document.getElementById("main").style.webkitFilter = "blur(3px)";
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
			document.getElementById("main").style.marginLeft= "0";
			document.body.style.backgroundColor = "white";
			document.getElementById("main").style.webkitFilter = "blur(0px)";
		}
	</script>
	<script src="js/wow.min.js"></script>
      <script>
         new WOW().init();
      </script>
</head>
<body>

	<div id="mySidenav" class="sidenav" style='background-image:linear-gradient(#f2709c,#ff9472);'>
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<div class="imgcontainer">
		<img src="<?=$_SESSION['picture'];?>" alt="images/human.jpg" class="avatar">
		</div>
		<?php

		date_default_timezone_set('Asia/Calcutta');
		$Hour = date('G');
		if ( $Hour >= 5 && $Hour <= 12 )
		{
		echo "<p><center style=color:black>Good Morning</center></p>";
		} 
		else if ( $Hour > 12 && $Hour <= 17 ) 
		{
		echo "<p><center  style=color:black>Good Afternoon </center></p>";
		}
		else if ( $Hour >17 || $Hour <= 4 ) 
		{
		echo "<p><center style=color:black>Good Evening</center></p>";
		}
		echo "<p><center  style=color:black>Hi ".$_SESSION['givenName']."</center></p>";
		?>

		<hr style=" border: 2px solid black;">
		<a href = "view_result" style='color:black;'> <span class="glyphicon glyphicon-list-alt"> RESULT</a></span>

		

		<a href="#" onclick="closeNav()" data-toggle="modal" data-target="#contact" style='color:black;'><span class="glyphicon glyphicon-earphone"> CONTACT</a></span>
		<a href="#" style='color:black;'><span class="	glyphicon glyphicon-bell"> NOTIFICATION</a></span>
		<a href="#" style='color:black;'><span class="glyphicon glyphicon-book"> ABOUT</a></span>
		<a href="#" onclick="exit()"  style='color:black;'><span class="glyphicon glyphicon-off"> LOGOUT</span></a>
	</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer;color:black" onclick="openNav()">&#9776; OPEN</span>
	<div class="container" style='margin-top:2%'>
	<div class="row">
	<?php
	if(mysqli_num_rows($qry)>0)
	{
	$t=.3;
	foreach($sub as $row)
	{
	?>
	<div class='wow fadeInUp' data-wow-delay="<?=$t;?>s">
	<div class="col-md-3 col-xs-12">
		<div class="panel panel-info" style="box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2)">
			<div class="panel-heading"><center style='font-size:30px;'><?=strtoupper($row['title'])?></center></div>
			<div class="panel-body"><img src='images/2.jpg' height="200px" width="100%"></div>
			<div class="panel-footer"><a> <button onclick="openWin(this.id,this.name)" id=<?=$row['id']?> name=<?=$row['dataset_id'];?>  class="btn btn-primary btn-block" >START <span class="glyphicon glyphicon-hand-right"></span></button></a></div>
		</div>
	</div>
	</div>
	<?php
	$t+=.1;
	}
	}
	?>
	</div>
	</div>
</div>

		<div class="modal fade" id="contact" role="dialog">
         <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
				<div class="modal-header" style='background-image:linear-gradient(#f2709c,#ff9472);'>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<centeR>
				<h5 class="modal-title" >Send Us A Message</h5>
				</center>
				</div>
           
			  <div class="modal-body">
				
				 <div class="row">
				 <div class="col-md-12 col-xs-12 form-group">
					  <span id='success'></span>
						
					</div>
					
					<div class="col-md-12 col-xs-12 form-group">
					   <div class="input-group">
						  <span class="input-group-addon"><i class="	glyphicon glyphicon-envelope"></i></span>
						  <input id="email" type="TEXT" class="form-control" name="email"  value='<?=$email?>' placeholder="Email" disabled>
						   <input id="email" type="hidden" class="form-control" name="email"  value='<?=$email?>' placeholder="Email" >
					   </div>
					  <input type='hidden' id='username' value="<?=$_SESSION['givenName']?>">
					</div>			
					<div class="col-md-12 col-xs-12 form-group">
					   <div class="input-group">
						  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						  <textarea  id="msg" rows="3" cols="50" type="text"   class="form-control" name="msg" autocomplete='off'  placeholder="Write msg here"></textarea>
					   </div>
					</div>
				 </div>
			  </div>
			  <div class="modal-footer" style=' color:white'>
				 <center><button style='background-image:linear-gradient(#f2709c,#ff9472);' onclick="send()" name="send" id="send"  class="btn btn-primary " >SEND</button></center>
			  </div>
               
            </div>
         </div>
      </div>
	  <div class="modal fade bd-example-modal-sm" id='instruction' tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>
     <script>
	function openWin(contest_id,dataset_id) 
	{
		//alert(str1 + str);
	//alert(pass);
				$.ajax({  

				method:"POST",  
				data: {contest_id:contest_id,dataset_id:dataset_id,status:2}, 
				url:"save_res.php",  					 
				success:function(result) 
				{ 
				console.log(result);
				if(result == 1 ) { 
				
					if(confirm("Read the instruction carefully! \n 1. do not close windows else you will be logged out.  \n 2. negetive marking is there."))
					{
						
						var url = "quiz?dataset_id="+dataset_id+"&contest_id="+contest_id;
					var OpenWindow=window.open(url,"_blank","toolbar=no, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=1500, height=1000");
					}
					else
					{
						return false;
					}

				//alert("read the instruction carefully!\n1. do not close windows else you will be logged out \n2. do not refresh page \n3. There is no negative marking ");
				

				} 
				else if(result == 2)
				{
				alert("wrong password !!");
				//window.location='logout_script';
				}
				else if(result==3)
				{
				alert("you are already in quizz you will be logged out !!");
				window.location='logout_script';
				}
				else if(result==4)
				{
				alert("you have already completed this quiz");
			
				}
				}
				});  
	}   
		 
		 
		 
	 function send()
	 {
		
		var email=$("#email").val();
		var user=$("#username").val();
		//alert(user);
		var msg=$("#msg").val();
		if(msg=="")
		{
		alert("write msg plzz");
		}
		else
		{
	
		//alert( contact + msg);
				$.ajax({  
                            
				method:"POST",  
				data: {email:email,user:user,msg:msg,status:"4"}, 
				url:"save_res.php",  					 
				success:function(result) 
				{ 
				console.log(result);
				if(result==1)
				{
				//alert("msg sent successfully!");
				document.getElementById("success").innerHTML=" <div class='alert alert-success alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>msg sent successfully! </div>"
				document.getElementById("msg").value="";
				}
				}
				});  
		}
	 }
	 </script>
	<script type="text/javascript">
	function exit()
		{
		swal({
		title: "Are you sure?",
		text: "Are you sure you want exit?",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "confirm",
		closeOnConfirm: false
	},
	function(){
	  window.location = 'logout_script.php';
	});
	}
	</script>
	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ce2a061d07d7e0c6394766e/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html> 
