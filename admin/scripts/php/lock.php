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
	//Create Lock Cookie
	$expire = time()+60*60*24*366*10; //Make it last for 10 years
	setcookie('churchEziAdminLock', '1', $expire, '/');
	//Redirect to Lock Screen
	$URL = '../../lock.php';
	header("Location:$URL");
}
?>