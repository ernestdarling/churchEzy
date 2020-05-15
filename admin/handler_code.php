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
	if ($ref == 'code_giving') {
		//Get New Email
		$new_content = $_POST['txtCode'];
		//Update DB
		mysql_query("UPDATE content SET ContentDescription = '$new_content' WHERE ContentChurch = '$admin_church' && ContentType = 'donate_form'");
		//Redirect to Prayer Section
		$URL = 'cms_giving.php?success';
		header("Location:$URL");
	}
}
?>