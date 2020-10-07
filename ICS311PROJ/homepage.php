<?php

	session_start();
?>

<!DOCTYPE html>

<html>
<head>
<title> Home</title>
<link rel = "stylesheet" href="css/style.css">
</head>
<center>
	 <div class="topnav">
 		 	<a class="active" href="homepage.php">Home</a>
  		 	<a href="mycharacter.php"> Character Portal</a>
  		 	<a href="rankings.php">Rankings</a>
  		 	<a href="itemstore.php">Store</a>
  		 	<a href="search.php">Search</a>
  		


		</div> 
	</center>
<body style = "background-color:#2c3e50">
	
	<div id = "main-wrapper">
		<div style="background-image:imgs/ragnaros.jpg">

	<center>
	<H2>Welcome to the Homepage</H2>
	<img src="imgs/wow.jpg" class="wow"/><br>
	</center>
	<p>This application is a mock version of some of the features present in one of my favorite games, World of Warcraft. Here you will be able to create your own character from 3 different classes (druid, warlock, demon hunter). When you create a character you will have the option to add equipment which will boost its level, but this equipment costs gold and the default account will only start out with 50 gold. Additionally after creating a character you will have the ability to look up your characters (and others) either by account name or character name. And finally, there is a convenient rankings page which will display the characters from the highest level to the lowest level. Welcome to the World of Warcraft lite!</p>
	<form class = "myform" action = "homepage.php" method = "post">
		<input name = "logout_btn" type ="submit" id ="login_btn" value="Log Out"/><br>
	</form>

	<?php
		if(isset($_POST['logout_btn']))
		{
			session_destroy();
			header('location:index.php');
		}
	?>
</div>
</div>
</body>
</html>