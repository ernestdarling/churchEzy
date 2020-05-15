<?php
//Check to See if Admin is Logged In
if (!isset($_COOKIE['churchEziAdminID'])) {
	//Admin Not Logged In... Redirect to Login
	//Set Error Message
	$error = 'You have to be logged in to access this page!';
	$URL = '../../login.php?error='.$error.'';
	header("Location:$URL");
}
else {
	//Admin Logged In... Proceed
	//Get COOKIE
	$admin_id = $_COOKIE['churchEziAdminID'];
	//Check if Admin is Locked
	if (!isset($_COOKIE['churchEziAdminLock'])) {
		//Admin Not Locked... Send to Dashboard
		$URL = '../../';
		header("Location:$URL");
	}
	else {
		//Admin Locked
		//Now Let's Unlock
		//Check if Form is Filled
		if (empty($_POST['txtPassword'])) {
			//User Did Not Fill For
			//Redirect to Lock Screen with Error Message
			$error = 'Oops. You forgot to enter your password';
			$URL = '../../lock.php?error='.$error.'';
			header("Location:$URL");
		}
		else {
			//User Filled Form 
			//Check Password with DB
			//Connec to DB
			include_once('db.php');
			//Query Database
			$query_admin = mysql_query("SELECT * FROM admin WHERE AdminID = '$admin_id'");
			//Count Records to verify
			$count_admin = mysql_num_rows($query_admin);
			if (empty($count_admin)) {
				//Password Not Found
				//Redirect with Error Message
				$error = 'You entered an incorrect password. Please try again.';
				$URL = '../../lock.php?error='.$error.'';
				header("Location:$URL");
			}
			else {
				//Password Matched... Redirect to Dashboard
				//Delete Lock Cookie
				$expire = time()-1;
				setcookie('churchEziAdminLock', '', $expire, '/');
				//Now Redirect to Dashboard
				$URL = '../../';
				header("Location:$URL");
			}
		}
	}
}
?>