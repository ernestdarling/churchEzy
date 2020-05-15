<?php
if (!isset($_POST['submit'])) {
	//Redirec to Login
	$URL = 'register.php?error=Please Try Again';
	//header("Location:$URL");
} else {
	//Form Submitted
	//Get Form Info
	$member_fname = $_POST['txtFirstName'];
	$member_lname = $_POST['txtLastName'];
	$member_phone = $_POST['txtPhone'];
	$member_email = $_POST['txtEmail'];
	$member_password = $_POST['txtPassword'];
	$member_password2 = $_POST['txtPassword2'];
	$member_church = 5;
	$member_added = time();
	//Connect to DB
	include_once('../../common/db.php');
	//Query DB
	if (empty($member_fname) || empty($member_lname) || empty($member_email) || empty($member_password)) {
		$URL = 'register.php?cid=5';
		header("Location:$URL");
	}
	else {
		if ($member_password != $member_password2) {
			$URL = 'register.php?cid=5';
			header("Location:$URL");
		}
		else {
			//User Successfully entered info
			mysql_query("INSERT INTO members (MemberChurch, MemberFirstName, MemberLastName, MemberPhone, MemberEmail, MemberPassword, MemberAdded) VALUES ('$member_church', '$member_fname', '$member_lname', '$member_phone', '$member_email', '$member_password', '$member_added')");
			//Get Member ID
			$member_id = mysql_insert_id();
			//Log User In forever
			$expire = time()+60*60*24*7*52*10*10; //100 Years Expiry
			setcookie('MemberID', $member_id, $expire, '/');
			//Redirect
			$URL = 'custom_home.php?cid=5';
			header("Location:$URL");
		}
	}
}
?>