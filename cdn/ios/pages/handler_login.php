<?php
if (!isset($_POST['submit'])) {
	//Redirec to Login
	$URL = 'login.php?error=Please Login';
	header("Location:$URL");
} else {
	//Form Submitted
	//Get Form Info
	$member_email = $_POST['txtEmail'];
	$member_password = $_POST['txtPassword'];
	//Connect to DB
	include_once('../../common/db.php');
	//Query DB
	$query_members = mysql_query("SELECT * FROM members WHERE MemberEmail = '$member_email' && MemberPassword = '$member_password'");
	//Count Rows
	$count_members = mysql_num_rows($query_members);
	if (empty($count_members)) {
		//User Not Exist
		$URL = 'login.php?error=Wrong Email or Password';
		header("Location:$URL");
	}
	else {
		//Member Exists
		while ($row_members = mysql_fetch_array($query_members, MYSQL_ASSOC)) {
			$member_id = $row_members['MemberID'];
		}
		//Log User In forever
		$expire = time()+60*60*24*7*52*10*10; //100 Years Expiry
		setcookie('MemberID', $member_id, $expire, '/');
		//Redirect to Home
		if (!isset($_POST['ref'])) {
			$URL = 'custom_home.php?cid=5';
		} else {
			$URL = 'profile.php';
		}
		header("Location:$URL");
	}
}
?>