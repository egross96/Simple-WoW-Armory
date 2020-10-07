<?php
	session_start();
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>

<html>
<head>
<title> Search </title>
<link rel = "stylesheet" href="css/style.css">
</head>
<center>
	 <div class="topnav">
 		 	<a href="homepage.php">Home</a>
  		 	<a href="mycharacter.php"> Character Portal</a>
  		 	<a href="rankings.php">Rankings</a>
  		 	<a href="itemstore.php">Store</a>
  		 	<a class="active" href="search.php">Search</a>

		</div> 
</center>

<body style = "background-color:#2c3e50">
	
	<div id = "main-wrapper">

	<center>
	<H2>Welcome to the Search Utility</H2>
	<form class ="myform" action = "search.php" method = "POST">
	<label for="option">Select an option</label>
			<select name = "option">
				<option value="usearch">Search by Username</option>
				<option value="charsearch">Search by Character</option>
			</select><br>
		<input type = "text" name = "search" placeholder="search for a character here"><br>
		<input type ="submit" name = "submit_search" id ="login_btn" value="Search"/>
	</form>
	</center>

	<?php
		


	if(isset($_POST['submit_search']))
	{
		$option = $_POST['option'];
		if ($option == 'usearch')
		{


			$search = $_POST['search'];
			$query = "SELECT * FROM characterinfo where '$search' = owner";
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				while($row = mysqli_fetch_assoc($query_run))
				{
					echo "<center><div class = 'results-box'>
					<p>Character Name: ".$row['name'] ."</p>
					<p>Owner: ".$row['owner'] ."</p>
					<p>Class: ".$row['class'] ."</p>
					<p>Level: ".$row['level'] ."</p>
					<p>Weapon: ".$row['weapon'] ."</p>
					</div></center>";
				}
			}
			else
			{
				echo '<script type = "text/javascript"> alert("no results found")</script>';
			}
		}
		else if ($option =='charsearch')
		{
			$search = $_POST['search'];
			$query = "SELECT * FROM characterinfo where '$search' = name";
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				while($row = mysqli_fetch_assoc($query_run))
				{
					echo "<center><div class = 'results-box'>
					<p>Owner: ".$row['owner'] ."</p>
					<p>Class:".$row['class'] ."</p>
					<p>Level:".$row['level'] ."</p>
					<p>Weapon:".$row['weapon'] ."</p>
					</div></center>";
				}
			
			}
			else
			{
			
				echo '<script type = "text/javascript"> alert("no results found")</script>';
			}
		}
	}
	?>
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