<?php
//Check if Admin is From Login Page
if (!isset($_POST['txtEmail']) || !isset($_POST['txtPassword'])) {
	//But from Where are You Coming From
	//Go Back to Login Page
	$URL = '../../';
	header("$URL");
}
else {
	//User is From Login Page... Proceed
	//Get Values from Form
	$email = strtolower($_POST['txtEmail']);
	$password = $_POST['txtPassword'];
	$ref = $_POST['txtRef'];
	//Check for Emptiness
	if (empty($email) || empty($password)) {
		//User Did Not Fill Form
		//Send Back to Login with Error Message
		$error = 'Oops! You forgot something. Please try again!';
		$URL = '../../login.php?error='.$error.'';
		header("Location:$URL");
	}
	else {
		//User Filled Out the Form Now Let's Check with DB
		//*/Conenct to DB
		include_once('db.php');
		//Check User's Info Against DB
		$sql = 'SELECT * FROM admin WHERE AdminEmail = "$email"';
		$query_admin = mysqli_query($conn, $sql);
		if ($query_admin) {
			echo 'good';
		} else {
			echo 'no good';
		}
		//Count Results to Verify
		echo $count_admin = mysqli_num_rows($query_admin);
		if ($count_admin < 1) {
			//Admin Not Found in Database
			//Redirect to Login with Error Message
			$error = 'Oops! The email and/or password you entered did not match. Please try again.';
			$URL = '../../login.php?error='.$error.'';
			//header("Location:$URL");
		}
		else {
			//Admin Info Found and Logged in Database
			while ($row_admin = mysqli_fetch_assoc($query_admin)) {
				//Retrieve Admin Info
				$admin_id = $row_admin['AdminID'];
				$admin_church = $row_admin['AdminChurch'];
			}
			//Login Successful
			//Update Admin Last Login
			$lastlogin = time();
			mysqli_query("UPDATE admin SET AdminLastLogin = '$lastlogin' WHERE AdminID = '$admin_id'");
			//Set Admin ID COOKIE
			$expire = time()+60*60*24; //Expires in 1 Day
			setcookie('churchEziAdminID', $admin_id, $expire, '/');
			setcookie('churchEziAdminChurch', $admin_church, $expire, '/');
			//Now Lets Redirect to Appropriate Page
			if (empty($ref)) {
				//User Came from Login Page or Unknown Location
				$URL = '../../';
				header("Location:$URL");
			}
			else {
				//User has a Reference... Take them Back
				$URL = '../../'.$ref.'.php';
				header("Location:$URL");
			}
		}//*/
	}
}
?>
Redirecting.... <a href="../../">Click Here After 5 seconds</a>