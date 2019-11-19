//password recovery last phase-----------------------------//
		function updatepass()
		{
			
			 	document.getElementById("result4").innerHTML="";
			    var newpass = $('#newpass').val();  
				 var cpass = $('#newcpass').val();
				 
					
					 if(newcpass=="" || cpass=="")
					{
						alert("both filed requires");
						return false;
					}
					else if(newcpass.length<6 || newpass.length<6)
					{
					alert("password length minimun 6");
						return false;
					}
					else if(newpass!=cpass)
					{
						   $("#result4").append("<br><b><span class='glyphicon glyphicon-warning-sign'> Password not Matched </b>");
					}
					else
					{
						 $.ajax({  
                            
                             method:"POST",  
                             data: {cpass:cpass,status:10}, 
							url:"order_detail_ajax.php",  					 
                             success:function(result) 
							 { 
         				 console.log(result);
								 if(result==1)
								 {
								  swal("SUCCESS!", "PASSWORD UPDATEED", "success")
								   $("#pwrecovery").modal('hide');
								 }
							 }
                        });  
					}
				
		}
		//password recovery last phase-----------------------------//
		//CHECKING OTP USING AJAX-----------------------------------------------------------------------------------//
		 function checkotp()
		 {
			 	document.getElementById("result3").innerHTML="";
			    var otp = $('#otppp').val();  
			if(otp=="")
			{
			alert("enter otp");	
			}
			else
			{
				   $.ajax({  
                            
                             method:"POST",  
                             data: {otp:otp,status:9}, 
							url:"order_detail_ajax.php",  					 
                             success:function(result) 
							 { 
         				 console.log(result);
						 if(result == 0 ) { 
                                  
                                  $("#result3").append("<br><b><span class='glyphicon glyphicon-warning-sign'> Wrong OTP check Your Email </b>");
         							
                                  }  
         					else if(result == 1)
							{
         					 $("#otp").modal('hide');
							    $("#pwrecovery").modal('show');
         					}
							 }
                        });  
			}   
		 }
		 //CHECKING OTP USING AJAX-----------------------------------------------------------------------------------//
		 
		  //FORGET PASSWORD 1ST PHASE USING AJAX-----------------------------------------------------------------------------------//
		function forgetotp()
		{
                   var email = $('#femail').val();  
                   var contact= $('#fphn').val();  
         	   
         	document.getElementById("result2").innerHTML="";
         	
         	   if(email=="" || contact=="")
         	   {
         		  alert("all fields required");
         		  return false;
         	   }
			   else
			   {
				 document.getElementById("prcd").disabled = true;
				document.getElementById("prcd").innerHTML ="PROCESSING <span class='glyphicon glyphicon-refresh glyphicon-refresh-animate'>";
                  $.ajax({  
                            
                             method:"POST",  
                             data: {email:email, contact:contact,status:8}, 
         				url:"order_detail_ajax.php",  					 
                             success:function(result) 
							 { 
         				 console.log(result);
						 if(result == 0 ) { 
                                  
                                  $("#result2").append("<br><b><span class='glyphicon glyphicon-warning-sign'> Wrong Email or Contact </b>");
         							 document.getElementById("prcd").disabled = false;
									document.getElementById("prcd").innerHTML ="PROCEED";
                                  }  
         					else if(result == 1){
         					  $("#otp").modal('show');
							    $("#forget").modal('hide');
         					}
							else if(result==2)
							{
								$("#result2").append("<br><b><span class='glyphicon glyphicon-warning-sign'> check network otp can not be send</b>");
								 document.getElementById("prcd").disabled = false;
									document.getElementById("prcd").innerHTML ="PROCEED";
							}
							 }
                        });  
			   }
         }
		  //FORGET PASSWORD 1ST PHASE USING AJAX-----------------------------------------------------------------------------------//
		  //signup
		   $(function(e){
         
         			$("#myform").on('submit',function (e)
         			{
         			document.getElementById("success").innerHTML="";	
         			var name=$("#name").val();
         			var password= $("#password").val();
         			var email= $("#email").val();
         			var contact= $("#contact").val();
         			var add=$("#add").val();
         		 
              
          if(name=="")	  
           {
            alert("insert name");
            return false;
         
           }
         
           else if(password==""||password.length<6)
           {
           alert("password length should be minimun 6");
           return false;
           }
             
           else  if(!email.match(/^[a-z0-9._-]+@[a-z0-9]+\.[a-z]{3}$/))
           {
           
           alert("invalid email format");
           return false;
           }
           else if(contact==""|| contact.length!=10)
           {
           	alert("contact should be 10 digit");
           	return false;
           }
         
           
          else if(add="")
          {
            alert("fill adress");
            return false;
         }
         else if(document.getElementById("eexist").innerHTML !="")	
         {
         alert("Email already exist plzz try alternative");
         return false;
         }
         else if(document.getElementById("uexist").innerHTML !="")
         {
         alert("username already exist plzz try alternative");
         return false;
         }
         else
         {
         
          document.getElementById("send").disabled = true;
          document.getElementById("send").innerHTML ="PROCESSING <span class='glyphicon glyphicon-refresh glyphicon-refresh-animate'>";
         
         
         
         			var formData = new FormData(this);
         				formData.append('status', 3);
         			document.getElementById("success").innerHTML="";
         			e.preventDefault();
                        $.ajax
         				(
         				{
         				type:"POST",
         				data:formData,
         				url: "order_detail_ajax.php",
         				contentType:false,
         				cache:false,
         				processData:false,
         				
         				success: function(result){
         				  console.log(result);
         				$("#success").append("<center style='color:white;font-size:15px'>"+result+"</centeR>");
						if(result==1)
						{
							swal("SUCCESS!", "SUCCESSFULLY REGISTERED", "success")
							$("#sign").modal('hide');
							  document.getElementById("send").disabled = false;
							document.getElementById("send").innerHTML ="SAVE";
							$("#name").val('');
							$("#password").val('');
							$("#email").val('');
							 $("#contact").val('');
							$("#add").val('');
         		 
						}
							else if(result==2)
							{
							swal("Cancelled", "Check your Network connection!!", "error");
							 document.getElementById("send").disabled = false;
							document.getElementById("send").innerHTML ="SAVE";
							}
							else if(result==3)
							{
							swal("warning", "ERROR PLZZ TRY AGAIN!!", "error");	
							 document.getElementById("send").disabled = false;
							document.getElementById("send").innerHTML ="SAVE";
							}
         				 
                        }
                 });
         }
                    });
         		
                 });
         	//submit all sign up form------------------------------------//
			
			 function res()
         		{
         		document.getElementById("success").innerHTML="";
         		  document.getElementById("send").disabled = false;
         		  document.getElementById("uexist").innerHTML="";
         		  document.getElementById("eexist").innerHTML="";
         		}
         		function clr()
         		{
         		
         		document.getElementById("result").innerHTML="";
				document.getElementById("result2").innerHTML="";
				document.getElementById("result3").innerHTML="";
				document.getElementById("result4").innerHTML="";
         		$("#eml").val('');
         		$("#pass").val('');
				$("#femail").val('');
         		$("#fphn").val('');
         		$("#otppp").val('');
				$("#newpass").val('');
				$("#newcpass").val('');
         		}
         		
         function xyz()//check session is set or not
         {
			 
         	 $.ajax
         					(
         					{
         					type:"POST",
         					url: "order_detail_ajax.php",
         					data: {status:5}, 
         					 success:function(result)   { 
         					 console.log(result);
         						 if(result == 1 ) {                       
                                 window.location='product.php';
         								
                                   }  
         						
                              }  
                         });  
         }
		 
		 //check email and password for login---------------------//
         $(document).ready(function(){  
              $('#login').click(function(){  
                   var email = $('#eml').val();  
                   var password = $('#pass').val();  
         	   
         	document.getElementById("result").innerHTML="";
         	
         	   if(email=="" || password=="")
         	   {
         		  alert("all fields required");
         		  return false;
         	   }
         	  
                   // alert(username);
         		//alert(password);
                        $.ajax({  
                            
                             method:"POST",  
                             data: {email:email, password:password,status:4}, 
         				url:"order_detail_ajax.php",  					 
                             success:function(result)   { 
         				 console.log(result);
              					 if(result == 0 ) { 
                                  
                                  $("#result").append("<b><span class='glyphicon glyphicon-warning-sign'> Wrong Email or password </b>");
         							
                                  }  
         					else if(result == 1){
         					 window.location='product.php';
         					}
                             }  
                        });  
                  
              });  
              
         });  
		 function call()
         {
			 //checking uname exist
         document.getElementById("uexist").innerHTML="";
          var name=$("#name").val();
       
		 if(name == "")
		 {
		 }
		 else
		 {
          $.ajax
         				(
         				{
         				type:"POST",
         				url: "order_detail_ajax.php",
         				data: {status:6,name:name}, 
         				 success:function(result)   { 
         				 console.log(result);
                             
         				if(result==0)
         				{
         					 $("#uexist").append("<centeR style='color:red'> *username already exist</centeR>");
							 document.getElementById("name").style.border="2px solid red";
                        }
						else if(result==1)
						{
							 document.getElementById("name").style.border="2px solid green";
						}
         				 }					 
                        });  
		 }
         }
		 
         function call1()
         {
			 //checking email exits
         document.getElementById("eexist").innerHTML="";
          var email=$("#email").val();
          if(email == "")
		  {
		  }
		  else
		  {
          $.ajax
         				(
         				{
         				type:"POST",
         				url: "order_detail_ajax.php",
         				data: {status:7,email:email}, 
         				 success:function(result)   { 
         				 console.log(result);
                             
         				if(result==0)
         				{
         					 $("#eexist").append("<centeR style='color:red'>* Email already exist</centeR>");
							  document.getElementById("email").style.border="2px solid red";
                             }
							 else
							 {
								  document.getElementById("email").style.border="2px solid green";
							 }
         				 }					 
                        });  
		  }
         }