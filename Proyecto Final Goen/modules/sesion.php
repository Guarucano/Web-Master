<?php 
include_once 'conexion.php';
session_start();

$usuario = $_POST['usuario'];
$clave = $_POST['password'];

$redirect = NULL;
if(isset($_POST['sender']) && $_POST['sender'] != '') {
    $redirect = $_POST['sender'];
}

$con = getConnection();

$query = "SELECT usuario.idusuario, usuario.id, usuario.rolid, datospersonales.nombre, datospersonales.apellido, datospersonales.email FROM usuario JOIN datospersonales ON usuario.id = datospersonales.id  WHERE usuario = '$usuario' AND clave = '$clave'";
$queryUsuario = $con->query($query);

if ($queryUsuario->num_rows == 1) {
	$_SESSION['autenticado'] = true;
	$_SESSION['usuario'] = $usuario;
	$arrayUsuario = $queryUsuario->fetch_assoc();
	$_SESSION['id'] = $arrayUsuario['id'];
	$_SESSION['idusuario'] = $arrayUsuario["idusuario"];
	$_SESSION['rolid'] = $arrayUsuario["rolid"];
	$_SESSION['nombre'] = $arrayUsuario["nombre"];
	$_SESSION['apellido'] = $arrayUsuario["apellido"];
	$_SESSION['email'] = $arrayUsuario["email"];
	if (isset($redirect)) {
		header("Location:". $redirect);
	} else {
		//header("Location: login.php" . "?&id=" . urlencode($_SESSION['id']) . "&rolid=" . urlencode($_SESSION['rolid']));
		//echo "Sesión iniciada";
		header("Location: ../index.php");
	}
} else {
	header("Location: ../errorenvio.php");
	/*$url = 'login.php?error=si';
	if(isset($redirect)) {
        $url .= '&sender=' . urlencode($redirect);
    }
    header("Location: " . $url);*/
}
?>