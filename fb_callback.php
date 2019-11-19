<?php
require_once 'config_fb.php';
	try
	{ 
		$accessToken=$helper->getAccessToken();
		 
		if(isset($accessToken))
		{
			$_SESSION['accessToken']=(string)$accessToken;
		}
	}catch(Exception $e)
	{
		echo "response exception".$e->getTraceAsString();
		exit();
	}
	
	 
	 if(!$accessToken)
	 {
		 header('location:index');
		 exit();
	 }
	 else
		 
	{
	$FB->setDefaultAccessToken($_SESSION['accessToken']);
	
	  $response=$FB->get('/me?fields=id,name,last_name,email,picture');
		$userData=$response->getGraphNode()->asArray();
		//$_SESSION['userdata']=$user;
		$_SESSION['accessToken']=(string)$accessToken;
		 
		$_SESSION['id']=$userData['id'];
		$_SESSION['email']=$userData['email'];
		$_SESSION['picture']=$userData['picture']['url'];
		$_SESSION['givenName']=$userData['name'];
		
		header('location:newmain');	  
	}
	  
?>
