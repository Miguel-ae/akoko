<?php

session_start();

 // Connect to database
 $conexion = new mysqli("localhost", "root", "", "akoko");

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $form_pass = $_POST['password'];
 
 $hash = password_hash($form_pass, PASSWORD_BCRYPT);

 $query = "UPDATE users SET user='$_POST[user]', email='$_POST[email]', password='$hash', fullname='$_POST[fullname]' WHERE user='$_SESSION[user]'";

 if ($conexion->query($query) === TRUE) {
 
 	header('location: logout.php');
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 
 mysqli_close($conexion);

?>
