<?php 
	
	$conn = new mysqli("localhost","root","","personas");

	$numero = $_POST["numero"];

	$sql = "select * from telefonos where numero = ".$numero.";";

	$result = $conn->query($sql);

	$rs = mysqli_fetch_array($result);

	header("Type: application/json");
	echo json_encode($rs);

	$conn->close();

 ?>
