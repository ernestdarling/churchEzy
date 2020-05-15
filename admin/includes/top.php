<?php
//Check if User is Logged In
if (isset($_COOKIE['churchEziAdminID'])) {
	//Admin Logged In
	//Get Admin ID
	$admin_id = $_COOKIE['churchEziAdminID'];
	//Connect to DB
	include_once('scripts/php/db.php');
	//Get Admin Info from DB with Admin ID
	$sql = "SELECT * FROM admin WHERE AdminID = '$admin_id'";
	$query_admin = $conn->query($sql);
	while($row = $query_admin->fetch_assoc()) {
		$admin_fname = $row['AdminFirstName'];
		$admin_lname = $row['AdminLastName'];
		$admin_church = $row['AdminChurch'];
		$admin_role = $row['AdminRole'];
		$admin_telephone = $row['AdminTelephone'];
		$admin_lastlogin = $row['AdminLastLogin'];
	}
	//Get Church Name from Church ID
	$sql = "SELECT * FROM church WHERE ChurchID = '$admin_church'";
	$query_church = $conn->query($sql);
	while ($row = $query_church->fetch_assoc()) {
		$church_name = $row['ChurchName'];
		$church_id = $row['ChurchID'];
		$church_setup = $row['ChurchSetup'];
		//$church_level = $row_church['ChurchLevel'];
	}
	//Get Church Plan
	$sql = "SELECT * FROM church_plans WHERE ChurchID = '$church_id'";
	$query_plan = $conn->query($sql);
	while ($row = $query_plan->fetch_assoc()) {
		$plan_id = $row['PlanID'];
	}
	//Use Plan ID to Find Plan
	$sql = "SELECT * FROM plans WHERE PlanID = '$plan_id'";
	$query_plan_info = $conn->query($sql);
	//Check if Church Has a Plan
	if ($query_plan_info->num_rows > 0) {
		while ($row = $query_plan_info->fetch_assoc()) {
			$plan_number = $row['PlanNumber'];
			$plan_description = $row['PlanDescription'];
		}
		//Assign Plan Number to Church Level Variable
		$church_level = $plan_number;
	} else {
		$church_level = -1;
	}
	//Check if Account is Locked
	if (isset($_COOKIE['churchEziAdminLock'])) {
		//Acount Locked
		//Check if Page is Not Lock Screen
		if ($page=='lock') {
			//Already on Lock Page
			//Do Nothing...
		} else {
			//Get Page Name for Reference
			$ref = $page;
			//Not On Lock Page
			//Redirect to Lock Page
			$URL = 'lock.php?ref='.$ref.'';
			header("Location:$URL");
		}
	} else {
		//Acount Not Locked
		//User Logged In
		if ($page=='login' || $page=='lock') {
			//User on Login Page
			//Redirect to Dashboard
			$URL = './';
			header("Location:$URL");
		} else {
			//Already not on Login Page
			//Check if Church Has a Plan
			if ($church_level < 0 && $page!='plan') {
				//Church Doesn't Have a Plan
				//Redirect to Plan Choosing Page
				$URL = 'plan.php';
				header("Location:$URL");
			} else {
				//Church Has a Plan Do Nothing
				//Do Nothing...
			}
		}
	}
} else {
	//User Not Logged In
	if ($page=='login') {
		//User on Login Page
		//Stay Here for Login
	} else {
		//Get Page Name for Reference
		$ref = $page;
		//Already not on Login Page
		//Redirect to Login Page
		$URL = 'login.php?ref='.$ref.'';
		header("Location:$URL");
	}
}
?>
