<?php
	session_start();
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>

<html>
<head>
<title> Item Store </title>
<link rel = "stylesheet" href="css/style.css">
</head>
<center>
	 <div class="topnav">
 		 	<a href="homepage.php">Home</a>
  		 	<a href="mycharacter.php">Character Portal</a>
  		 	<a href="rankings.php">Rankings</a>
  		 	<a class="active" href="itemstore.php">Store</a>
  		 	<a href="search.php">Search</a>
  		 	  	


		</div> 
	</center>

<body style = "background-color:#2c3e50">
	
	<div id = "main-wrapper">

		<center>
		<h2>Welcome to the Item Store!<br> </h2>
		<h3>Make a Selection for Purchase Below:</h3>
		<form action = "itemstore.php" method = "POST">
		
			<div class = "results-container" >
				<input type="radio" id="demon" name="button" value="glaive" required>
				<img src="imgs/Warglaive.png"/><br>
				<label for="demonkick">Glaive:40 Gold, +20 levels</label><br>
			
			</div>
			<div class = "results-container" >
				<input type="radio" id="demon" name="button" value="staff" required>
				<img src="imgs/staff.png"/><br>
				<label for="demonkick">Staff:25 Gold, +10 Levels</label><br>
			</div>

			<div class = "results-container" >
				<input type="radio" id="demon" name="button" value="sword" required>
				<img src="imgs/sword.png"/><br>
				<label for="demonkick">Sword:30 gold, +15 levels</label><br>
			</div><br>
		
			<?php
			$owner = $_SESSION['username'];
			$query = "select name from characterinfo where owner = '$owner'";
			/*$query_run = mysqli_query($con,$query);*/
			

			echo "<select name='character' value=''>Character</option>"; 
			echo"<option selected ='default' value = 'default'>Select Character</option>";
			foreach ($con->query($query) as $row) {
				echo "<option>$row[name]</option>";
				}
			echo '</select>'
			//$character = $_POST['character'];
			?>

			<input type ="submit" name = "purchase" id ="login_btn" value="Purchase"/>
		</form>

	<?php

	if(isset($_POST['button']))
	{

		$character = $_POST['character'];
		$option = $_POST['button'];
		$owner = $_SESSION['username'];
		$query = "select * from userinfo where username = '$owner'";
		$result = mysqli_query($con,$query);
		$gold = mysqli_fetch_array($result);
		$currency = $gold['gold'];
		

		if($character == 'default'){
				echo '<script type = "text/javascript"> alert("Please select a valid Character")</script>';
		}
		else if ($option == 'glaive')
		{
			
			$valid = $currency -40;
			if ($valid>=0){
				$qupdate = "update userinfo set gold = '$valid' where username = '$owner'";
				$query_run = mysqli_query($con,$qupdate);

				$qupdate2 = "update characterinfo set weapon = 'glaive', level = level +20 where name = '$character'";
				$query_run2 = mysqli_query($con,$qupdate2);
				
				if($query_run){
					echo '<script type = "text/javascript"> alert("Purchase Successful")</script>';
				}

			}
			else
			{
				echo '<script type = "text/javascript"> alert("You do not have the funds!")</script>';
			}
		}
		else if($option == 'staff')
		{
			$valid = $currency -25;
			if ($valid>=0){
				$qupdate = "update userinfo  set gold = '$valid' where username = '$owner'";
				$query_run = mysqli_query($con,$qupdate);

				$qupdate2 = "update characterinfo set weapon = 'staff', level = level +10 where name = '$character'";
				$query_run2 = mysqli_query($con,$qupdate2);
				if($query_run){
					echo '<script type = "text/javascript"> alert("Purchase Successful")</script>';
				}

			}
			else
			{
				echo '<script type = "text/javascript"> alert("You do not have the funds!")</script>';
			}
		}
		else
		{
			$valid = $currency -30;
			if ($valid>=0){
				$qupdate = "update userinfo  set gold = '$valid' where username = '$owner'";
				$query_run = mysqli_query($con,$qupdate);

				$qupdate2 = "update characterinfo set weapon = 'sword', level = level + 15 where name = '$character'";
				$query_run2 = mysqli_query($con,$qupdate2);
				if($query_run){
					echo '<script type = "text/javascript"> alert("Purchase Successful")</script>';
				}

			}
			else
			{
				echo '<script type = "text/javascript"> alert("You do not have the funds!")</script>';
			}
		}
		
	}
	?>
		</center>
			<form class = "myform" action = "homepage.php" method = "post">
		<input align="right" name = "logout_btn" type ="submit" id ="login_btn" value="Log Out"/><br>
		</form>

		<?php
			if(isset($_POST['logout_btn']))
			{
				session_destroy();
				header('location:index.php');
			}
		?>
	</div>
</body>