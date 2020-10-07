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
<h2>Welcome to Delete Account Portal</h2>
<?php
		$query = "select username from userinfo where username != 'admin'";
		echo '<form action ="" method = "POST">';
		echo "<select name='account' value=''>Account</option>"; 
		echo"<option selected ='default' value = 'default'>Select Account</option>";

		foreach ($con->query($query) as $row) {
			echo "<option>$row[username]</option>";
		}
		echo "</select>";
		
		echo'<input type ="submit" name = "delete" value="delete"/></form>';
	
		if(isset($_POST['delete']))
		{
		
			$account = $_POST['account'];
			$query = "delete from userinfo where username = '$account'";
			$query2 = "delete from chracterinfo where owner = '$account'";
			$query_run = mysqli_query($con,$query);
			$query_run2 = mysqli_query($con,$query2);
			if($query_run){
					echo '<script type = "text/javascript"> alert("Account & all Characters Deleted")</script>';
					//refresh so result is removed
					$page = $_SERVER['PHP_SELF'];
					echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
			}
			
		}
	?>

</center>
	<form class = "myform" action = ""method = "post">
		<input name = "back" type ="submit" id ="login_btn" value="Back"/><br>
	</form>

	<?php
		if(isset($_POST['back']))
		{
			
			header('location:adminportal2.php');
		}
	?>
</div>
</div>
</body>
</html>