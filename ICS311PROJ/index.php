<?php
	session_start();
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>

<html>
<head>
<title> Home</title>
<link rel = "stylesheet" href="css/style.css">
</head>
<body style = "background-color:#2c3e50">

	<div id = "main-wrapper">
	<center><H2>Login Form</H2>
	<img src="imgs/wow.jpg" class="wow"/>
	
	
	<form class ="myform" action = "index.php" method = "post">
		<label><b>Username</b></label><br>
		<input name = "username" type ="text" class ="inputvalues" placeholder="type your username"/><br>

		<label><b>Password</b></label><br>
		<input name = "password" type ="Password" class ="inputvalues" placeholder="type your pw"/><br>
		<input name = "login_btn" type ="submit" id ="login_btn" value="login"/><br>
		<a href = "register.php"><input type ="button" id ="register_btn" value="Not a member? Register now!"/></a><br>
	</form>
		<?php

		if(isset($_POST['login_btn']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			//$valid = 'admin';
			$query = "select * from userinfo where username = '$username' and password = '$password'";
			$query_run = mysqli_query($con,$query);
	
			if(mysqli_num_rows($query_run)>0)
				{
				
			
					echo $username;
					if ($username == 'admin'){
						
						$_SESSION['username'] = $username;
						header('location:adminportal2.php');

					}
					else
					{
				
						$_SESSION['username'] = $username;
						header('location:homepage.php');

					}
				
				
				}
			else
				{
					echo '<script type = "text/javascript"> alert("Invalid username or PW")</script>';
				}
		}
		?>
	
	</center>
	</div>

</body>
</html>