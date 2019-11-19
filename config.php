<?php
session_start();

require_once 'google/vendor/autoload.php';

$gClient=new Google_Client();
$gClient->setClientId("135837608149-9lug9ki851gpo04u4fp043bkg3perjgp.apps.googleusercontent.com");
$gClient->setClientSecret("PvUPJ0uotyCuIKAWLrOeqLeK");
$gClient->setApplicationName("QUIZBUZZ");
$gClient->setRedirectUri("http://localhost/quiz/g-callback.php");
$gClient->addScope( "https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?> 