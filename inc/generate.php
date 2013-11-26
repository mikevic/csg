<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';
$entry_id = sanitize($_POST['entry_id']);
$x = sanitize($_POST['x']);
$y = sanitize($_POST['y']);
$w = sanitize($_POST['w']);
$h = sanitize($_POST['h']);

//Create Blank Canvas for cropped image
$cropped_image  = imagecreatetruecolor(750, 750);
$uncropped_image = imagecreatefromjpeg('../img/converted-images/'.$entry_id.'.jpg');

?>