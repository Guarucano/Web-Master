<?php 
	
	$conn = new mysqli("localhost","root","","goen");

	$selecpago = $_POST["id2"];

	$sql = "select * from pagos where idpago = ".$selecpago.";";

	$result = $conn->query($sql);


	$i = 0;
	while ($rs2[$i] = mysqli_fetch_array($result)) {
		$i = $i + 1;
	}

	header("Type: application/json");
	echo json_encode($rs2);

	$conn->close();

 ?>