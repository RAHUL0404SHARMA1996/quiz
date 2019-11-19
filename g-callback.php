<?php
require_once 'config.php';


 if(isset($_GET['code']))
{
	$token=$gClient->fetchAccessTokenWithAuthCode($_GET['code']);
	$_SESSION['access_token']=$token;
}
else
{
header('location:index.php');
exit();	
}
$oAuth=new Google_Service_Oauth2($gClient);
$userData=$oAuth->userinfo_v2_me->get();
//echo "<pre>";
//var_dump($userData);
$_SESSION['id']=$userData['id'];
$_SESSION['email']=$userData['email'];
$_SESSION['picture']=$userData['picture'];
$_SESSION['givenName']=$userData['givenName'];

header('location:newmain');
exit();
?>
