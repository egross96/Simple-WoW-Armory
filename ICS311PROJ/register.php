<?php
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>

<html>
<head>
<title> Registration</title>
<link rel = "stylesheet" href="css/style.css">
</head>
<body style = "background-color:#2c3e50">

	<div id = "main-wrapper">
	<center><H2>Sign Up </H2>
	<img src="imgs/wow.jpg" class="wow"/>
	
	
	<form class ="myform" action = "register.php" method = "post">
		<label><b>Username</b></label><br>
		<input name = "username" type ="text" class ="inputvalues" placeholder="type your username" required/><br>

		<label><b>Password</b></label><br>
		<input name = "pass" type ="Password" class ="inputvalues" placeholder="type your pw" required/><br>

		<label><b>Confirm password</b></label><br>
		<input name = "cpass" type ="Password" class ="inputvalues" placeholder="confirm your password" required/><br>
		<input name = "submit_btn" type ="submit" id ="signup_btn" value="Sign Up"/><br>
		<a href = "index.php"><input type ="button" id ="back_btn" value="Back to Main Page"/></a>
	</form>
	<?php
		if(isset($_POST['submit_btn']))
		{
			$username = $_POST['username'];
			$password = $_POST['pass'];
			$cpassword = $_POST['cpass'];
			if($password == $cpassword)
			{
				$query = "select * from userinfo where username = '$username'";
				$query_run = mysqli_query($con,$query);

				if(mysqli_num_rows($query_run)>0)
				{

					echo '<script type = "text/javascript"> alert("user already exists, try another")</script>';
				}
				else
				{
					$query = "insert into userinfo values('$username','$password','50')";
					$query_run = mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type = "text/javascript"> alert("user registered")</script>';
					}
					else
					{
						echo '<script type = "text/javascript"> alert("Unsuccessful query")</script>';
					}
				}
			}
			else
			{
				echo '<script type = "text/javascript"> alert("Passwords do not match!")</script>';
			}
		}
	?>
	</center>
	</div>

</body>
</html>