<?php
session_start();
require 'dbconfig/config.php';
?>

<!DOCTYPE html>

<html>
<head>
	<title> Character Page</title>
	<link rel = "stylesheet" href="css/style.css">
</head>
<center>
	<div class="topnav">
		<a href="homepage.php">Home</a>
		<a class="active" href="mycharacter.php"> Character Portal</a>
		<a href="rankings.php">Rankings</a>
		<a href="itemstore.php">Store</a>
		<a href="search.php">Search</a>
		
	</div> 
</center>

<body style = "background-color:#2c3e50">
	<div id = "main-wrapper">
		<center><h2>Welcome to My Character Portal!<br> <h3>Create a Character :</h3></h2><center></center>
		<form class ="myform" action = "mycharacter.php" method = "post">
			
			<select name = "class" required>
				<option selected ="default">Choose a Class</option>
				<option value="druid">Druid</option>
				<option value="warlock">Warlock</option>
				<option value="demonhunter">Demon Hunter</option>
			</select><br>
			
			<select name = "characterweapon" required>
				<option selected="default">Choose a Weapon</option>
				<option value="Axe">Axe</option>
				<option value="Mace">Mace</option>
				<option value="Polearm">Polearm</option>
			</select><br>

			
			<input name = "charactername" type ="text" class ="inputcharclass" placeholder="name"required /><br>
			<button type = "submit" name = "submit">Create Character</button>
		</form>
			<?php
			if(isset($_POST['submit']))
			{
				$class = $_POST['class'];
				$name = $_POST['charactername'];
			
				$weapon = $_POST['characterweapon'];
				$currentuser = $_SESSION['username'];

				$query2 = "select * from characterinfo where name = '$name' ";
				$query_run2 = mysqli_query($con,$query2);

				if(mysqli_num_rows($query_run2)>0)
				{
					
					echo '<script type = "text/javascript"> alert("character name taken, try another")</script>';
				}else
				{
					$query = "insert into characterinfo (class,level,name,weapon,owner) VALUES ('$class',0,'$name','$weapon','$currentuser')";
					$query_run = mysqli_query($con,$query);
					if($query_run)
					{
					echo '<script type = "text/javascript"> alert("character created successfully")</script>';
					}
				}
			}
			
			?>

			
			<div>
			<h3>Delete a Character:</h3>
			<form class ="myform" action = "mycharacter.php" method = "post">
			<p>Enter the name of the character you wish to delete below:</p>
			<input name = "characterdel" type ="text" class ="inputcharclass" placeholder="name" required/><br>
			<button type = "submit" name = "submit2">Delete Character</button>
			</form>
			<?php
			if(isset($_POST['submit2']))
			{
				$name = $_POST['characterdel'];
				$owner = $_SESSION['username'];

				$query3 = "select * from characterinfo where name = '$name' and owner = '$owner' ";
				$query_run3 = mysqli_query($con,$query3);
				if(mysqli_num_rows($query_run3)>0)
				{
					$query4 = "delete from characterinfo where name = '$name'";
					$query_run4= mysqli_query($con,$query4);
					if($query_run4)
					{
						echo '<script type = "text/javascript"> alert("Character Deleted")</script>';
					}
				}
				else
				{
					echo '<script type = "text/javascript"> alert("No Character Found")</script>';
				}

			}

			?>
		</div>
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