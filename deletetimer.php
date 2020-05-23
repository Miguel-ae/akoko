<?php 

  // Connect to database
  $db = mysqli_connect('localhost', 'root', '', 'akoko');


 	$id = $_GET['id'];
 	mysqli_query($db, "DELETE FROM timer WHERE id='".$id."'");

 	header('location:timer.php');




