<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8" />
	<title>Register</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<h3>Register</h3>
<form action="controller.php" method="post">
	<div class="Container">

		<div class="labels">Name&nbsp;:</div>
		<div class="fields">
			<input type="text" id="name" name="name" required>
		</div>

		<div class="labels">Publication&nbsp;:</div>
		<div class="fields">
			<input type="text" id="publication" name="publication" required>
		</div>

		<div class="labels">Username&nbsp;:</div>
		<div class="fields">
			<input type="text" id="username" name="username" pattern="[A-Za-z0-9]*" required>
		</div>

		<div class="labels">Password&nbsp;:</div>
		<div class="fields">
			<input type="password" id="password" name="password" pattern="[A-Za-z0-9]{8,}" required>
		</div>

		<div class="fields">
			<input type="submit" name="register" value="Register">
			<?php
		      session_start ();
		      echo $_SESSION ['registrationError'];
		?>
		</div>
	</div>
</form>
</body>
</html>