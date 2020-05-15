<?php
//Declare Variables
$hostname = 'localhost';
$username = 'sketchventures';
$password = 'Darling2202';
$database = 'churchezy_app';
//Connect to MySQL Server
$conn = mysql_connect($hostname, $username, $password);
//Select Database
mysql_select_db($database, $conn);
?>