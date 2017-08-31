<?php 
	
	$conn = new mysqli("localhost","root","","personas");
	
	$cedula = $_REQUEST["cedula"];
	
	$sql = "select * from telefonos where Personas_cedula = ".$cedula.";";
	$query = $conn->query($sql);

	$i = 0;
	while ($rs = mysqli_fetch_array($query)) {
		$vector[$i] = $rs["cod_area"]." - ".$rs["numero"];
		$i = $i + 1;
	}

	$conn->close();

	header("Type: application/json");
	echo json_encode($vector);


 ?>