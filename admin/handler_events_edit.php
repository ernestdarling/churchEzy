<?php
include("includes/top.php");
//Get Input
$event_title = mysql_real_escape_string($_POST['txtTitle']);
$event_content = mysql_real_escape_string($_POST['txtContent']);
$event_id = $_POST['txtID'];

$event_title = preg_replace("/<div>(.*?)<\/div>/", "$1", $event_title);
$event_content = preg_replace("/<div>(.*?)<\/div>/", "$1", $event_content);
//Check if Empty
if (empty($event_title) || empty($event_content)) {
	//Emoty Fields.. Redirect
	$URL = 'cms_events.php';
	header("Location:$URL");
}
else {
	//Not Empty
	//Insert into DB
	$event_updated = time();
	mysql_query("UPDATE events SET EventTitle = '$event_title' WHERE EventID = '$event_id'");
	mysql_query("UPDATE events SET EventContent = '$event_content' WHERE EventID = '$event_id'");
	mysql_query("UPDATE events SET EventModified = '$event_updated' WHERE EventID = '$event_id'");
	//Redirect with Success
	$URL = 'cms_events.php';
	header("Location:$URL");
}
?>