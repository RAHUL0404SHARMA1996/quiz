<?php
   @require('db1.php');
   //error_reporting(0);
   session_start(); 
   	
   	
   	if(isset($_POST['send']))
   	{
   	$email = $_POST['email']; 
   	$password = $_POST['password'];
   
   		$query = "SELECT * FROM admin WHERE email='" . $email . "' AND password='" . $password . "'";
   		$result = $con->query($query);
   		if( $result->num_rows==1)
   		{
   		//$_SESSION['email']=$email;
   		header('location:admin');
   		}
   		else  
   		$found="no";
   	}
   	
   	
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>LOGIN</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
      <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <style>
      .field-icon {
      float: right;
      margin-left: -25px;
      margin-top: -25px;
      position: relative;
      z-index: 2;
      }
      @media screen and (max-width: 600px) {
      body
      {
      margin-top:10%;
      }}
   </style>
   <body>
      <div class="container col-md-4" style="position: absolute;  right: 0; left: 0;margin-top:5%;border:3px solid pink;box-shadow:0 8px 10px 0 rgba(0, 0, 0, 0.5);transform: scale(.9);">
         <h1 style='text-align:centeR'>ADMIN LOG IN </h1>
         <hr>
         <form  method="post" name="myform">
            <div class="row">
               <div class="col-md-12 col-xs-12 form-group">
                  <div>
                     <label for="email">  Email*</label>
                     <input id="email" type="email" class="form-control" name="email" >
                  </div>
               </div>
               <div class="col-md-12 col-xs-12 form-group">
                  <label for="password"> Password</label>
                  <input id="password" type="password" class="form-control" name="password">
                  <span style='margin-right:5px' toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  <br>
                  don't have account?<a href='signup.php'> sign in</a> <span style='float:right'><a href='forget1.php'>forget password?</a></span>
               </div>
               <div class="col-md-12 col-xs-12 form-group">
                  <button class="btn btn-danger btn-block" name="send" type="submit">Login
                  </button>
               </div>
            </div>
            <br>
            <?php
               if(isset($found))
               {
               echo "<CenteR><span style='color:red;'  class='glyphicon glyphicon-warning-sign'> Invalid Email or Password</span></centeR>";
               }
               ?></span>
         </form>
      </div>
   </body>
   <script>
      $(".toggle-password").click(function() {
      
      $(this).toggleClass("fa-eye fa-eye-slash");
      var x = document.getElementById("password");
      if (x.type === "password") {
      x.type = "text";
      } else {
      x.type = "password";
      }
      });
   </script>
</html>