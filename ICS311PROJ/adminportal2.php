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
<center>
	 <div class="topnav">
	 	<center>
 		 	<a class="active">Admin Portal</a>
  		 
  		 </center>

		</div> 
	</center>
<body style = "background-color:#2c3e50">
	
	<div id = "main-wrapper">
<center>	
<h2>Welcome to the Admin Portal</h2>
<p>Here i have created a convenient way for the website administrator to be able to remove user accounts & characters!</p>
	<form class = "myform" action = "adminportal2.php" method = "post">
			<select name = "option" required>
				<option value ="none" selected disabled hidden>Choose an Option</option>
				<option value="banacc">Delete an account</option>
				<option value="deletechar">Delete a character</option>
		
			</select>
		<input type ="submit" name = "submit_search" value="submit"/>
	</form>
			<?php

			if(isset($_POST['submit_search']))
			{
				$mychoice =$_POST['option'];
			
		
				switch($mychoice)
				{

					// list all the users, choose an account to ban 
					case "banacc":
					header('location:deleteacc.php');
					break;



					case "deletechar":	
					header('location:deletechar.php');

					break;



				}
				}
				
			?>

		

</center>
	<form class = "myform" action = "adminportal2.php" method = "post">
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