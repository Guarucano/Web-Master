<?php 
	$mysqli = new mysqli("localhost","root","","urbe");
	if ($mysqli->connect_error)
	 {
		die('ERROR: No se estableció la conexion. '.mysqli_connect_error());
	}else{
		//echo "conexion exitosa";
	}

 ?>