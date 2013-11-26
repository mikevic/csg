<?php
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$targ_w = $targ_h = 150;
	$jpeg_quality = 90;

	$src = 'demo_files/pool.jpg';
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);

	header('Content-type: image/jpeg');
	imagejpeg($dst_r,null,$jpeg_quality);

	exit;
}
*/
?>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.Jcrop.js"></script>
<link rel="stylesheet" href="demo_files/demos.css" type="text/css" />
<link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />

<script type="text/javascript">

  $(function(){

    $('#cropbox').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

</script>
<style type="text/css">
  #target {
    background-color: #ccc;
    width: 750px;
    height: 750px;
    font-size: 24px;
    display: block;
  }


</style>
    <h2>Crop Image</h2>
    <hr>
		<img src="img/converted-images/<?php echo $_GET['id']; ?>.jpg" id="cropbox" />
		<form action="inc/generate.php" method="post" onsubmit="return checkCoords();">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
      <input type="hidden" id="entry_id" name="entry_id" value="<?php echo $_GET['id']; ?>" />
			<input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />
		</form>';

?>
