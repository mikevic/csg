<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';
$entry_id = sanitize($_POST['entry_id']);
$x = sanitize($_POST['x']);
$y = sanitize($_POST['y']);
$w = sanitize($_POST['w']);
$h = sanitize($_POST['h']);

//Cropping Image
$targ_w = $targ_h = 750;
$jpeg_quality =99;
$cropped_image  = imagecreatetruecolor(750, 750);
$uncropped_image = imagecreatefromjpeg('../img/converted-images/'.$entry_id.'.jpg');
imagecopyresampled($cropped_image ,$uncropped_image,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);
imagejpeg($cropped_image, '../img/cropped-images/'.$entry_id.'.jpg');

//Generating Case Study
$case_study_image = imagecreatetruecolor(750, 750);
$source_image = imagecreatefrompng('../img/source_image.png');
imagecopy($case_study_image, $cropped_image, 0, 0, 0, 0, 750, 750);
imagecopy($case_study_image, $source_image, 0, 0, 0, 0, 750, 750);


//Saving Case Study Image
imagejpeg($case_study_image, '../img/generated-images/'.$entry_id.'.jpg');
?>