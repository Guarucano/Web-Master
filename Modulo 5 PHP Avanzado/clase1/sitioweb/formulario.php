<?php
	error_reporting(E_ERROR | E_PARSE); // Desactiva la notificación y warnings de error en php.
	
	include_once('funciones.php');
	include_once('conexion.php');
	$campoobligado = 0; 
	$errorendato = 0; 
?>
<!-- calculos.php -->
<!DOCTYPE html>
<html lang="es">
<head><title>Formulario</title>
	<meta charset='UTF-8'>
	<!-- <meta charset='ISO-8859-1'> -->
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="icon" href="image/favicon.ico" type="image/x-icon">

</head>
<body>
	<div id="caja_principal">
		<header id="cabecera">
			<div id='caja1'>
				<?php
					include_once('cabecera.php'); // llamado a la pagina
				?>
			</div>
		</header>
		
		<nav id="navmenu">
			<?php
				include_once('menu.php'); // llamado a la pagina
			?>
		</nav>
	
		<section id="area_principal">
			<div id="caja2">
				<article>
<?php
		$cedula=$_POST['txtcedula'];
		$nombre=$_POST['txtnombre'];
		$apellido=$_POST['txtapellido'];
		$RadOpcion=$_POST['RadOpcion'];
		$CheckBox1 = $_POST['CheckBox1'];
		$CheckBox2 = $_POST['CheckBox2'];
		$CheckBox3 = $_POST['CheckBox3'];
		$Selecion = $_POST['selecion_simple'];
		$fechanac=$_POST['txtfechanac'];
		$correo=$_POST['txtcorreo'];
		
		//echo "Su nombre es: $nombre";
?>		
					
<!-- el Formulario -->
<fieldset>
	<legend>Formulario </legend>
	<form name='miformulario' method='post' action='formulario.php'>
	
	<?php

	<?php
	echo "<label>Apellido :
  			<input name='txtcedula' type='text' id='txtcedula' size='30' maxlength='20' placeholder='ingrese cedula' value='$cedula'>
	</label>";
	?>
	<?php
	// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
	if ( isset($cedula) and ($cedula != '') )
	{
		if ( validaEntero($cedula) )
		{
		  //echo $cedula;
		}else {
		  echo "<span class='error'>Dato no es v&aacute;lido</span>";
		  $errorendato = 1;
		}
    }
	else
	{
		if ( isset($cedula) and ($cedula == '') ) { 
    	echo "<span class='error'>Campo obligatorio</span>";
		$campoobligado = 1;
		}
	}
	echo "<br><br> ";
	?>


	echo "<label>Nombre :
  			<input name='txtnombre' type='text' id='txtnombre' size='30' maxlength='20' placeholder='ingrese nombre' value='$nombre'>
	</label>";
	?>
	<?php
	// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
	if ( isset($nombre) and ($nombre != '') )
	{
		if ( validaAlfa($nombre) )
		{
		  //echo $nombre;
		}else {
		  echo "<span class='error'>Dato no es v&aacute;lido</span>";
		  $errorendato = 1;
		}
    }
	else
	{
		if ( isset($nombre) and ($nombre == '') ) { 
    	echo "<span class='error'>Campo obligatorio</span>";
		$campoobligado = 1;
		}
	}
	echo "<br><br> ";
	?>
	
	<?php
	echo "<label>Apellido :
  			<input name='txtapellido' type='text' id='txtapellido' size='30' maxlength='20' placeholder='ingrese apellido' value='$apellido'>
	</label>";
	?>
	<?php
	// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
	if ( isset($apellido) and ($apellido != '') )
	{
		if ( validaAlfa($apellido) )
		{
		  //echo $apellido;
		}else {
		  echo "<span class='error'>Dato no es v&aacute;lido</span>";
		  $errorendato = 1;
		}
    }
	else
	{
		if ( isset($apellido) and ($apellido == '') ) { 
    	echo "<span class='error'>Campo obligatorio</span>";
		$campoobligado = 1;
		}
	}
	echo "<br><br> ";
	?>
		
	<?php
	// Validacion de Radiobox
	 echo "<label>Genero : </label> ";  
	 	
	 	echo "<input name='RadOpcion' type='radio' id='RadOpcion' value='F' ";
	 		if($RadOpcion === 'F')
			{
        	  echo "checked ";
    		}
			echo " /> Femenino";
		
	 	echo "<input name='RadOpcion' type='radio' id='RadOpcion' value='M' ";
	 		if($RadOpcion === 'M')
			{
        	  echo "checked ";
    		}
			echo " /> Masculino";

		echo "<br /><br /> ";
		
	?>	
	
	
		<?php
	 // Validar Checkbok en Php
	 echo	"<label>Hobies : </label> <br />  ";

	 	echo "Nadar: <input name='CheckBox1' type='checkbox' value='CheckBox1' ";
	 		if($CheckBox1 == 'CheckBox1')
			{
        	   echo "checked ";
    		}
			echo " ><br>";

	 	echo "Caminar: <input name='CheckBox2' type='checkbox' value='CheckBox2' ";
	 		if($CheckBox2 == 'CheckBox2')
			{
        	   echo "checked ";
    		}
			echo " ><br>";

	 	echo "Dormir: <input name='CheckBox3' type='checkbox' value='CheckBox3' ";
	 		if($CheckBox3 == 'CheckBox3')
			{
        	   echo "checked ";
    		}
			echo " ><br>";		
	?>
		<?php
	// Validad Seleccion en Php
	
	echo	"<label><br />Estado Civil : </label> <br />
			<select name='selecion_simple'>
			<option value=''>escoja su opcion</option>
			<option value='primera' ";
			if ($Selecion == 'primera')
			{
				echo "selected ";
			}
			echo " >Soltero</option>
			<option value='segunda' ";
			if($Selecion == 'segunda')
			{
				echo "selected ";
			}
			echo " >Casado</option>
			<option value='tercera' ";
			if($Selecion == 'tercera')
			{
				echo "selected ";
			}
			echo " >Otros</option>
			</select> 
			";

	if ( isset($Selecion) and ($Selecion == '') )
	{
		  echo "<span class='error'>escoja su opcion</span> ";
		  $campoobligado = 1;
	}

	?>
		 
	<?php	
	// Boton Enviar
	if (isset($_POST['BtnEnviar'])) {
		if ($campoobligado == 1 or $errorendato==1)
		{
			 echo "<br /><br /><label><input name='BtnEnviar' type='submit' id='BtnEnviar' value='Enviar' /></label>";
		}
		else
		{
			//Insertar en la base de datos
			$queryInsertar = $mysqli->query("INSERT INTO datospersonales(id,nombre,apellido,genero,edocivil)VALUES(NULL,'$nombre','$apellido','$RadOpcion','$Selecion')");
			if ($queryInsertar) {
				echo "<span class='error'><br><br>Datos registrados exitosamente<br><br></span>";
			}
			else
			{
				die('ERROR: No se puede ejecutar query para insertar datos.'.$mysqli->error);
			}
		}
	}
	else
	{
		 echo "<br /><br /><label><input name='BtnEnviar' type='submit' id='BtnEnviar' value='Enviar' /></label>";
	}
   
	?>
</form>

</fieldset>				
					
					
					
				</article>
			</div>
		</section>
		<footer id="pie">
			<?php
				include_once('pie.php'); // llamado a la pagina
			?>
		</footer>
	<div>
</body>
</html>