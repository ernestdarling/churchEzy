<?php
    // variables start
	$name = "";
	$email = "";
	$message = "";
	
	
	//$name =  trim($_POST['contactNameField']);
	//$email =  trim($_POST['contactEmailField']);
	//$message =  trim($_POST['contactMessageTextarea']);
	
	$member_id = $_COOKIE['MemberID'];
	$member_address1 = trim($_POST['txtMemberAddress1']);
	$member_address2 = trim($_POST['txtMemberAddress2']);
	$member_city = trim($_POST['txtMemberCity']);
	$member_state = $_POST['txtMemberState'];
	$member_zip = $_POST['txtMemberZip'];
	
	//Connect DB
	include_once("../../../../common/db.php");
	
	//Update DB
	mysql_query("UPDATE members SET MemberAddress1 = '$member_address1' WHERE MemberID = '$member_id'");
	mysql_query("UPDATE members SET MemberAddress2 = '$member_address2' WHERE MemberID = '$member_id'");
	mysql_query("UPDATE members SET MemberCity = '$member_city' WHERE MemberID = '$member_id'");
	mysql_query("UPDATE members SET MemberState = '$member_state' WHERE MemberID = '$member_id'");
	mysql_query("UPDATE members SET MemberZip = '$member_zip' WHERE MemberID = '$member_id'");
	
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
	$URL = '../contact.php';
	header("Location:$URL");
?>