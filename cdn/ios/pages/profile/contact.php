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
        	<div class="contact-form no-bottom"> 
                  <div class="formSuccessMessageWrap" id="formSuccessMessageWrap">
                      <div class="notification-medium bg-green-light">
                          <h1>Success</h1>
                          <p>
                              Your information has been updated!
                          </p>
                          <a href="#" class="hide-notification"><i class="fa fa-times"></i></a>
                      </div>
                  </div>

                  <form action="php/contact.php" method="post">
                      
                          <div class="formValidationError bg-pink-dark" id="contactFirstNameFieldError">
                              <p class="center-text uppercase small-text color-white">First Name is required!</p>
                          </div>   
                          <div class="formValidationError bg-pink-dark" id="contactLastNameFieldError">
                              <p class="center-text uppercase small-text color-white">Last Name is required!</p>
                          </div>          
                          <div class="formValidationError bg-pink-dark" id="contactEmailFieldError">
                              <p class="center-text uppercase small-text color-white">Mail address required!</p>
                          </div> 
                          <div class="formValidationError bg-pink-dark" id="contactEmailFieldError2">
                              <p class="center-text uppercase small-text color-white">Mail address must be valid!</p>
                          </div> 
                          <div class="formValidationError bg-pink-dark" id="contactMessageTextareaError">
                              <p class="center-text uppercase small-text color-white">Message field is empty!</p>
                          </div>   
                          <div class="formFieldWrap">
                              <label class="field-title contactNameField" for="txtMemberAddress1">Address Line 1:<span></span></label>
                              <input type="text" name="txtMemberAddress1" value="<?php echo $member_address1; ?>" class="contactField requiredField" id="txtMemberAddress1"/>
                          </div>
                          <div class="formFieldWrap">
                              <label class="field-title contactNameField" for="txtMemberAddress2">Address Line 2:<span></span></label>
                              <input type="text" name="txtMemberAddress2" value="<?php echo $member_address2; ?>" class="contactField requiredField" id="txtMemberAddress2"/>
                          </div>
						  <div class="formFieldWrap">
                              <label class="field-title contactNameField" for="txtMemberCity">City:<span></span></label>
                              <input type="text" name="txtMemberCity" value="<?php echo $member_city; ?>" class="contactField requiredField" id="txtMemberCity"/>
                          </div>
                          <div class="formFieldWrap">
                              <label class="field-title contactNameField" for="txtMemberState">State:<span></span></label>
                              <input type="text" name="txtMemberState" value="<?php echo $member_state; ?>" class="contactField requiredField" id="txtMemberState"/>
                          </div>
                          <div class="formFieldWrap">
                              <label class="field-title contactNameField" for="txtMemberZip">Zip Code:<span></span></label>
                              <input type="text" name="txtMemberZip" value="<?php echo $member_zip; ?>" class="contactField requiredField" id="txtMemberZip"/>
                          </div>
                          <p></p>
                          <div class="formSubmitButtonErrorsWrap contactFormButton">
                              <input type="submit" class="buttonWrap button button-pink button-bold button-xs contactSubmitButton full-bottom" id="" value="UPDATE INFO"/>
                          </div>
                      
                  </form>       
              </div>
        </div>  
        
        <div class="decoration decoration-margins"></div>
        <div class="decoration decoration-margins"></div>
    </div>  
</div>
</div>
</body>