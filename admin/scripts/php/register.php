<?php
//Check if Admin is From Login Page
if (!isset($_POST['txtEmail']) || !isset($_POST['txtPassword1'])) {
	//But from Where are You Coming From
	//Go Back to Login Page
	$URL = '../../';
	header("$URL");
}
else {
	//User is From Login Page... Proceed
	//Get Values from Form
	$firstname = $_POST['txtFirstName'];
	$lastname = $_POST['txtLastName'];
	$organization = $_POST['txtOrganization'];
	$telephone = $_POST['txtTelephone'];
	$address1 = $_POST['txtAddress1'];
	$address2 = $_POST['txtAddress2'];
	$city = $_POST['txtCity'];
	$state = $_POST['txtState'];
	$zip = $_POST['txtZip'];
	$country = $_POST['txtCountry'];
	//=====
	$email = $_POST['txtEmail'];
	$password1 = $_POST['txtPassword1'];
	$password2 = $_POST['txtPassword2'];
	$admin_created = time();
	$ref = '';
	//Check for Emptiness
	if (empty($firstname) || empty($lastname) || empty($email) || empty($password1) || empty($password2)) {
		//User Did Not Fill Form
		//Send Back to Login with Error Message
		$error = 'Oops! You forgot something. Please try again!';
		$URL = '../../login.php?error='.$error.'';
		header("Location:$URL");
	}
	else {
		//Check if Passwords Match
		if ($password1 != $password2) {
			//Passwords Does Not Match
			//Send Back to Login with Error Message
			$error = 'Oops! Passwords do NOT match. Please try again!';
			$URL = '../../login.php?error='.$error.'';
			header("Location:$URL");
		}
		else {
			//User Filled Out the Form Now Let's Check with DB
			//Conenct to DB
			include_once('db.php');
			//Insert into DB
			mysql_query("INSERT INTO admin (AdminFirstName, AdminLastName, AdminEmail, AdminPassword, AdminTelephone, AdminRole, AdminCreated, AdminLastLogin) VALUES ('$firstname', '$lastname', '$email', '$password1', '$telephone', 'super', '$admin_created', '$admin_created')");
			//Get AdminID
			$admin_id = mysql_insert_id();
			//Insert Church Info into DB
			mysql_query("INSERT INTO church (ChurchName, ChurchAddress1, ChurchAddress2, ChurchCity, ChurchState, ChurchZip, ChurchCountry, ChurchTelephone, ChurchSignedUp) VALUES ('$organization', '$address1', '$address2', '$city', '$state', '$zip', '$country', '$telephone', '$admin_created')");
			//Get Church ID
			$admin_church = mysql_insert_id();
			
			//Link Admin to Church
			mysql_query("INSERT INTO admin_church (AdminID, ChurchID, AdminAdded) VALUES ('$admin_id', '$admin_church', '$admin_created')");

			//Login Successful
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
		}
	}
}
?>
Redirecting.... <a href="../../">Click Here After 5 seconds</a>