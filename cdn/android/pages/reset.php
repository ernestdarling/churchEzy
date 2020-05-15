<?php
//Log User In forever
$expire = time()-60*60*24*7*52*10*10; //100 Years Expiry
setcookie('MemberID', $member_id, $expire, '/');
setcookie('ChurchEziIntro', '1', $expire, '/');
//Redirect to Home
$URL = 'custom_home.php?cid=5';
header("Location:$URL");
?>