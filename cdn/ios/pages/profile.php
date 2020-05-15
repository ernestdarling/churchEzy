<?php
	if (isset($_COOKIE['MemberID'])) {
		//User Logged In
		$URL = 'profile/';
		header("Location:$URL");
	} else {
		//User Not Logged In
		$URL = 'login.php?ref=profile';
		header("Location:$URL");
	}
?>
<table border="0" width="100%">
<tr>
<td height="450px" valign="middle" align="center">
<?php echo $_GET['cid']; ?>
<?php echo $_COOKIE['ChurchEziIntro']; ?>
<p>Member Profile Coming Soon...</p>
  <?php if (isset($_COOKIE['MemberID'])) { ?><a href="handler_logout.php">Logout</a><?php } ?>
<p><a style="color:#FFF; text-decoration:none;" href="profile/">New Profile</a></p>
</td>
</tr>
</table>