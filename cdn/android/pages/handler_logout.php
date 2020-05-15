<?php
//Log User In forever
$expire = time()-60*60*24*30*12*100;//Set for 100years
setcookie('MemberID', $member_id, $expire, '/');
setcookie('ChurchEziIntro', '', $expire, '/');
//Redirect to Home
$URL = 'custom_home.php?cid=5';
header("Location:$URL");
?>