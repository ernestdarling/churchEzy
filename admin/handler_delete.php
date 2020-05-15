<?php
include("includes/top.php");
//Check From Which Form this Request is Coming From
if (!isset($_GET['ref'])) {
	//Form Not From Any Location
	//Redirect with Error Message
	$URL = './';
	header("Location:$URL");
}
else {
	//Form is From A Source
	$ref = $_GET['ref'];
	//Delete Announcement
	if ($ref == 'events') {
		//Deleting an Event
		//Get Event ID
		$event_id = $_GET['id'];
		//Initiate Delete
		mysql_query("DELETE FROM events WHERE EventID = '$event_id'");
		//Redirect
		$URL = 'cms_events.php';
		header("Location:$URL");
	}
	//Delete Service Times
	if ($ref == 'times') {
		//Deleting an Event
		//Get Event ID
		$time_id = $_GET['id'];
		//Initiate Delete
		mysql_query("DELETE FROM times WHERE TimeID = '$time_id'");
		//Redirect
		$URL = 'cms_times.php';
		header("Location:$URL");
	}
	//Delete Slide
	if ($ref == 'slide') {
		//Get Slide ID
		$slide_id = $_GET['id'];
		//Use Slide ID to Get Slide URL
		$query_slide = mysql_query("SELECT * FROM slides WHERE SlideID = '$slide_id'");
		while ($row_slide = mysql_fetch_array($query_slide, MYSQL_ASSOC)) {
			$slide_link = $row_slide['SlideLink'];
		}
		//Delete File from Server Using Slide Link
		$unlink = '../cdn/'.substr($slide_link, 25);
		unlink($unlink);
		//Remove from DB
		mysql_query("DELETE FROM slides WHERE SlideID = '$slide_id'");
		//Redirect to CMS Home
		$URL = 'cms_home.php';
		header("Location:$URL");
	}
}
?>