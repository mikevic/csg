<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';
$entry_id = sanitize($_POST['entry_id']);
$x = sanitize($_POST['x']);
$y = sanitize($_POST['y']);
$w = sanitize($_POST['w']);
$h = sanitize($_POST['h']);

$result = mysql_query("SELECT * from info WHERE id = $entry_id");
$data = mysql_fetch_assoc($result);

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

//fonts
$font_alexBrush = '../fonts/AlexBrush-Regular.ttf';
$font_bebasNeue = '../fonts/BebasNeue.ttf';
$font_homizio = '../fonts/bold.ttf';

//Text Colour
$textCol = imagecolorallocate($case_study_image, 255, 255, 255); // Create a white colour

//Writing Name of EP
$name_posY = 400;
$name_posX = 490;
imagettftext($case_study_image, 25, 0, $name_posX, $name_posY, $textCol, $font_bebasNeue, $data['firstName'].' '.$data['lastName']);

//Writing Origin
$origin_from_posY = 430;
$origin_from_posX = 490;
$origin_name_posX = 540;
$origin_from_posY = 440;
imagettftext($case_study_image, 20, 0, $origin_from_posX, $origin_from_posY, $textCol, $font_alexBrush, 'from ');
imagettftext($case_study_image, 16, 0, $origin_name_posX, $origin_from_posY, $textCol, $font_homizio, $data['origin']);

//Writing Destination 
$dest_to_posY = 460;
$dest_to_posX = 540;
$dest_name_posX = 560;
$dest_name_posY = 460;
imagettftext($case_study_image, 20, 0, $dest_to_posX, $dest_to_posY, $textCol, $font_alexBrush, 'in ');
imagettftext($case_study_image, 16, 0, $dest_name_posX, $dest_name_posY, $textCol, $font_homizio, $data['dest']);

//Writing Experience
$text = $data['exp'];
$y = 350;
	
//Splitting into paragraphs
$paras = explode("\n", $text);

foreach ($paras as $para)
{
	//Splitting into Lines
	$lines = explode('|', wordwrap($para, 45, '|'));
	foreach ($lines as $line)
	{
		imagettftext($case_study_image, 16, 0, 10, $y, $textCol, $font_homizio, stripslashes($line));
		// Increment Y so the next line is below the previous line
		$y += 25;
	}
}

//Saving Case Study Image
imagejpeg($case_study_image, '../img/generated-images/'.$entry_id.'.jpg');

header('Location: ../display.php?id='.$entry_id);
?>