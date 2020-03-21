<?php 

session_start();

require_once "GoogleAPI/vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("381758014863-v83v3vg59nbrlkio44mmpf4s2temhh5a.apps.googleusercontent.com");
$gClient->setClientSecret("FTR4oAe0T0DaId0OUqFkQ2KY");
$gClient->setApplicationName("Dennis Site!");
$gClient->setRedirectUri("http://localhost/MYSQLDB/AJAX/google/g-callback.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

?>