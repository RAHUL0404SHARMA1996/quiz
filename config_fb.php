<?php
	session_start();
	require_once 'Facebook/autoload.php';
	$FB= new \Facebook\Facebook([
	'app_id' => '391049311743781',
	'app_secret' => '25f045057e6b01ef1776f1ccf664aa86',
	'default_graph_version' => 'v2.10',
	]);
	$helper=$FB->getRedirectLoginHelper();
	$loginURL=$helper->getLoginUrl("http://localhost/quiz/fb_callback.php");
	echo $loginURL;

?> 