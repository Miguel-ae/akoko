<?php

 // Connect to database
 $conexion = new mysqli("localhost", "root", "", "akoko");

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $findUser = "SELECT * FROM users
 WHERE user = '$_POST[user]' ";

 $result = $conexion->query($findUser);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";

 echo "<a href='register.php'>Por favor escoga otro Nombre</a>";
 }
 else{

 $form_pass = $_POST['password'];
 
 $hash = password_hash($form_pass, PASSWORD_BCRYPT);

 $query = "INSERT INTO users (user, email, password, active, fullname)
           VALUES ('$_POST[user]', '$_POST[email]', '$hash', '$_POST[active]', '$_POST[fullname]')";

 if ($conexion->query($query) === TRUE) {
 
 	header('location: index.php');
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);

?>
