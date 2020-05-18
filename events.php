<?php 

header('Content-Type: application/json');
// Connect to database
$pdo = new PDO("mysql:dbname=akoko;host=localhost","root","");


//Almacena en la var $action, de lo contrario el valor será 'read'
$action = (isset($_GET['action']))?$_GET['action']:'read';

switch ($action) {
	case 'add':

		//Instruccion de agregado
		$sentenceSQL = $pdo->prepare("INSERT INTO
			calendar(title,description,color,textColor,start,end)
			VALUES(:title,:description,:color,:textColor,:start,:end)");

			$response = $sentenceSQL->execute(array(

				"title" =>$_POST['title'],
				"description" =>$_POST['description'],
				"color" =>$_POST['color'],
				"textColor" =>$_POST['textColor'],
				"start" =>$_POST['start'],
				"end" =>$_POST['end']
			));
			var_dump($_POST);
			echo json_encode($response);
		break;
	case 'delete':
		//Instruccion de eliminar
		echo 'Instruccion eliminar';
		break;
	case 'edit':
		//Instruccion de modificar
		echo 'Instruccion modificar';
		break;
	default:
		//Select events from calendar
		$sentenceSQL= $pdo->prepare("SELECT * FROM calendar");
		$sentenceSQL->execute();

		$result= $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
		break;
}





 ?>