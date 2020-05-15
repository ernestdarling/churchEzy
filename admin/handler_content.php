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
	if ($ref == 'email_prayer') {
		//Get New Email
		$new_content = $_POST['txtContent'];
		//Update DB
		mysql_query("UPDATE church SET ChurchPrayerEmail = '$new_content' WHERE ChurchID='$admin_church'");
		//Redirect to Prayer Section
		$URL = 'cms_prayer.php?success';
		header("Location:$URL");
	}
	if ($ref == 'email_contact') {
		//Get New Email
		$new_content = $_POST['txtContent'];
		//Update DB
		mysql_query("UPDATE church SET ChurchEmail = '$new_content' WHERE ChurchID='$admin_church'");
		//Redirect to Prayer Section
		$URL = 'cms_contact.php?success';
		header("Location:$URL");
	}
	if ($ref == 'telephone') {
		//Get New Email
		$new_content = $_POST['txtContent'];
		//Update DB
		mysql_query("UPDATE church SET ChurchTelephone = '$new_content' WHERE ChurchID='$admin_church'");
		//Redirect to Prayer Section
		$URL = 'cms_contact.php?success';
		header("Location:$URL");
	}
	if ($ref == 'website') {
		//Get New Email
		$new_content = $_POST['txtContent'];
		//Update DB
		mysql_query("UPDATE church SET ChurchWebsite = '$new_content' WHERE ChurchID='$admin_church'");
		//Redirect to Prayer Section
		$URL = 'cms_contact.php?success';
		header("Location:$URL");
	}
	if ($ref == 'email_admin') {
		//Get New Email
		$new_content = $_POST['txtContent'];
		//Update DB
		mysql_query("UPDATE church SET ChurchEmail = '$new_content' WHERE ChurchID='$admin_church'");
		//Redirect to Prayer Section
		$URL = 'cms_contact.php?success';
		header("Location:$URL");
	}
	if ($ref == 'map') {
		//Get New Email
		$new_content = $_POST['txtContent'];
		//Update DB
		mysql_query("UPDATE church SET ChurchMapEmbed = '$new_content' WHERE ChurchID='$admin_church'");
		//Redirect to Prayer Section
		$URL = 'cms_contact.php?success';
		header("Location:$URL");
	}
	if ($ref == 'content_giving') {
		//Get New Email
		$new_content = $_POST['txtContent'];
		//Update DB
		mysql_query("UPDATE content SET ContentDescription = '$new_content' WHERE ContentChurch='$admin_church' && ContentType='donate_content'");
		//Redirect to Prayer Section
		$URL = 'cms_giving.php?success';
		header("Location:$URL");
	}
	if ($ref == 'content_about') {
		//Get New Email
		$new_content = $_POST['txtContent'];
		//Update DB
		mysql_query("UPDATE content SET ContentDescription = '$new_content' WHERE ContentChurch='$admin_church' && ContentType='about_content'");
		//Redirect to Prayer Section
		$URL = 'cms_about.php?success';
		header("Location:$URL");
	}
}
?>