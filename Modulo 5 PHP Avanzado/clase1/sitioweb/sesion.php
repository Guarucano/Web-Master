<?php
session_start();

$usuario = $_POST['txtusuario'];
$clave = $_POST['txtclave'];

if( $usuario =='user' && $clave =='1234' )
	{
		header("Location: login.php");
		$_SESSION['autenticado'] = true;
		$_SESSION['usuario'] = $usuario;
	}
	else{
		header("Location: login.php?error=si");
	}
	

	
?>