<?php

require './model.php';

if (isset ( $_POST ['username'] ) && isset ( $_POST ['password'] )) {
	$username = $_POST ['username'];
	$password = $_POST ['password'];
	session_start ();
		if (isset ( $_POST ['login'] )) {
		if ($myDB->verified ( $username, $password )) {
			// Store Session Data
			$_SESSION ['user'] = $username;
			header ( "Location: ./index.php" );
		} 
		else {
			$_SESSION ['loginError'] = 'Invalid Username/Password';
			header ( "Location: ./login.php" );
		}
	} 
	else if (isset ( $_POST ['register'] )) {
		$name = $_POST ['name'];
		$publication = $_POST ['publication'];
		if ($myDB->canRegister ( $username)) {
			$myDB->register ( $username, $password, $name, $publication);
			header ( "Location: ./index.php" );
			session_start (); // to ensure you are using same session
			session_destroy (); // destroy the session so $SESSION['anything'] is not set
		} 
		else {
			$_SESSION ['registrationError'] = 'Username already exists';
			header ( "Location: ./register.php" );
		}
		
	}
} 
else if (isset ( $_POST ['logout'] )) {
	session_start (); // to ensure you are using same session
	session_destroy (); // destroy the session so $SESSION['anything'] is not set
	header ( "Location: index.php" );
} 
else if (isset ( $_POST ['review'] ) && isset ( $_POST ['title'] ) && isset ( $_POST ['rating'] )) {
	$review = $_POST ['review'];
	$title = $_POST ['title'];
	$rating = $_POST['rating'];
	session_start();
	$_SESSION['title'] = $_POST ['title'];
	$myDB->addNewReview ($review, $title, $rating, $_SESSION['user']);
	$myDB->changeRating($title);
	header ( "Location: ./movie.php" );
}
else if (isset ( $_POST ['title'] ) && isset ( $_POST ['director'] ) && isset ( $_POST ['rating'] ) && isset ( $_POST ['year'] ) && isset ( $_POST ['runtime'] ) && isset ( $_POST ['boxoffice'] ) && isset ($_POST ['imagefile'] )) {
	$title = $_POST ['title'];
	$director = $_POST ['director'];
	$rating = $_POST['rating'];
	$year = $_POST ['year'];
	$runtime = $_POST ['runtime'];
	$boxoffice = $_POST['boxoffice'];
	$imagefile = $_POST['imagefile'];
	session_start();
	$_SESSION['title'] = $_POST['title'];
	$myDB->addNewMovie ($title, $director, $rating, $year, $runtime, $boxoffice, $imagefile);
	header ( "Location: ./movie.php" );
}
?>