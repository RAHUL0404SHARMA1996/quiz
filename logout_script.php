 <?php
require_once 'config.php';
 $gClient->revokeToken();
 unset($_SESSION['access_token']);
 unset($_SESSION['accessToken']);
session_destroy();
header('location: index');
exit();
?>