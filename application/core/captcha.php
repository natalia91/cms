<?php
<?php
session_start();
$image = imagecreatetruecolor(100, 50);
$grey = imagecolorallocate($image, 128, 128, 128);
$font = 'fonts/ArialRegular.ttf';
$captcha = rand(100,100500);
$_SESSION['captcha'] = substr(md5($captcha),0,5);
imagettftext($image, 20, 10, 5, 50, $grey, $font, $_SESSION);
header ("Content-type: image/gif");
imagegif($image);
imagedestroy($image);