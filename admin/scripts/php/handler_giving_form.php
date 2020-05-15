<?php
//Check if Form is Submitted
if (!isset($_POST['txtForm'])) {
	//Form Not Set... Redirect
	$error = 'Oops! There was a problem with your request. Please try again!';
	$URL = '../../cms_giving.php?error='.$error.'';
	header("Location:$URL");
}
else {
	//Form Set... Continue
	//Get Form Data
	$content = $_POST['txtForm'];
	$church = $_COOKIE['ChurchEziAdminChurch'];
	//Check if Form is Not Empty
	if (empty($content)) {
		//Redriect
		$error = 'Oops! Your form is empty. Please try again!';
		$URL = '../../cms_giving.php?error='.$error.'';
		header("Location:$URL");
	}
	else {
		//Form was filled... Proceed
		//Connect DB
		include_once('db.php');
		//Update DB
		mysql_query("UPDATE content SET ContentDescription = '$content' WHERE ContentChurch = '$church' AND ContentType = 'form'");
		//Redirect with Success Note
		$success = 'Database was successfully updated!';
		$URL = '../../cms_giving.php?error='.$success.'';
		header("Location");
	}
}
?>