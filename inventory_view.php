<?php
  /* We are checking whether the user is logged in */
    session_start();
    if (empty($_SESSION['logged_in']) or $_SESSION['logged_in'] == 0):
       header('Location: log_in.php'); endif;
	 
  /* Link to go back to profile page */	 
    echo '<a href="profile_page.php">My Profile</a>'."<br>";
	 
  /* Connecting to our database */
	try{
		$dsn = "mysql:dbname=my_sn;host=localhost";
		$user="root";
		$password="technologka180";
	    $conn = new PDO($dsn,$user,$password);}
	catch (PDOException $e){
		echo 'Connection failed: ' . $e->getMessage();
	}	
	
  /* Collecting all the data submitted by user */
	$user_id = $_SESSION['user_id'];
	
  /* Retrieving all the other members from the database */
	$query = "SELECT name,username,email FROM users WHERE user_id<>:user_id";
    $prep = $conn->prepare($query);
	$prep->bindParam(':user_id', $user_id);
	$select = $prep->execute();
	$result = $prep->fetchAll();
	
  /* Displaying all the other members */
	echo '<h1>Complete list of all the memebers (except you):</h1>';
	
	$parameters = ['name', 'username', 'email'];
	foreach($result as $user){
		foreach($parameters as $i){
			echo $user[$i]."<br>";
		}
		echo "<br>";
	}
		 
?>