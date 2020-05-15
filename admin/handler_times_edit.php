<?php
include("includes/top.php");
//Get Input
$time_title = mysql_real_escape_string($_POST['txtTitle']);
$time_content = mysql_real_escape_string($_POST['txtContent']);
$time_id = $_POST['txtID'];

$time_title = preg_replace("/<div>(.*?)<\/div>/", "$1", $time_title);
$time_content = preg_replace("/<div>(.*?)<\/div>/", "$1", $time_content);
//Check if Empty
if (empty($time_title) || empty($time_content)) {
	//Emoty Fields.. Redirect
	$URL = 'cms_times.php';
	header("Location:$URL");
}
else {
	//Not Empty
	//Insert into DB
	$time_modified = time();
	mysql_query("UPDATE times SET TimeTitle = '$time_title' WHERE TimeID = '$time_id'");
	mysql_query("UPDATE times SET TimeContent = '$time_content' WHERE TimeID = '$time_id'");
	mysql_query("UPDATE times SET TimeModified = '$time_modified' WHERE TimeID = '$time_id'");
	//Redirect with Success
	$URL = 'cms_times.php';
	header("Location:$URL");
}
?>