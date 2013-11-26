<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';
$entry_id = sanitize($_POST['entry_id']);
$x = sanitize($_POST['x']);
$y = sanitize($_POST['y']);
$w = sanitize($_POST['w']);
$h = sanitize($_POST['h']);

//Create Blank Canvas for cropped image
$targ_w = $targ_h = 750;
$jpeg_quality =99;
$cropped_image  = imagecreatetruecolor(750, 750);
$uncropped_image = imagecreatefromjpeg('../img/converted-images/'.$entry_id.'.jpg');
imagecopyresampled($cropped_image ,$uncropped_image,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);
imagejpeg($cropped_image, '../img/cropped-images/'.$entry_id.'.jpg');

?>