<?php
session_start();
//$randnum = rand(100, 100500);
//$_SESSION['randnum'] = md5($randnum);
$image = imagecreatetruecolor(100, 50);
$grey = imagecolorallocate($image, 128, 128, 128);
$font = 'fonts/ArialRegular.ttf';
$captcha = rand(100,100500);
$_SESSION = substr(md5($captcha),0,5);
imagettftext($image, 20, 10, 5, 50, $grey, $font, $_SESSION);
header ("Content-type: image/gif");
imagegif($image);
imagedestroy($image);