<?php 
//Get Member Info
$member_id = $_COOKIE['MemberID'];
//Connect to DB
include_once("../../../common/db.php");
//Query DB
$query_member = mysql_query("SELECT * FROM members WHERE MemberID = '$member_id'");
while ($row_member = mysql_fetch_array($query_member, MYSQL_ASSOC)) {
	$member_fname = $row_member['MemberFirstName'];
	$member_lname = $row_member['MemberLastName'];
	$member_dob = $row_member['MemberDOB'];
	$member_gender = $row_member['MemberGender'];
	$member_address1 = $row_member['MemberAddress1'];
	$member_address2 = $row_member['MemberAddress2'];
	$member_city = $row_member['MemberCity'];
	$member_state = $row_member['MemberState'];
	$member_country = $row_member['MemberCountry'];
	$member_zip = $row_member['MemberZip'];
	$member_phone = $row_member['MemberPhone'];
	$member_email = $row_member['MemberEmail'];
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<title>Epsilon 7.0</title>
    
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/skin.css">
<link rel="stylesheet" type="text/css" href="styles/framework.css">
<link rel="stylesheet" type="text/css" href="styles/ionicons.css">
<link href="http://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Satisfy" rel="stylesheet">
    
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/plugins.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</head>

<body>
<div id="page-transitions">
    
<div class="page-preloader page-preloader-dark">
    <div class="spinner"></div>
</div>

<div class="footer-menu footer-menu-fixed" align="center">
    <a href="index.php"><i class="ion-ios-home-outline"></i><em>Profile</em></a>
    <a href="personal.php"><i class="ion-ios-personadd-outline"></i><em>Personal</em></a>
    <a href="contact.php"><i class="ion-ios-email-outline"></i><em>Contact</em></a>
    <a href="account.php"><i class="ion-ios-locked-outline"></i><em>Account</em></a>
    <a href="messages.php" class="active-menu"><i class="ion-ios-chatbubble-outline"></i><em>Messages</em></a>
    <a href="../handler_logout.php"><i class="ion-ios-paperplane-outline"></i><em>Logout</em></a>
</div>
    
<div id="page-content">
    <div id="page-content-scroll"><!--Enables this element to be scrolled -->    
       
        <div class="heading-strip bg-4">
            <h3>Messages</h3>
            <p><?php echo $member_fname; ?> <?php echo $member_lname; ?></p>
            <i class="fa ion-ios-keypad-outline"></i>
            <div class="overlay dark-overlay"></div>
        </div>
       
        <div class="content">
        Messages coming soon...
        </div>
        <div class="decoration decoration-margins"></div>
        
        <div class="content">
                 
        </div>  
        
        <div class="decoration decoration-margins"></div>
        <div class="decoration decoration-margins"></div>
    </div>  
</div>
</div>
</body><?php 
//Get Member Info
$member_id = $_COOKIE['MemberID'];
//Connect to DB
include_once("../../../common/db.php");
//Query DB
$query_member = mysql_query("SELECT * FROM members WHERE MemberID = '$member_id'");
while ($row_member = mysql_fetch_array($query_member, MYSQL_ASSOC)) {
	$member_fname = $row_member['MemberFirstName'];
	$member_lname = $row_member['MemberLastName'];
	$member_dob = $row_member['MemberDOB'];
	$member_gender = $row_member['MemberGender'];
	$member_address1 = $row_member['MemberAddress1'];
	$member_address2 = $row_member['MemberAddress2'];
	$member_city = $row_member['MemberCity'];
	$member_state = $row_member['MemberState'];
	$member_country = $row_member['MemberCountry'];
	$member_zip = $row_member['MemberZip'];
	$member_phone = $row_member['MemberPhone'];
	$member_email = $row_member['MemberEmail'];
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<title>Epsilon 7.0</title>
    
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/skin.css">
<link rel="stylesheet" type="text/css" href="styles/framework.css">
<link rel="stylesheet" type="text/css" href="styles/ionicons.css">
<link href="http://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Satisfy" rel="stylesheet">
    
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/plugins.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</head>

<body>
<div id="page-transitions">
    
<div class="page-preloader page-preloader-dark">
    <div class="spinner"></div>
</div>

<div class="footer-menu footer-menu-fixed" align="center">
    <a href="index.php"><i class="ion-ios-home-outline"></i><em>Profile</em></a>
    <a href="personal.php"><i class="ion-ios-personadd-outline"></i><em>Personal</em></a>
    <a href="contact.php" class="active-menu"><i class="ion-ios-email-outline"></i><em>Contact</em></a>
    <a href="account.php"><i class="ion-ios-locked-outline"></i><em>Account</em></a>
    <a href="messages.php"><i class="ion-ios-chatbubble-outline"></i><em>Messages</em></a>
    <a href="../handler_logout.php"><i class="ion-ios-paperplane-outline"></i><em>Logout</em></a>
</div>
    
<div id="page-content">
    <div id="page-content-scroll"><!--Enables this element to be scrolled -->    
       
        <div class="heading-strip bg-4">
            <h3>Edit Contact Info</h3>
            <p><?php echo $member_fname; ?> <?php echo $member_lname; ?></p>
            <i class="fa ion-ios-keypad-outline"></i>
            <div class="overlay dark-overlay"></div>
        </div>
       
        <div class="content">
        Update your contact information.
        </div>
        <div class="decoration decoration-margins"></div>
        
        <div class="content">
                 
        </div>  
        
        <div class="decoration decoration-margins"></div>
        <div class="decoration decoration-margins"></div>
    </div>  
</div>
</div>
</body>