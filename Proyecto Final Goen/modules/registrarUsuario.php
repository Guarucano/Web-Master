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



$usuario = $_POST['usuario'];
$password = $_POST['password'];
$repassword = $_POST['password2'];

$con = getConnection();

	if ($con == NULL) {
		// echo "ERROR: No se estableció la conexión";
	} else {
		$con->autocommit(FALSE);

		$query = "INSERT INTO `datospersonales`(`cedula`, `nombre`, `apellido`, `genero`, `email`, `telefono`, `ciudad`, `estado`, `direccion`) VALUES ('$ci','$nombre','$lastname','$genero','$email','$cell','$city','$estado','$address')";
		$insertDatos = $con->query($query);

		//echo "<br>ERROR: Insert no fue procesado: " . mysqli_error($con);

		$lastIdQuery = $con->query("SELECT LAST_INSERT_ID() FROM datospersonales");
		$fila = $lastIdQuery->fetch_assoc();
		$lastId = $fila["LAST_INSERT_ID()"];

		//echo "<br>" . $lastId;

		//echo "<br>ERROR: Select no fue procesado: " . mysqli_error($con);

		$query2 = "INSERT INTO `usuario`(`usuario`, `clave`, `id`) VALUES ('$usuario', '$password', '$lastId')";
		//$insertUsuario = $con->query($query2);

		if ($con->query($query2)) {
			//echo "<br>ERROR: Insert no fue procesado: " . mysqli_error($con) . "<br>";
			$con->commit();

			//echo "<br>ERROR: commit no fue procesado: " . mysqli_error($con) . "<br>";
		}
	 include("mailUsuario.php");
	}

?>