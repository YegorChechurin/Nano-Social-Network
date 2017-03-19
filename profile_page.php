<?php
  /* We are checking whether the user is logged in */
  session_start();
  if (empty($_SESSION['logged_in']) or $_SESSION['logged_in'] == 0):
     header('Location: log_in.php'); endif;
?>

<!DOCTYPE html>
<html> 

<head>
  <meta charset="UTF-8">
  <title>My profile</title>
</head>

<body>

  <div><h1>My profile</h1></div>
  
  <div>
    <h2>Available options:</h2> 
	<p><a href="log_out.php">Log out</a></p>
	<p>Nano Social Network list of all the other members is <a href="inventory_view.php">here</a></p>
  </div>


</body>

</html>