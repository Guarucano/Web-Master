<?php 
include_once 'conexion.php';

$usuario = $_REQUEST['usuario'];

$con = getConnection();

	if ($con == NULL) {
		// echo "ERROR: No se estableció la conexión";
	} else {
		$query = "SELECT * FROM usuario WHERE usuario.usuario = '$usuario'";
		$queryUsuario = $con->query($query);

		if ($queryUsuario->num_rows > 0) {
			echo 'true';
		} else {
			echo 'false';
		}
	}

?>