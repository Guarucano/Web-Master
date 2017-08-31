<?php
	include_once('conexion.php');
?>

<?php
	error_reporting(E_ERROR | E_PARSE); // Desactiva la notificación y warnings de error en php.
	include_once('funciones.php');
	
?>
<!-- buscar.php -->
<!DOCTYPE html>
<html lang="es">
<head><title>Buscar</title>
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
						$seleccion_buscar=$_POST['seleccion_buscar'];
						$buscar=$_POST['txtbuscar'];
						
					?>		
						<fieldset>
						<legend>Buscar </legend>
						<form name='miformulario' method='post' action='buscar.php'>
						<?php
						if ( !(isset ($_POST['BtnEnviar']) )  )
						{
							
							echo "<label>Buscar : &nbsp;</label>";
							echo "<select name='seleccion_buscar'>
							<option value='todo'>Todo</option>      
							<option value='cedula'>por c&eacute;dula</option>
							<option value='usuario'>por usuario</option>
							</select>";

							echo "<input type='submit' name='BtnEnviar' value='&nbsp;>>&nbsp;'>";
							echo "<br><br>";
						}

						if ( isset ($_POST['BtnEnviar']) )
						{
							echo "<label>Buscar : &nbsp;</label>";
							echo "<select name='seleccion_buscar'>
							<option value='todo' ";
							if ( $seleccion_buscar == 'todo' )
							{
								echo "selected ";
							}
							echo ">Todo</option>      
							<option value='cedula' ";
							if ( $seleccion_buscar == 'cedula' )
							{
								echo "selected ";
							}
							echo ">por c&eacute;dula</option>
							<option value='usuario' ";
							if ( $seleccion_buscar == 'usuario' )
							{
								echo "selected ";
							}
							echo ">por usuario</option>
							</select>";
							echo "<input type='submit' name='BtnEnviar' value='&nbsp;>>&nbsp;'>";
							echo "<br><br>";
							
							if ( $seleccion_buscar == 'todo' )
							{
								$querybuscarU = $mysqli->query("SELECT * FROM datospersonales
								join usuario on datospersonales.id = usuario.id ") 
								or die ( "<br>No se puede ejecutar query para buscar datos P ". $mysqli->error);
							}
							if ( $seleccion_buscar == 'cedula' )
							{
								echo "<label>C&eacute;dula &nbsp;</label>";
								echo "<input type='text' name='txtbuscar' size='30' maxlength='20'  value='$buscar'>";
								
								echo "<input type='submit' name='BtnEnviar' value='&nbsp;>>&nbsp;'>";
								echo "<br><br>";

								if ( !$buscar=='' )
								{	
									$querybuscarU = $mysqli->query("SELECT * FROM datospersonales 
									join usuario on datospersonales.id = usuario.id
									where cedula like '%$buscar%' ") 
									or die ( "<br>No se puede ejecutar query para buscar datos P ". $mysqli->error);
								}
							}
							if ( $seleccion_buscar == 'usuario' )
							{
								echo "<label>Usuario &nbsp;</label>";
								echo "<input type='text' name='txtbuscar' size='30' maxlength='20'  value='$buscar'>";
								
								echo "<input type='submit' name='BtnEnviar' value='&nbsp;>>&nbsp;'>";
								echo "<br><br>";

								if ( !$buscar=='' )
								{	
									$querybuscarU = $mysqli->query("SELECT * FROM datospersonales 
									join usuario on datospersonales.id = usuario.id
									where usuario like '%$buscar%' ") 
									or die ( "<br>No se puede ejecutar query para buscar datos P ". $mysqli->error);
								}
							}

								
							if (mysqli_num_rows($querybuscarU) > 0 )
							{
								echo "<table>";
								echo "<tr>";
								echo "<th> C&eacute;dula</th>";
								echo "<th> Nombre</th>";
								echo "<th> Apellido</th>";
								echo "<th> Genero</th>";
								echo "<th> Edo Civil</th>";
								echo "<th> Fecha Nac</th>";
								echo "<th> Correo</th>";
								echo "<th> Usuario</th>";

								echo "<th> Hobies</th>";
								/*$querybuscarhobies = $mysqli->query("SELECT * FROM hobies ") 
								or die ( "<br>No se puede ejecutar query para buscar hobies ". $mysqli->error);
								for ( $i= 1 ; $i<= mysqli_num_rows($querybuscarhobies) ; $i++ )
								{ echo "<th> Hobies</th>"; }*/
							
								echo "<th id='th1'></th>";
								echo "<th id='th1'></th>";


								while (($fila=mysqli_fetch_array($querybuscarU)))
								{
									$id= $fila['id'];
									$cedula= $fila['cedula'];
									$nombre= $fila['nombre'];
									$apellido= $fila['apellido'];
									$genero= $fila['genero'];
									$edocivil= $fila['edocivil'];
									$fechanac= $fila['fechanac'];
									$correo= $fila['correo'];
									$usuario= $fila['usuario'];
		
									if ( $genero == 'F' )
									{
										$genero = 'Femenino';
									}
									if ( $genero == 'M' )
									{
										$genero = 'Masculino';
									}
									if ( $edocivil == 's' )
									{
										$edocivil = 'Soltero';
									}
									if ( $edocivil == 'c' )
									{
										$edocivil = 'Casado';
									}if ( $edocivil == 'o' )
									{
										$edocivil = 'Otros';
									}

									echo "<tr>";
									//echo "<td> $id</td>";
									echo "<td> $cedula</td>";
									echo "<td> $nombre</td>";
									echo "<td> $apellido</td>";
									echo "<td> $genero</td>";
									echo "<td> $edocivil</td>";
									echo "<td> $fechanac</td>";
									echo "<td> $correo</td>";
									echo "<td> $usuario</td>";

									$querybuscarh = $mysqli->query("SELECT * FROM hobiesdp 
									join hobies on hobiesdp.idhobie = hobies.idhobie
									where id='$id'  order by idhobiedp") or die ( "<br>No se puede ejecutar query para buscar datos hobies ". $mysqli->error);
									if (mysqli_num_rows($querybuscarh) > 0 )
									{
										echo "<td>";
										while (($fila=mysqli_fetch_array($querybuscarh)))
										{
											$idhobie= $fila['idhobie'];
											$nombrehobie= $fila['nombrehobie'];
											$nombre= $fila['nombre'];

											echo "$nombrehobie<br>";
										}
										echo "</td>";
									}
									echo "<td><a href='modificar.php?id=$id'><img src='image/editar.png' title='Modificar'></a></td>";
									echo "<td><a href='eliminar.php?id=$id'><img src='image/eliminar.png' title='eliminar'></a></td>";
								}
								echo "</tr>";
								echo "<br>";
								echo "</tr>";
								echo "</table>";
							}
							else
							{
								if ( !$buscar=='' )
								{
									echo "<span class='error'>No existen registros</span>";
									echo "<br><br>";
								}
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