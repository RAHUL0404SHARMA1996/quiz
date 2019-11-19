<?php
   @require('db1.php');
   $msg="C-PANEL";
   ?>
<nav class="navbar navbar-inverse navbar-fixed-top" style='background-image:linear-gradient(#f2709c,#ff9472);'>
   <div class="container-fluid">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>                        
         </button>           
         <img style="float:left" src="2.jpg" height="50px" width="50px">
         <a class="navbar-brand" href="admin.php" style='color:black'>QzBz</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
         <ul class="nav navbar-nav" >
            <li ><a href="add_subject" style='color:black' >CREATE QUIZ</a></li>
            <li><a href="add_question" style='color:black' >INSERT QUESTION</a></li>
            <li><a href="update_question" style='color:black' >UPDATE QUESTION</a></li>
            <li><a href="delete" style='color:black' >DELETE QUESTION</a></li>
            <li><a href="view_message" style='color:black'>INBOX </a> </li>
         </ul>
      </div>
   </div>
</nav>