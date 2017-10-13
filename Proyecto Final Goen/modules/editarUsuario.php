<?php 
include_once 'conexion.php';

$cedula = $_POST['ci'];

$con = getConnection();

	if ($con == NULL) {
		// echo "ERROR: No se estableció la conexión";
	} else {
		//$query = "SELECT * FROM datospersonales WHERE datospersonales.cedula = '$cedula'";
		$query = "SELECT * FROM datospersonales JOIN usuario ON datospersonales.id = usuario.id WHERE cedula = '$cedula'";
		$queryUsuario = $con->query($query);

		if ($queryUsuario->num_rows > 0) {
			
			echo json_encode($queryUsuario->fetch_assoc());
		} else {
			echo 'false';
		}
	}

?>