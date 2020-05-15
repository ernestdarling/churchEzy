<?php
//Check if Admin is From Login Page
if (!isset($_POST['txtEmail']) || !isset($_POST['txtPassword'])) {
	//But from Where are You Coming From
	//Go Back to Login Page
	$URL = '../../';
	header("$URL");
} else {
  //User is From Login Page... Proceed
	//Get Values from Form
	$email = strtolower($_POST['txtEmail']);
  $password = $_POST['txtPassword'];
  $fname = 'Daniel';
  $ref = $_POST['txtRef'];
  //Check for Emptiness
	if (empty($email) || empty($password)) {
		//User Did Not Fill Form
		//Send Back to Login with Error Message
		$error = 'Oops! You forgot something. Please try again!';
		$URL = '../../login.php?error='.$error.'';
		header("Location:$URL");
	} else {
    //User Filled Out the Form Now Let's Check with DB
		//*/Conenct to DB
    include_once('db.php');
    // Check connection
    if ($conn->connect_error) {
      //Database Connection Error
      //Send Back to Login with Error Message
      $error = 'Oops! Something went wrong on our end. Please try again!';
      $URL = '../../login.php?error='.$error.'';
      header("Location:$URL");
    } else {
      //Database Connected Successfully
      $sql = "SELECT * FROM admin WHERE AdminEmail = '$email' AND AdminPassword = '$password'";
      $query_admin = $conn->query($sql);
      if ($query_admin->num_rows < 1) {
        //Admin Not Found in Database
        //Redirect to Login with Error Message
        $error = 'Oops! The email and/or password you entered did not match. Please try again.';
        $URL = '../../login.php?error='.$error.'';
        //header("Location:$URL");
      } else { 
        //Admin Info Found and Logged in Database
        while($row = $query_admin->fetch_assoc()) {
          //Retrieve Admin Info
          echo $admin_id = $row['AdminID'];
          echo $admin_church = $row['AdminChurch'];
        }
        //Login Successful
        //Update Admin Last Login
        $lastlogin = time();
        $sql = "UPDATE admin SET AdminLastLogin = '$lastlogin' WHERE AdminID = '$admin_id'";
        $conn->query($sql);
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
}
?>
