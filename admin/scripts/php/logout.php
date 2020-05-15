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
	//Delete Admin COOKIES
	$expire = time()-1; //Make it last for 10 years
	setcookie('churchEziAdminID', '', $expire, '/');
	setcookie('churchEziAdminLock', '', $expire, '/');
	setcookie('churchEziAdminChurch', '', $expire, '/');
	//Redirect to Lock Screen
	$URL = '../../';
	header("Location:$URL");
}
?>