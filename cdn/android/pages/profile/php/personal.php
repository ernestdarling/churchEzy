<?php
    // variables start
	$name = "";
	$email = "";
	$message = "";
	
	
	//$name =  trim($_POST['contactNameField']);
	//$email =  trim($_POST['contactEmailField']);
	//$message =  trim($_POST['contactMessageTextarea']);
	
	$member_id = $_COOKIE['MemberID'];
	$member_fname = trim($_POST['contactFirstNameField']);
	$member_lname = trim($_POST['contactLastNameField']);
	$member_dob = trim($_POST['contactDOBField']);
	$member_gender = $_POST['contactGenderField'];
	
	//Connect DB
	include_once("../../../../common/db.php");
	
	//Update DB
	mysql_query("UPDATE members SET MemberFirstName = '$member_fname' WHERE MemberID = '$member_id'");
	mysql_query("UPDATE members SET MemberLastName = '$member_lname' WHERE MemberID = '$member_id'");
	mysql_query("UPDATE members SET MemberDOB = '$member_dob' WHERE MemberID = '$member_id'");
	mysql_query("UPDATE members SET MemberGender = '$member_gender' WHERE MemberID = '$member_id'");
	
	// variables end
	
	/*
	// email address starts
	$emailAddress = 'name@domain.com';
	// email address ends
	
	$subject = "Message From: $name";	
	$message = "<strong>From:</strong> $name <br/><br/> <strong>Message:</strong> $message";
	
	$headers .= 'From: '. $name . '<' . $email . '>' . "\r\n";
	$headers .= 'Reply-To: ' . $email . "\r\n";
	
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	//send email function starts
	mail($emailAddress, $subject, $message, $headers);
	//send email function ends
	//*/
	$URL = '../personal.php';
	header("Location:$URL");
?>