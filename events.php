<?php
session_start();
?>

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
			calendar(id_user,title,description,color,textColor,start,end)
			VALUES(:id_user,:title,:description,:color,:textColor,:start,:end)");

			$response = $sentenceSQL->execute(array(
				"id_user" =>$_POST['id_user'],
				"title" =>$_POST['title'],
				"description" =>$_POST['description'],
				"color" =>$_POST['color'],
				"textColor" =>$_POST['textColor'],
				"start" =>$_POST['start'],
				"end" =>$_POST['end']
			));
			echo json_encode($response);
		break;

	case 'delete':
		//Instruccion de eliminar
		$response = false;
		if (isset($_POST['id'])) {
			$sentenceSQL = $pdo->prepare("DELETE FROM calendar WHERE `id`=:ID");
			$response = $sentenceSQL->execute(array("ID"=>$_POST['id']));
		}
		echo json_encode($response);
		break;

	case 'edit':
		//Instruccion de modificar
		$sentenceSQL = $pdo->prepare("UPDATE calendar SET
			title=:title,
			description=:description,
			textColor=:textColor,
			start=:start,
			end=:end
			WHERE ID=:ID
			");

		$response = $sentenceSQL->execute(array(
			"ID" =>$_POST['id'],
			"title" =>$_POST['title'],
			"description" =>$_POST['description'],
			"textColor" =>$_POST['textColor'],
			"start" =>$_POST['start'],
			"end" =>$_POST['end']
		));
		echo json_encode($response);

		break;
		case 'editForm':
		//Instruccion de modificar
		$sentenceSQL = $pdo->prepare("UPDATE calendar SET
			title=:title,
			description=:description,
			color=:color,
			textColor=:textColor,
			start=:start,
			end=:end
			WHERE ID=:ID
			");

		$response = $sentenceSQL->execute(array(
			"ID" =>$_POST['id'],
			"title" =>$_POST['title'],
			"description" =>$_POST['description'],
			"color" =>$_POST['color'],
			"textColor" =>$_POST['textColor'],
			"start" =>$_POST['start'],
			"end" =>$_POST['end']
		));
		echo json_encode($response);

		break;
	default:
		//Select events from calendar
		$sentenceSQL= $pdo->prepare("SELECT * FROM calendar WHERE id_user=".$_SESSION['id_user']);
		$sentenceSQL->execute();

		$result= $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
		break;
}





 ?>