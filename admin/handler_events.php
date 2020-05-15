<?php
include("includes/top.php");
//Get Input
$event_title = mysql_real_escape_string($_POST['txtTitle']);
$event_content = mysql_real_escape_string($_POST['txtContent']);

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
	$event_added = time();
	mysql_query("INSERT INTO events (EventChurch, EventTitle, EventContent, EventAdded) VALUES ('$admin_church', '$event_title', '$event_content', '$event_added')");
	//Redirect with Success
	$URL = 'cms_events.php';
	header("Location:$URL");
}
?>