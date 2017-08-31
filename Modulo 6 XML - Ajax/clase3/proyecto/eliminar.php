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
<head><title>Eliminar</title>
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
							$status_bd = $fila['status_bd'];
							
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

							
						}

					?>		
					
					<!-- el Formulario -->
						<form name='miformulario' method='post' action='eliminar.php'>
					<fieldset>
						<legend>Formulario </legend>

						<?php
						// Campo Oculto ID
						echo "<input type='hidden' name='hiddenid_trabajador' value='$id_trabajador'>";					
						
						echo "<label>Nombre</label><br>
								<input name='txtnombre' type='text' id='txtnombre' disabled size='30' maxlength='20' placeholder='ingrese nombre' value='$nombre'>
						";
						
						
						
						echo "<br><br> ";
						
						echo "<label>Apellido</label><br>
								<input name='txtapellido' type='text' id='txtapellido' disabled size='30' maxlength='20' placeholder='ingrese apellido' value='$apellido'>
						";
						
						
						
						echo "<br><br> ";
						
						echo "<label>Cédula</label><br>
								<input name='txtcedula' type='text' id='txtcedula' disabled size='30' maxlength='8' placeholder='ingrese cédula' value='$cedula'>
						";
						// Campo Oculto Cedula
						echo "<input type='hidden' name='hiddenced' value='$cedula'>";	

						
						
						echo "<br><br> ";
						
						echo "<label>Correo</label><br>
								<input name='txtcorreo' type='email' disabled id='txtcorreo' size='30' maxlength='80' placeholder='ingrese correo electrónico' value='$correo'>
						";

						
						
						echo "<br><br> ";
						
						// cargo
					
						echo	"<label>Cargo Actual</label><br>
								<input type='text' disabled size='30' maxlength='8' ";
						if (isset($_POST['BtnEnviar'])) {
						 	echo ">";
						 }else{
						 	echo "value=$nombre_cargo>";
						 }

						echo "<br><br>";

						// status trabajador
						
						echo	"<label>Status del Trabajador</label><br>
						<input  type='text' disabled size='30' maxlength='8' value='$seleccion2'>";

						// Boton Enviar
						if ( isset ($_POST['BtnEnviar']) )
						{
								if ( $campoobligado == 1 or $errorendato == 1 )
								{
									echo "<br /><br /><label><input name='BtnEnviar' type='submit' id='BtnEnviar' class='btn btn-danger' value='Eliminar' /></label>";
								}
								else
								{
									// Modificar en la Base de Datos
								$queryUpdate = $mysqli->query("UPDATE trabajador SET status_bd='Eliminado'where id_trabajador='$id_trabajador'") or die ( "<br>No se puede ejecutar query para modificar datos p ". $mysqli->error);

								if ( $queryUpdate)
								{
									echo "<span class='error'><br><br>Datos eliminados exitosamente<br><br></span>";
								}

								}
						}
						else
						{
							echo "<br /><br /><label><input name='BtnEnviar' type='submit' id='BtnEnviar' class='btn btn-danger' value='Eliminar' /></label>";
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