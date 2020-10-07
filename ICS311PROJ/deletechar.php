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
<h2>Welcome to Delete Account</h2>
<?php
		$query = "select name from characterinfo";
		echo '<form action ="" method = "POST">';
		echo "<select name='character' value=''>character</option>"; 
		echo"<option selected ='default' value = 'default'>Select character</option>";

		foreach ($con->query($query) as $row) {
			echo "<option>$row[name]</option>";
		}
		echo "</select>";
		
		echo'<input type ="submit" name = "delete" value="delete"/></form>';
	
		if(isset($_POST['delete']))
		{
		
			$character = $_POST['character'];
			$query = "delete from characterinfo where name = '$character'";
			$query_run = mysqli_query($con,$query);
			if($query_run){
					echo '<script type = "text/javascript"> alert("'.$character.' Deleted")</script>';

					$page = $_SERVER['PHP_SELF'];
					echo '<meta http-equiv="Refresh" content="0;' . $page . '">';

			}

			
		}
	?>

</center>
	<form class = "myform" action = "" method = "post">
		<input name = "Back" type ="submit" id ="login_btn" value="Back"/><br>
	</form>

	<?php
		if(isset($_POST['Back']))
		{
			header('location:adminportal2.php');
		}
	?>
</div>
</div>
</body>
</html>