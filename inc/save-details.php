<?php
require 'dbconnect.inc.php';
require 'functions.inc.php';
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
      $img = $_FILES['file']['tmp_name'];
      $firstName = $_POST['first_name'];
      $lastName = $_POST['last_name'];
      $origin = $_POST['origin'];
      $dest = $_POST['dest'];
      $exp = $_POST['exp'];
      $img_info = getimagesize($img);
      $width = $img_info[0];
      $height = $img_info[1];
      mysql_query("INSERT INTO info (firstName, lastName, ext, origin, dest, exp) VALUES ('$firstName', '$lastName', '$extension', '$origin', '$dest', '$exp')");
      $id = mysql_insert_id();
      switch ($img_info[2]) {
        case IMAGETYPE_GIF  : $src = imagecreatefromgif($img);  break;
        case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($img); break;
        case IMAGETYPE_PNG  : $src = imagecreatefrompng($img);  break;
        default : die("Unknown filetype");
      }
      $tmp = imagecreatetruecolor($width, $height);
      imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width, $height, $width, $height);
      imagejpeg($tmp, '../img/converted-images/'.$id.'.jpg');
      move_uploaded_file($_FILES["file"]["tmp_name"],"../img/uploaded-images/" . $id . '.'. $extension);
      header('Location: ../step2.php?id='.$id);
    }
  }
else
  {
  echo "Invalid file";
  }
?>