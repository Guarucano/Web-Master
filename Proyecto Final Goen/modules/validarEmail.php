<?php 
include_once 'conexion.php';


$email = $_REQUEST['email'];

$con = getConnection();

	if ($con == NULL) {
		// echo "ERROR: No se estableció la conexión";
	} else {
		$query = "SELECT * FROM datospersonales WHERE datospersonales.email = '$email'";
		$queryUsuario = $con->query($query);

		if ($queryUsuario->num_rows > 0) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

?>