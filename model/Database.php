
<?php

/**
 * 
 */
class Database {

	private $server = "localhost";
	private $user = "root";
	private $pass = "";
	private $bbdd = "akoko";

	private $connection;
	private $is_connected = false;


	function __construct(){

		$this->connection = new mysqli( $this->server, $this->user, $this->pass, $this->bbdd );

		if ( !$this->connection->connect_errno ) {
			$this->connection->set_charset("utf8");
			$this->is_connected = true;
		}
		
	}

	function sqlQueryToArray( $consulta ){

		$result = array();
		$result["items"] = array();

		if ( $this->is_connected ) {
			
			$queryResult = $this->connection->query($consulta);

			while ( $fila = $queryResult->fetch_assoc() ) {
				$result["items"][] = $fila;
			}
		} else {
			exit("La conexión ha fallado");
		}

		return $result;
	}


	function query( $consulta ){

		if ( $this->is_connected ) {

			$mysqli = $this->connection;
			
			$mysqli->query($consulta);

		} else {
			exit("La conexión ha fallado");
		}

	}

	function getConnection(){
		return $this->connection;
	}
	


}

