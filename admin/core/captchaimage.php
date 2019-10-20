<?php
/*
=========================================================================================
Copyright www.pikephp.com
=========================================================================================
*/
header('Content-type: image/jpeg');
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false); 
header("Pragma: no-cache");

$width = 80;
$height = 35;
$characters_on_image = 6;
$possible_letters = '23456789bcdfghjkmnpqrstvwxyz';

$my_captcha = imagecreatetruecolor($width, $height);
imagefill($my_captcha, 0, 0, 0xFFFFFF);
for ($c = 0; $c < 100; $c++){
	$x = rand(0,$width-1);
	$y = rand(0,$height-1);
	imagesetpixel($my_captcha, $x, $y, 0x000000);
	}
	
$x = rand(1,10);
$y = rand(1,10);

$rand_string = '';
$i = 0;
while ($i < $characters_on_image) 
{ 
    $rand_string .= substr($possible_letters, mt_rand(0, strlen($possible_letters)-1), 1);
    $i++;
}

imagestring($my_captcha, 5, $x, $y, $rand_string, 0x000000);

setcookie("captcha", md5($rand_string), time()+60*60, "/"); // 1 hour

imagejpeg($my_captcha);
imagedestroy($my_captcha);