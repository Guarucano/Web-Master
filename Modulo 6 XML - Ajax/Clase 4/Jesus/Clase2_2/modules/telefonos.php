<?php 
	
	$conn = new mysqli("localhost","root","","personas");
	
	$cedula = $_REQUEST["telefono"];
	
	$sql = "select * from personas where cedula = ".$cedula.";";
	$query = $conn->query($sql);

	$i = 0;
	while ($rs = mysqli_fetch_array($query)) {
		$vector[$i] = $rs["nombre"]." ".$rs["apellido"];
		$i = $i + 1;
	}

	$conn->close();

	header("Type: application/json");
	echo json_encode($vector);


 ?>