<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>Enter Details</h2>
	<form name="photo" id="photo" enctype="multipart/form-data" action="inc/save-details.php" method="post">
	First Name : <input type="text" name="first_name"><br>
	Last Name : <input type="text" name="last_name"><br>
	Where are you from : <input type="text" name="origin"><br />
	Which city in India did you go to : <input type="text" name="dest"><br />
	Describe your internship experience in 10-20 words : <br><textarea name="exp" form="photo"></textarea><br />
	Photo <input type="file" name="file" size="30" /><br>
	<input type="submit" name="upload" value="Upload" />
	</form>

</body>
</html>
