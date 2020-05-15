<?php
//Declare Variables
$hostname = 'localhost';
$username = 'churchezi';
$password = 'Darling2202';
$database = 'churchezi';
//Connect to MySQL Server
$conn = mysql_connect($hostname, $username, $password);
//Select Database
mysql_select_db($database, $conn);
?>