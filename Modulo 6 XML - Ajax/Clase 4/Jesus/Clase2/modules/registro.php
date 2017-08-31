<?php 
	//conectar a la base de datos

	$conn = new mysqli("localhost","root","","personas");
	


	//recibir datos desde el formulario

	$cedula = $_REQUEST["cedula"];
	$nombre = $_REQUEST["nombre"];
	$apellido = $_REQUEST["apellido"];
	$profe = $_REQUEST["profe"];
	$fnac = $_REQUEST["fnac"];
	$code = $_REQUEST["coda"];
	$phone = $_REQUEST["telef"];

	//incluir en la base de datos
	$sql = "insert into personas values ($cedula,'$nombre','$apellido','$profe','$fnac');";
	$conn->query($sql);
	$sql = "insert into telefonos values (NULL,'$code','$phone',$cedula);";
	$conn->query($sql);
	
	

	header("Type: application/json");
	echo json_encode("Salu2");

	$conn->close();
	


 ?>