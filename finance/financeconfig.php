<?php
$hostname="localhost";
$username="root";
$password="";
$database="kalgates";

$link = mysqli_connect($hostname, $username, $password, $database);

if(!$link){
Echo "Db connection error".mysqli_connect_error();
}
