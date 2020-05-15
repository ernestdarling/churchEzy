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
$query_content = mysql_query("SELECT * FROM church WHERE ChurchID = '$church_id'");
while ($row_content = mysql_fetch_array($query_content, MYSQL_ASSOC)) {
	$contact_email = $row_content['ChurchEmail'];
	$church_website = $row_content['ChurchWebsite'];
	$church_phone = $row_content['ChurchTelephone'];
	$church_address = $row_content['ChurchAddress1'];
	$church_city = $row_content['ChurchCity'];
	$church_state = $row_content['ChurchState'];
	$church_zip = $row_content['ChurchZip'];
	$church_map = $row_content['ChurchMapEmbed'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Contact Us</title>
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
.text {
	width:80%;
	height:30px;
	margin-top:5px;
	margin-bottom:5px;
	padding-left:5px;
	padding-right:5px;
}
.textarea {
	width:80%;
	margin-top:5px;
	margin-bottom:5px;
	padding:5px;
}
.button {
	height:50px;
	margin-top:5px;
	margin-bottom:5px;
	
	width:80%;
	background:#039;
	color:#FFF;
	font-weight:bold;
	
	border:none;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
}
.header_text {
	font-size:12px;
}
</style>
</head>

<body>
<div id="header">
<?php
echo $church_map;
?>
</div>
<div id="body">
<?php
//if "email" variable is filled out, send email
  if (isset($_REQUEST['email']))  {
  
  //Email information
  $admin_email = $contact_email;
  $email = $_REQUEST['txtEmail'];
  $subject = 'New Contact APP - '.$_REQUEST['txtName'].' - '.$_REQUEST['txtPhone'];
  $comment = $_REQUEST['txtMessage'];
  
  //send email
  mail($admin_email, "$subject", $comment, "From:" . $email);
  
  //Email response
  echo "Thank you for contacting us!";
  }
  
  //if "email" variable is not filled out, display the form
  else  {
?>
<form method="post">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="26" align="center" valign="top" class="header_text"><em>Click on the MAP above for Directions to our Church<br />
      </em></td>
  </tr>
  <tr>
    <td height="66" align="center" valign="top"><strong>Tel:</strong> <?php echo $church_phone; ?> <br />
    <strong>Email:</strong> <?php echo $contact_email; ?> <br />    
    <strong>Web:</strong> <?php echo $church_website; ?>
    </td>
  </tr>
  <tr>
    <td height="26" align="center" valign="top" class="header_text"><em>You can also contact us by filling the form below</em></td>
  </tr>
  <tr>
    <td height="17" align="center" valign="middle">Name</td>
  </tr>
  <tr>
    <td height="33" align="center" valign="middle"><label for="txtName"></label>
      <input name="txtName" type="text" class="text" id="txtName" /></td>
  </tr>
  <tr>
    <td height="17" align="center" valign="middle">Email</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><label for="txtEmail"></label>
      <input name="txtEmail" type="text" class="text" id="txtEmail" /></td>
  </tr>
  <tr>
    <td height="17" align="center" valign="middle">Telephone</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><input name="txtPhone" type="text" class="text" id="txtPhone" /></td>
  </tr>
  <tr>
    <td height="17" align="center" valign="middle">Message</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><textarea name="txtMessage" cols="45" rows="5" class="textarea" id="txtMessage"></textarea></td>
  </tr>
  <tr>
    <td height="33" align="center" valign="middle"><input name="button" type="submit" class="button" id="button" value="Contact Us" /></td>
  </tr>
</table>
</form>
<?php
  }
?>
<p>&nbsp;</p>
</div>
</body>
</html>