<?php
	session_start();
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>

<html>
<head>
<title> Ranks</title>
<link rel = "stylesheet" href="css/style.css">
</head>
<center>
	 <div class="topnav">
 		   	<a href="homepage.php">Home</a>
  		 	<a href="mycharacter.php">Character Portal</a>
  		 	<a class="active" href="rankings.php">Rankings</a>
  		 	<a href="itemstore.php">Store</a>
  		 	<a href="search.php">Search</a>
       
		</div> 
	</center>

<body style = "background-color:#2c3e50">
	
	<div id = "main-wrapper">
<center><h2>Welcome to the Character Rankings Page!</h2></center>

<?php

  $query = "select * from characterinfo order by level desc";
  //$query_run = mysqli_query($con,$query);

  echo '<table border="0" cellspacing="2" cellpadding="2"> 
        <tr> <thead>
            <td> <font face="Arial"><b>Owner</b></font> </td> 
            <td> <font face="Arial"><b>Character</b></font> </td> 
            <td> <font face="Arial"><b>Class</b></font> </td> 
            <td> <font face="Arial"><b>Level</b></font> </td> 
            <td> <font face="Arial"><b>Weapon</b></font> </td> 
            </thead>
        </tr>';
   
  if ($result = $con->query($query)) {
      while ($row = $result->fetch_assoc()) {
          $field1name = $row["owner"];
          $field2name = $row["name"];
          $field3name = $row["class"];
          $field4name = $row["level"];
          $field5name = $row["weapon"]; 
   
          echo '<center>
          		<tr> 
                    <td>'.$field1name.'</td> 
                    <td>'.$field2name.'</td> 
                    <td>'.$field3name.'</td> 
                    <td>'.$field4name.'</td> 
                    <td>'.$field5name.'</td> 
                	</tr>
               </center>
                ';
      }
      $result->free();
  } 
?>
  <form class = "myform" action = "rankings.php" method = "post">
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


</body>

</html>


