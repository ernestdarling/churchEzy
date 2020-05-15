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
//Get Donate Button Content
$query_donate = mysql_query("SELECT ContentDescription FROM content WHERE ContentChurch = '$church_id' AND ContentType = 'donate_form'");
while ($row_donate = mysql_fetch_array($query_donate, MYSQL_ASSOC)) {
	$donate_button = $row_donate['ContentDescription'];
}
//Get Page Content
$query_content = mysql_query("SELECT ContentDescription FROM content WHERE ContentChurch = '$church_id' AND ContentType = 'donate_content'");
while ($row_content = mysql_fetch_array($query_content, MYSQL_ASSOC)) {
	$donate_content = $row_content['ContentDescription'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Giving</title>
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
	padding:20px;
	color:#666;
	font-size:14px;
}
</style>
</head>

<body>
<!-- Header Image Starts -->
<div id="header" style="background:url(http://cdn.churchezi.com/imageproxy/<?php echo $church_id ?>/headers/donate.png) no-repeat top; background-size:cover;"></div>
<!-- Header Image Ends -->
<div id="body">
<!-- Donate Button Area -->
<?php echo $donate_button; ?>
<!-- Donate Button Area Ends -->
<!-- Main Content Starts -->
<?php echo $donate_content; ?>
<!-- Main Content Ends -->
</div>
</body>
</html>