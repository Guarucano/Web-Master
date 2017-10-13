<?php 
include_once 'conexion.php';

$nombre = $_POST['nombre'];
$lastname = $_POST['apellido'];
$ci = $_POST['cedula'];
$genero = $_POST['genero'];
$email = $_POST['email'];
$estado = $_POST['estado'];
$city = $_POST['ciudad'];
$address = $_POST['direccion'];
$cell = $_POST['cod'] . "-" . $_POST['numero'];
$idusuario = $_POST['idoculto'];

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$con = getConnection();

	if ($con == NULL) {
		// echo "ERROR: No se estableció la conexión";
	} else {
		$query = "UPDATE `datospersonales` SET cedula='$ci', nombre='$nombre', apellido='$lastname', genero='$genero', email='$email', telefono='$cell', ciudad='$city', estado='$estado', direccion='$address'  WHERE datospersonales.id='$idusuario'";

		$insertDatos = $con->query($query);

		$query2 = "UPDATE `usuario` SET usuario='$usuario', clave='$password' WHERE usuario.id = '$idusuario'";

		$result2 = $con->query($query2);

		if ($result2) {
			sleep(2);
			echo json_encode($result2);
		}
	}

?>