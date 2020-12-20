<?php
//echo 'db file called'; 
$host="localhost";
$user="root";
$pass="Srishti@123";
$db="task";
$con = mysqli_connect($host,$user,$pass,$db) or die("DB Server is down");
mysqli_select_db($con,$db)or die("DB not available");
?>