<?php 

  // Connect to database
  $db = mysqli_connect('localhost', 'root', '', 'akoko');


 	$id = $_GET['id'];
 	mysqli_query($db, "DELETE FROM task WHERE id='".$id."'");

 	header('location:task.php');



