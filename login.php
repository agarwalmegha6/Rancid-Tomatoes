<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8" />
	<title>Login</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<h3>Login</h3>
<form action="controller.php" method="post">
	<div class="Container">
		<div class="labels">Username&nbsp;</div>
		<div class="fields">
			<input type="text" value="" id="username" name="username" pattern="[A-Za-z0-9]*" required>
		</div>

		<div class="labels">Password&nbsp;</div>
		<div class="fields">
			<input type="password" value="" id="password" name="password" pattern="[A-Za-z0-9]{8,}" required>
		</div>
		<div class="fields">
			<input type="submit" name="login" value="Login"> <br> <br>
			<?php
		      session_start ();
		      echo $_SESSION ['loginError'];
		?>
		</div>

	
	</div>
</form>
</body>
</html>