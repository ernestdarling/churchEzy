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
    <a href="index.php" class="active-menu"><i class="ion-ios-home-outline"></i><em>Profile</em></a>
    <a href="personal.php"><i class="ion-ios-personadd-outline"></i><em>Personal</em></a>
    <a href="contact.php"><i class="ion-ios-email-outline"></i><em>Contact</em></a>
    <a href="account.php"><i class="ion-ios-locked-outline"></i><em>Account</em></a>
    <a href="messages.php"><i class="ion-ios-chatbubble-outline"></i><em>Messages</em></a>
    <a href="../handler_logout.php"><i class="ion-ios-paperplane-outline"></i><em>Logout</em></a>
    <!--
    <a href="index.php"><i class="ion-ios-home-outline"></i><em>Current Information</em></a>
    <a href="actual-gallery.html"><i class="ion-ios-camera-outline"></i><em>Gallery</em></a>
    <a href="actual-activity.html"><i class="ion-ios-star-outline"></i><em>Activity</em></a>
    <a class="active-menu" href="actual-sitemap.html"><i class="ion-ios-more-outline"></i><em>More</em></a>
    <a href="actual-contact.html"><i class="ion-ios-email-outline"></i><em>Contact</em></a>
    <a href="#" class="tablet-link"><i class="ion-ios-telephone-outline"></i><em>Call</em></a>
    <a href="#" class="tablet-link"><i class="ion-social-facebook-outline"></i><em>Facebook</em></a>
    <a href="#" class="tablet-link"><i class="ion-social-twitter-outline"></i><em>Twitter</em></a>
    -->
</div>
    
<div id="page-content">
    <div id="page-content-scroll"><!--Enables this element to be scrolled -->    
       
        <div class="heading-strip bg-4">
            <h3>Your Profile</h3>
            <p><?php echo $member_fname; ?> <?php echo $member_lname; ?></p>
            <i class="fa ion-ios-keypad-outline"></i>
            <div class="overlay dark-overlay"></div>
        </div>
       
        <div class="content">
        You can update your records by editing below. Tap a section to open.
        </div>
        <div class="decoration decoration-margins"></div>
        
        <div class="content">
            <div class="accordion-item accordion-ghost">
                <a href="#" class="accordion-toggle">PERSONAL INFO <i class="ion-android-add"></i></a>
                <div class="accordion-content ">
                    <p>
                    <strong>First Name: </strong><?php echo $member_fname; ?> <br/>
                    <strong>Last Name: </strong><?php echo $member_lname; ?> <br/>
                    <strong>Date of Birth: </strong><?php echo $member_dob; ?> <br/>
                    <strong>Gender: </strong><?php echo $member_gender; ?>
                    </p>
                    <!--<a href="personal.php">Edit Information</a>-->
                </div>
            </div>            
            <div class="accordion-item accordion-ghost">
                <a href="#" class="accordion-toggle">CONTACT INFO <i class="ion-android-add"></i></a>
                <div class="accordion-content ">
                    <p>
                    <strong>Mailing Address: </strong> <br/>
                    <?php echo $member_address1; ?> <?php echo $member_address2; ?> <br/>
                    <?php echo $member_city; ?>, <?php echo $member_state; ?> <?php echo $member_country ?> <?php echo $member_zip; ?><br/>
                    <strong>Email: </strong><?php echo $member_email; ?> <br/>
                    <strong>Telephone: </strong><?php echo $member_phone; ?>
                    </p>
                    <!--<a href="contact.php">Edit Information</a>-->
                </div>
            </div>      
        </div>  
        
        <div class="decoration decoration-margins"></div>
        <div class="decoration decoration-margins"></div>
<!--        <div class="heading-strip bg-5">
            <h3>Accordions Color</h3>
            <p>Essential Features for your Page</p>
            <i class="ion-ios-keypad-outline"></i>
            <div class="overlay dark-overlay"></div>
        </div>
        <div class="decoration decoration-margins"></div>
        
        <div class="content">
            <div class="accordion-item accordion-bg bg-red-light half-bottom">
                <a href="#" class="accordion-toggle">Accordion Item 1 <i class="ion-android-add"></i></a>
                <div class="accordion-content ">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>            
            <div class="accordion-item accordion-bg bg-green-dark half-bottom">
                <a href="#" class="accordion-toggle">Accordion Item 2 <i class="ion-android-add"></i></a>
                <div class="accordion-content ">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>            
            <div class="accordion-item accordion-bg bg-blue-dark last-accordion-item">
                <a href="#" class="accordion-toggle">Accordion Item 3 <i class="ion-android-add"></i></a>
                <div class="accordion-content ">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>
        </div>  
                
        <div class="decoration decoration-margins"></div>
        <div class="decoration"></div>
        
        <!--<div class="footer footer-dark">
            <a href="index.html" class="footer-logo scale-hover"></a>
            <p>
                Simplicity and complexity packed into a beautiful, 
                feature filled, powerful, gorgeous mobile template.
            </p>
            <div class="footer-socials">
                <a href="#" class="icon icon-round icon-ghost icon-xs facebook-bg"><i class="ion-social-facebook"></i></a>
                <a href="#" class="icon icon-round icon-ghost icon-xs twitter-bg"><i class="ion-social-twitter"></i></a>
                <a href="#" class="icon icon-round icon-ghost icon-xs google-bg"><i class="ion-social-googleplus"></i></a>
                <a href="#" class="icon icon-round icon-ghost icon-xs phone-bg"><i class="ion-ios-telephone"></i></a>
                <a href="#" class="icon icon-round icon-ghost icon-xs show-share-bottom border-magenta-dark"><i class="ion-android-share"></i></a>
                <a href="#" class="icon icon-round icon-ghost icon-xs back-to-top border-blue-light"><i class="ion-arrow-up-b"></i></a>
            </div>
            <div class="decoration"></div>
            <p class="copyright-text">Copyright <span id="copyright-year"></span>. All Rights Reserved.</p>
        </div>--->
    </div>  
</div>
    <!--
<div class="share-bottom share-dark">
    <h3>Share Page</h3>
    <div class="share-socials-bottom">
        <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.themeforest.net/">
            <i class="ion-social-facebook-outline icon-ghost facebook-bg"></i>
            Facebook
        </a>
        <a href="https://twitter.com/home?status=Check%20out%20ThemeForest%20http://www.themeforest.net">
            <i class="ion-social-twitter-outline twitter-bg"></i>
            Twitter
        </a>
        <a href="https://plus.google.com/share?url=http://www.themeforest.net">
            <i class="ion-social-googleplus-outline icon-ghost google-bg"></i>
            Google
        </a>
        <a href="https://pinterest.com/pin/create/button/?url=http://www.themeforest.net/&media=https://0.s3.envato.com/files/63790821/profile-image.jpg&description=Themes%20and%20Templates">
            <i class="ion-social-pinterest-outline icon-ghost pinterest-bg"></i>
            Pinterest
        </a>
        <a href="sms:">
            <i class="ion-ios-chatboxes-outline icon-ghost sms-bg"></i>
            Text
        </a>
        <a href="mailto:?&subject=Check this page out!&body=http://www.themeforest.net">
            <i class="ion-ios-email-outline icon-ghost mail-bg"></i>
            Email
        </a>
        <div class="clear"></div>
    </div>
</div>
 
    -->
</div>
</body>