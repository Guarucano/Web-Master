<?php 
	
	$conn = new mysqli("localhost","root","","personas");

	$cedula = $_POST["cedula"];

	$sql = "select * from telefonos where Personas_cedula = ".$cedula.";";

	$result = $conn->query($sql);

	$rs = mysqli_fetch_array($result);

	header("Type: application/json");
	echo json_encode($rs);

	$conn->close();

 ?>