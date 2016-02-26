<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8" />
	<title>Add Review</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<h3>Add Review</h3>
<?php
session_start ();
?>
<form action="controller.php" method="post" enctype = ”multipart/form-data”>
	<div class="reviews">

		<span class="labels">Review:</span><textarea name="review" cols="60" rows="5" placeholder="Enter new review" required></textarea>
	</div>

	<div class="reviews">
		<span class="labels">Movie Name:</span><input type="text" name="title" size = "40" placeholder="Movie Name" required>
	</div>

	<div class="reviews">
		<span class="labels">Rating (FRESH/ROTTEN):</span><input type="text" name="rating" size = "20" required>
	</div>

	<div class="reviews">
		<span class="labels"></span><input type="submit"  name="submit" value="Add Review">
	</div>

		<div class="reviews">
		<span class="labels"></span><input type="submit"  name="cancel" value="Cancel" onClick="window.location='./index.php';">
	</div>

</form>

</body>
</html>