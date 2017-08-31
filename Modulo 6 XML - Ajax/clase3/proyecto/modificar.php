<?php
	include_once('conexion.php');
?>

<?php
	error_reporting(E_ERROR | E_PARSE); // Desactiva la notificación y warnings de error en php.
	include_once('funciones.php');
	$campoobligado = 0; 
	$errorendato = 0; 
?> 
<!-- calculos.php -->
<!DOCTYPE html>
<html lang="es">
<head><title>Modificar</title>
	<meta charset='UTF-8'>
	<!-- <meta charset='ISO-8859-1'> -->
	<!--<link rel="stylesheet" href="css/estilos.css">-->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="icon" href="image/etech-ico.ico" type="image/x-icon">

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
						if (!isset($_POST['BtnEnviar']))
						{
							$id_trabajador = $_REQUEST['id_trabajador'];
						}else
						{
							$id_trabajador = $_REQUEST['hiddenid_trabajador'];
						}
						
						$querybuscarD = $mysqli->query("SELECT * FROM trabajador where id_trabajador = '$id_trabajador' ") 
						or die ( "<br>No se puede ejecutar query para buscar datos P ". $mysqli->error);


					
						
						

						
						if ( $fila=mysqli_fetch_array($querybuscarD) )
						{
							$nombre= $fila['nombre'];
							$apellido= $fila['apellido'];
							$cedula= $fila['cedula'];
							$correo= $fila['correo'];
							$seleccion2= $fila['status_trabajador'];
							$idcargo = $fila['id_cargo'];
							
						}

						
						

						$querybuscarU = $mysqli->query("SELECT * FROM cargo where id_cargo = '$idcargo' ") 
						or die ( "<br>No se puede ejecutar query para buscar usuario ". $mysqli->error);
						
						if ( $fila=mysqli_fetch_array($querybuscarU) )
						{
							$id_cargo= $fila['id_cargo'];
							$nombre_cargo= $fila['nombre_cargo'];
							
						}
						

						if (isset($_POST['BtnEnviar'])) 
						{
							$id = $_POST['hiddenid'];
							$cedula     = $_POST['hiddenced'];

							$nombre     = $_POST['txtnombre'];
							$apellido   = $_POST['txtapellido'];
							$correo     = $_POST['txtcorreo'];
							//$status_trabajador     = $_POST['txtstatus_trabajador'];
						
							$seleccion1  = $_POST['seleccion_simple1'];
							$seleccion2  = $_POST['seleccion_simple2'];
							echo "$seleccion2";

							/*foreach ($_POST['CheckBox'] as $idh)
							{
								echo "<br>el hobie es: CheckBox$idh ";
							}*/
						}

					?>		
					
					<!-- el Formulario -->
						<form name='miformulario' method='post' action='modificar.php'>
					<fieldset>
						<legend>Formulario </legend>

						<?php
						// Campo Oculto ID
						echo "<input type='hidden' name='hiddenid_trabajador' value='$id_trabajador'>";					
						
						echo "<label>Nombre</label><br>
								<input name='txtnombre' type='text' id='txtnombre' required size='30' maxlength='20' placeholder='ingrese nombre' value='$nombre'>
						";
						?>
						<?php
						// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
						if ( isset($nombre) and ($nombre != '') )
						{
							if ( validaAlfaEsp($nombre) )
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
						echo "<label>Apellido</label><br>	
								<input name='txtapellido' required type='text' id='txtapellido' size='30' maxlength='20' placeholder='ingrese apellido' value='$apellido'>
						";
						?>
						<?php
						// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
						if ( isset($apellido) and ($apellido != '') )
						{
							if ( validaAlfaEsp($apellido) )
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
						echo "<label>Cédula</label><br>	
								<input name='txtcedula' type='text' id='txtcedula' disabled size='30' maxlength='8' placeholder='Ingrese cédula' value='$cedula'>
						";
						// Campo Oculto Cedula
						echo "<input type='hidden' name='hiddenced' value='$cedula'>";	

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

						<?php
						echo "<label>Correo</label><br>
								<input name='txtcorreo' type='email' id='txtcorreo' size='30' required maxlength='80' placeholder='ingrese correo electrónico' value='$correo'>
						";

						// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
						if ( isset($correo) and ($correo != '') )
						{
							if ( validarDirCorreoElec($correo) )
							{
							  //echo $correo;
							}else {
							  echo "<span class='error'>Dato no es v&aacute;lido</span>";
							  $errorendato = 1;
							}
						}
						else
						{
							if ( isset($correo) and ($correo == '') ) { 
							echo "<span class='error'>Campo obligatorio</span>";
							$campoobligado = 1;
							}
						}
						echo "<br><br> ";
						?>
						
							
							<?php
						// cargo
					
						echo	"<label>Cargo Actual <br>";
						if (!isset($_POST['BtnEnviar'])) {
						 	echo "$nombre_cargo";
						 }else{
						 	
						 	$querybuscarCargo4 = $mysqli->query("SELECT * FROM cargo where id_cargo='$seleccion1' ") or die ( "<br>No se puede ejecutar query para buscar Hobies ". $mysqli->error);
						if($fila=mysqli_fetch_array($querybuscarCargo4)){
							$nombrecargo2 = $fila['nombre_cargo'];	
						}
						echo "$nombrecargo2";

						 }echo "</label><br>
								<select style='width:260px' required name='seleccion_simple1'>
								<option value=''>Escoja su opcion</option>";
						// Buscar en la Base de Datos
						$querybuscarCargo = $mysqli->query("SELECT * FROM cargo ") or die ( "<br>No se puede ejecutar query para buscar Hobies ". $mysqli->error);
						while (($fila=mysqli_fetch_array($querybuscarCargo))){
							$id_cargo2 = $fila['id_cargo'];
							$nombre_cargo2 = $fila['nombre_cargo'];

							echo "<option value='$id_cargo2'";
							foreach ($_POST['$nombre_cargo2'] as $idh)
							{
								if ($nombre_cargo2 == $idh) {
									echo "selected ";
								}
							}
							echo " >$nombre_cargo2</option>";
							
						}
								echo "</select> <br>";

							/*
								<option value='Ingeniero' ";
								if ($Seleccion1 == 'Ingeniero')
								{
									echo "selected ";
								}
								echo " >Ingeniero</option>

								</select>;
						*/

						if ( isset($seleccion1) and ($seleccion1 == '') )
						{
							  echo "<span class='error'>Escoja su opcion</span> ";
							  $campoobligado = 1;
						}
						echo "<br><br> ";




						?>
	

						<?php
						// status trabajador
						
						echo	"<label>Status del Trabajador</label><br>
								<select style='width:260px' name='seleccion_simple2'>
								<option value=''>Escoja su opcion</option>
								<option value='Activo' ";
								if ($seleccion2 == 'Activo')
								{
									echo "selected ";
								}
								echo " >Activo</option>
								<option value='Inactivo' ";
								if($seleccion2 == 'Inactivo')
								{
									echo "selected ";
								}
								echo " >Inactivo</option>
								</select> 
								";


						if ( isset($seleccion2) and ($seleccion2 == '') )
						{
							  echo "<span class='error'>escoja su opcion</span> ";
							  $campoobligado = 1;
						}
						echo "<br><br> ";
						

						if (isset($_POST['BtnEnviar'])) 
						{

						$querybuscarCargo3 = $mysqli->query("SELECT * FROM cargo WHERE nombre_cargo='Ninguno'") or die ( "<br>No se puede ejecutar query para buscar Hobies ". $mysqli->error);

							while (($fila=mysqli_fetch_array($querybuscarCargo3))){
							$id_cargo3 = $fila['id_cargo'];
							$nombre_cargo3 = $fila['nombre_cargo'];
								}

				
							if ( $seleccion1 == "$id_cargo3" && $seleccion2 == "Activo" or $seleccion1 != "$id_cargo3" && $seleccion2 == "Inactivo" ) {

								echo "<span class='error'>No puede estar activo sin ningun cargo o inactivo con cargo</span> ";
							 	 $campoobligado = 1;
								
							}
						}
						?>

						
						
						<?php	
						// Boton Enviar
						if ( isset ($_POST['BtnEnviar']) )
						{
								if ( $campoobligado == 1 or $errorendato == 1 )
								{
									echo "<br /><br /><label><input name='BtnEnviar' class='btn btn-success' type='submit' id='BtnEnviar' value='Modificar' /></label>";
								}
								else
								{
									// Modificar en la Base de Datos
								$queryUpdate = $mysqli->query("UPDATE trabajador SET nombre='$nombre', apellido='$apellido', correo='$correo',id_cargo='$seleccion1',status_trabajador='$seleccion2' where id_trabajador='$id_trabajador'") or die ( "<br>No se puede ejecutar query para modificar datos p ". $mysqli->error);

								if ( $queryUpdate)
								{
									echo "<span class='error'><br><br>Datos modificados exitosamente<br><br></span>";
								}

								}
						}
						else
						{
							echo "<br /><br /><label><input name='BtnEnviar' class='btn btn-success' type='submit' id='BtnEnviar' value='Modificar' /></label>";
						}
						?>

					</fieldset>					
					</form>
					
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