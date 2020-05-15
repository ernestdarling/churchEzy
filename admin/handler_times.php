<?php
include("includes/top.php");
//Get Input
$time_title = mysql_real_escape_string($_POST['txtTitle']);
$time_content = mysql_real_escape_string($_POST['txtContent']);

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
	$time_added = time();
	mysql_query("INSERT INTO times (TimeChurch, TimeTitle, TimeContent, TimeAdded) VALUES ('$admin_church', '$time_title', '$time_content', '$time_added')");
	//Redirect with Success
	$URL = 'cms_times.php';
	header("Location:$URL");
}
?>