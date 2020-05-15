<?php
//Set SkipIntro COOKIE
$expire = time()+60*60*24*30*12*100;//Set for 100years
setcookie("ChurchEziIntro", "1", $expire, "/");
//Redirect
$URL = 'custom_home.php?cid=5';
header("Location:$URL");
?>