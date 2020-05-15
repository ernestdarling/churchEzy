<?php
//Get Church ID
if (isset($_GET['cid'])) {
	$church_id = $_GET['cid'];
}
else {
	$church_id = 0;
}
//Connect to DB
include_once('../../common/db.php');
//Get Page Content
$query_content = mysql_query("SELECT ContentDescription FROM content WHERE ContentChurch = '$church_id' AND ContentType = 'service_content'");
while ($row_content = mysql_fetch_array($query_content, MYSQL_ASSOC)) {
	$page_content = $row_content['ContentDescription'];
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Upcoming Events - Inner Court Sanctuary</title>
<style type="text/css">
body,html {
	height:100%;
	margin:0;
	font-family:Verdana, Geneva, sans-serif;
}
#header {
	height:30%;
	background:#333;
}
#body {
	height:70%;
	background:#fff;
	color:#666;
	font-size:14px;
}
.service {
	background:url(../images/gradient.png) repeat-x bottom;
	padding:10px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
    //  Accordion Panels
    $(".accordion div").show();
    setTimeout("$('.accordion div').slideToggle('slow');", 1000);
    $(".accordion h3").click(function () {
        $(this).next(".pane").slideToggle("slow").siblings(".pane:visible").slideUp("slow");
        $(this).toggleClass("current");
        $(this).siblings("h3").removeClass("current");
    });
});
</script>
<style type="text/css">
.accordion {
    margin:1em 0
}
.accordion h3 {
    background:#559b6a;
    color:#fff;
    cursor:pointer;
    margin:0 0 1px 0;
    padding:4px 10px;
	padding-top:10px;
	padding-bottom:10px;
}
.accordion h3.current {
    background:#4289aa;
    cursor:default
}
.accordion div.pane {
    padding:5px 10px
}
</style>
</head>

<body>
<!-- Header Image Starts -->
<div id="header" style="background:url(http://cdn.churchezi.com/imageproxy/<?php echo $church_id ?>/headers/service.png) no-repeat top; background-size:cover;"></div>
<!-- Header Image Ends -->
<div id="body">
<p style="margin-left:10px;">Below is our weekly event schedule. Click on an event below to view details. <br />
</p>
<!-- Main Content Starts -->
<?php echo $page_content; ?>
<!-- Main Content Ends -->
</div>
</body>
</html>