<?php
//Get Church ID
if (isset($_GET['cid'])) {
	$church_id = $_GET['cid'];
	if ($church_id == '5') {
		//Custom Church
		//Redirect
		$URL = "custom_home.php?cid=5";
		header("Location:$URL");
	}
}
else {
	$church_id = 0;
}
//Connect to DB
include_once('../../common/db.php');
//Record Session
include_once('../../common/session.php');
//Get Data from DB using Church ID
$query_slide = mysql_query("SELECT * FROM church WHERE ChurchID = '$church_id'");
while ($row_slide = mysql_fetch_array($query_slide, MYSQL_ASSOC)) {
	$slide_delay = $row_slide['ChurchSlideDelay'];
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8" />
    
    <title>Home</title>

    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    <script src="scripts/modernizr-2.6.1.min.js"></script>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="../lean-slider.js"></script>
    <link rel="stylesheet" href="../lean-slider.css" type="text/css" />
    <link rel="stylesheet" href="css/sample-styles.css" type="text/css" />
<style type="text/css">
body,html {
	height:100%;
	background:#000;
}
#logo {
	height:15%;
	background:url(http://cdn.churchezi.com/imageproxy/<?php echo $church_id; ?>/app_logo.png) center no-repeat;
	background-size:contain;
}
</style>
</head>
<body>
<div id="logo">

</div>
<div class="slider-wrapper">
    <div id="slider">
    <?php
    //Check Database for Slides from this Church
    $query_slides = mysql_query("SELECT * FROM slides WHERE SlideChurch = '$church_id' ORDER BY SlideID DESC");
    //Loop through results
    while ($row_slides = mysql_fetch_array($query_slides, MYSQL_ASSOC)) {
    //Get Slide Info
    $slide_link = $row_slides['SlideLink'];
	?>
	<div class="slide1">
                <img src="<?php echo $slide_link; ?>" alt="" />
            </div>  
	<?php    
    } ?>

    </div>
    <div id="slider-direction-nav"></div>
    <div id="slider-control-nav"></div>
</div>
    
    <script type="text/javascript">
    $(document).ready(function() {
        var slider = $('#slider').leanSlider({
            directionNav: '#slider-direction-nav',
            controlNav: '#slider-control-nav',
            pauseTime: <?php echo $slide_delay; ?>000
        });
    });
    </script>
    
</body>
</html>