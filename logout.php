<?php
//initialize
session_start();

//clear the session 
$_SESSION = array();

//delete session
session_destroy();

//redirect
header("location:pupillogin.php");

exit;