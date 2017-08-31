<?php
	include_once('conexion.php');
?>

<?php
	error_reporting(E_ERROR | E_PARSE); // Desactiva la notificación y warnings de error en php.
	include_once('funciones.php');
	$campoobligado = 0; 
	$errorendato = 0; 
?>
<!DOCTYPE html>
<html lang="es">
<head><title>CSS3</title>
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
					include_once('cabecera.php');
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
					$seleccion_buscar=$_POST['seleccion_buscar'];
					 ?>
					<fieldset>
						<legend>Buscar </legend>
						<form name="miformulario" method="post" action="buscar.php">
								
						<?php 

						if (!(isset($_POST['BtnEnviar']))) 
						{
							echo "<label>Buscar: &nbsp;</label>";
							echo "<select name='seleccion_buscar'>
							<option value='todo'>Todo</option>
							<option value='cedula'>Por Cedula</option>
							</select>";

							echo "<input type='submit' name='BtnEnviar' value='&nbsp;>>&nbsp;'>";
							echo "<br><br>";
						}

						if (isset ($_POST['BtnEnviar']) && $seleccion_buscar == 'cedula') 
						{
							/*echo "<label>Buscar: &nbsp;</label>";
							echo "<select name='seleccion_buscar'>
							<option value='todo'>Todo</option>
							<option value='cedula'>Por Cedula</option>
							</select>";
							echo "<br><br>";*/

							echo "<label>Cedula </label>";
							echo "<input type='text' name='txtbuscar' size='30' maxlength='20' value='$buscar'>";

							echo "<input type='submit' name='BtnEnviar' value='&nbsp;>>&nbsp;'>";
							echo "<br><br>";

							$querybuscarC = $mysqli->query("SELECT * FROM datospersonales join usuario on datospersonales.id = usuario.id where cedula like '%$buscar%'") or die ("<br>No se puede ejecutar query para buscar datos ".$mysqli->error);
						}




						if (isset ($_POST['BtnEnviar']) && $seleccion_buscar == 'todo') 
						{
							echo "<label>Buscar: &nbsp;</label>";
							echo "<select name='seleccion_buscar'>
							<option value='todo'>Todo</option>
							<option value='cedula'>Por Cedula</option>
							</select>";

							echo "<input type='submit' name='BtnEnviar' value='&nbsp;>>&nbsp;'>";
							echo "<br><br>";

							$querybuscarU = $mysqli->query("SELECT * FROM datospersonales join usuario on datospersonales.id = usuario.id") or die ("<br>No se puede ejecutar query para buscar datos ".$mysqli->error);

							if (mysqli_num_rows($querybuscarU)>0) 
							{
								echo "<table>";
									echo "<tr>";
									echo "<th>Cedula</th>";
									echo "<th>Nombre</th>";
									echo "<th>Apellido</th>";
									echo "<th>Genero</th>";
									echo "<th>Edo Civil</th>";
									echo "<th>Fecha Nac</th>";
									echo "<th>Correo</th>";
									echo "<th>Usuario</th>";

							$querybuscarhobies = $mysqli->query("SELECT * FROM hobies") or die ("<br>No se puede ejecutar query para buscar hobies ".$mysqli->error);
							for ($i=1; $i <= mysqli_num_rows($querybuscarhobies); $i++) 
							{ 
								echo "<th>Hobies</th>";
							}


									while (($fila=mysqli_fetch_array($querybuscarU)))
										{
											$id=$fila['id'];
											$cedula=$fila['cedula'];
											$nombre=$fila['nombre'];
											$apellido=$fila['apellido'];
											$genero=$fila['genero'];
											$edocivil=$fila['edocivil'];
											$fechanac=$fila['fechanac'];
											$correo=$fila['correo'];
											$usuario=$fila['usuario'];

											if ($genero == 'F') 
											{
												$genero = 'Femenino';
											}
											if ($genero == 'M') 
											{
												$genero = 'Masculino';
											}
											

											if ($edocivil == 's') 
											{
												$edocivil = 'Soltero';
											}
											if ($edocivil == 'c') 
											{
												$edocivil = 'Casado';
											}
											if ($edocivil == 'o') 
											{
												$edocivil = 'Otros';
											}

											$fechanac=cambiarfechadeBD($fechanac);

											echo "<tr>";
										echo "<th>$cedula</th>";
										echo "<th>$nombre</th>";
										echo "<th>$apellido</th>";
										echo "<th>$genero</th>";
										echo "<th>$edocivil</th>";
										echo "<th>$fechanac</th>";
										echo "<th>$correo</th>";
										echo "<th>$usuario</th>";

										$querybuscarH = $mysqli->query("SELECT * FROM hobiesdp join hobies on hobiesdp.idhobie = hobies.idhobie where id='$id' order by idhobiedp") or die ("<br>No se puede ejecutar query para buscar hobies ".$mysqli->error);
										if (mysqli_num_rows($querybuscarH)>0) 
										{
											while (($fila=mysqli_fetch_array($querybuscarH))) 
											{
												$idhobie = $fila['idhobie'];
												$nombrehobie = $fila['nombrehobie'];
												$nombre = $fila['nombre'];

												echo "<td> $nombrehobie</td>";

											}
										}




										}

									echo "</tr>";
									echo "<br>";
									echo "</tr>";
									echo "</table>";
							}


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