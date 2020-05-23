<?php 

	session_start();


 // Connect to database
 $conexion = new mysqli("localhost", "root", "", "akoko");

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

	// data sent from form login.html 
	$user = $_POST['user']; 
	$password = $_POST['password'];


	// Query sent to database
	$result = mysqli_query($conexion, "SELECT id, email, password, user FROM users WHERE user = '$user'");

	// Variable $row hold the result of the query
	$row = mysqli_fetch_assoc($result);

	// Variable $hash hold the password hash on database
	$hash = $row['password'];

	/* 
	password_Verify() function verify if the password entered by the user
	match the password hash on the database. If everything is OK the session
	is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
	*/
	if (password_verify($_POST['password'], $hash)) {	
		
		$_SESSION['user'] = $row['user'];
		$_SESSION['id_user'] = $row['id'];						
		
		header('location: timer.php');	

	} else {
		header("Location: index.php?error=true");		
	}	



