<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8" />
	<title>Add Movie</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<h3>Add Movie</h3>
<?php
session_start ();
?>
<form action="controller.php" method="post">
	<div class="movie">
		<span class="labels">Movie Name:</span><input type="text" name="title" placeholder="Movie Name" required>
	</div>

	<div class="movie">
		<span class="labels">Director:</span><input type="text" name="director" required>
	</div>

	<div class="movie">
		<span class="labels">Rating:</span><input type="text" name="rating" required>
	</div>

	<div class="movie">
		<span class="labels">Year Released:</span><input type="text" name="year" required>
	</div>

	<div class="movie">
		<span class="labels">Runtime (in minutes):</span><input type="text" name="runtime" required>
	</div>

	<div class="movie">
		<span class="labels">Box Office Total:</span><input type="text" name="boxoffice" required>
	</div>

	<div class="movie">
		<span class="labels">Image File Name:</span><input type="text" name="imagefile" required>
	</div>

	<div class="movie">
		<span class="labels"></span><input type="submit"  name="submit" value="Add Movie">
	</div>
</form>
</body>
</html>