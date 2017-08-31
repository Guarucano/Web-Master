<!-- crearvariables.php -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Variables en PHP</title>
</head>
<body>
	<?php 
		$Unavariable = "Hola"; //Con "U" Mayuscula
		$unavariable = "Adiós"; //Con "u" minuscula
		echo "El contenido de Unavariable es: ", $Unavariable, "<br>";
		echo "El contenido de unavariable es: ", $unavariable, "<br>";
		$Edad = 30;
		echo "La edad es: ", $Edad, "<br>";
		$Edad = 25;
		echo "Ahora, la edad es: ", $Edad;
	?>
	
</body>
</html>