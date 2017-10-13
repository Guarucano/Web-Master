<?php 
	
	$conn = new mysqli("localhost","root","","goen");

	$idusuario = $_POST["id"];

	$sql = "select * from pagos where idusuario = ".$idusuario." and pagoconfirmado = 0;";

	$result = $conn->query($sql);


	$i = 0;
	while ($rs[$i] = mysqli_fetch_array($result)) {
		$i = $i + 1;
	}

	header("Type: application/json");
	echo json_encode($rs);

	$conn->close();

 ?>