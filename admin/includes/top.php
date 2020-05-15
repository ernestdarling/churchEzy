<?php
//Check if User is Logged In
if (isset($_COOKIE['churchEziAdminID'])) {
	//Admin Logged In
	//Get Admin ID
	$admin_id = $_COOKIE['churchEziAdminID'];
	//Connect to DB
	include_once('scripts/php/db.php');
	//Get Admin Info from DB with Admin ID
	$query_admin = mysql_query("SELECT * FROM admin WHERE AdminID = '$admin_id'");
	while ($row_admin = mysql_fetch_array($query_admin, MYSQL_ASSOC)) {
		$admin_fname = $row_admin['AdminFirstName'];
		$admin_lname = $row_admin['AdminLastName'];
		$admin_church = $row_admin['AdminChurch'];
		$admin_role = $row_admin['AdminRole'];
		$admin_telephone = $row_admin['AdminTelephone'];
		$admin_lastlogin = $row_admin['AdminLastLogin'];
	}
	//Get Church Name from Church ID
	$query_church = mysql_query("SELECT * FROM church WHERE ChurchID = '$admin_church'");
	while ($row_church = mysql_fetch_array($query_church, MYSQL_ASSOC)) {
		$church_name = $row_church['ChurchName'];
		$church_id = $row_church['ChurchID'];
		$church_setup = $row_church['ChurchSetup'];
		//$church_level = $row_church['ChurchLevel'];
	}
	//Get Church Plan
	$query_plan = mysql_query("SELECT * FROM church_plans WHERE ChurchID = '$church_id'");
	while ($row_plan = mysql_fetch_array($query_plan, MYSQL_ASSOC)) {
		$plan_id = $row_plan['PlanID'];
	}
	//Use Plan ID to Find Plan
	$query_plan_info = mysql_query("SELECT * FROM plans WHERE PlanID = '$plan_id'");
	//Check if Church Has a Plan
	if (mysql_num_rows($query_plan_info)) {
		while ($row_plan_info = mysql_fetch_array($query_plan_info, MYSQL_ASSOC)) {
			$plan_number = $row_plan_info['PlanNumber'];
			$plan_description = $row_plan_info['PlanDescription'];
		}
		//Assign Plan Number to Church Level Variable
		$church_level = $plan_number;
	} 
	else {
		$church_level = -1;
	}
	//Check if Account is Locked
	if (isset($_COOKIE['churchEziAdminLock'])) {
		//Acount Locked
		//Check if Page is Not Lock Screen
		if ($page=='lock') {
			//Already on Lock Page
			//Do Nothing...
		}
		else {
			//Get Page Name for Reference
			$ref = $page;
			//Not On Lock Page
			//Redirect to Lock Page
			$URL = 'lock.php?ref='.$ref.'';
			header("Location:$URL");
		}
	}
	else {
		//Acount Not Locked
		//User Logged In
		if ($page=='login' || $page=='lock') {
			//User on Login Page
			//Redirect to Dashboard
			$URL = './';
			header("Location:$URL");
		}
		else {
			//Already not on Login Page
			//Check if Church Has a Plan
			if ($church_level < 0 && $page!='plan') {
				//Church Doesn't Have a Plan
				//Redirect to Plan Choosing Page
				$URL = 'plan.php';
				header("Location:$URL");
			}
			else {
				//Church Has a Plan Do Nothing
				//Do Nothing...
			}
		}
	}
}
else {
	//User Not Logged In
	if ($page=='login') {
		//User on Login Page
		//Stay Here for Login
	}
	else {
		//Get Page Name for Reference
		$ref = $page;
		//Already not on Login Page
		//Redirect to Login Page
		$URL = 'login.php?ref='.$ref.'';
		header("Location:$URL");
	}
}
?>