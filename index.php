<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8" />
  <title>Rancid Tomatoes</title>
  <link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>

<?php
require_once './model.php';
?>

<h1>Rancid Tomatoes</h1>

  <div id = "searchDiv">
    <form action="movie.php" method="post">
      Search:<input type="text" size="50" name = "search" id = "search">
      <input type="submit" name="Search" value="Search">
      <ul id="results"></ul>
    </form>
    </div>

    <ul id="menu1">
    <li><a href="./register.php">Register</a></li>
    <li><a href="./login.php">Login</a></li>
    </ul>

<?php
session_start ();
$_SESSION ['loginError'] = "";
$_SESSION ['registrationError'] = "";
if (isset ( $_SESSION ['user'] )) {
  ?>
<form action="controller.php" method="post">
    <input type="submit" value="Logout" name="logout" required>
</form>
<ul id="menu2">
    <li><a href="./addReview.php">Add Review</a></li>
    <li><a href="./addMovie.php">Add Movie</a></li>
    </ul>
<?php
}
?>
    <div id = "advertiseMovie">
      <h3>Teenage Mutant Ninja Turtles (2007)</h3>
      <img src="images/tmnt.png" alt="TMNT" height = "400px" width = "400px">
    </div>

<script>
var x = document.querySelector("#search");
x.addEventListener("input", function (e) {
if (x.value.length==0) { 
  document.getElementById("results").innerHTML="";
    return;
  }
  else
  {
  if (window.XMLHttpRequest) {
    var xmlhttp = new XMLHttpRequest();
  } 
  else { 
    var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() 
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
    {
      var  str = "";
      var array = [];
      array =JSON.parse(xmlhttp.responseText);
      for(var thing in array)
        str = str + array[thing] + "<br>";
      document.getElementById("results").innerHTML= str;
    }
  };
  xmlhttp.open("GET","movieSearch.php?q="+x.value,true);
  xmlhttp.send();
}
});
</script>
</body>
</html>