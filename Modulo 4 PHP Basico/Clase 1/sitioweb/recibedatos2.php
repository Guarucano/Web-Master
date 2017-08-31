<!-- recibedatos.php -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recepcion de datos</title>
</head>
<body>
	<?php 
		$Nombre = $_POST["txtnombre"];
		$Apellido = $_POST["txtapellido"];
		echo "<hr><br>";
		echo "El <b>nombre</b> recibido desde el formulario es: ";
		echo "<b>", $Nombre,"</b><br>";
		echo "El <b>Apellido</b> recibido desde el formulario es: ";
		echo "<b>", $Apellido,"</b>";
		echo "<br><br><hr>";
	?>
	
</body>
</html>