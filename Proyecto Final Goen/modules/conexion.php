<?php 
	function getConnection() {
	$bd_host = "localhost";
	$bd_user = "root";
	$bd_pass = "";
	$bd_name = "goen";

	$mysqli = new mysqli($bd_host, $bd_user, $bd_pass, $bd_name);

	if ($mysqli->connect_error) {
		die('ERROR: No se estableció la conexión ' . mysqli_connect_error() );
	}
		$mysqli->set_charset("utf8");
		return $mysqli;
	}
?>