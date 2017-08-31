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
						$seleccion_buscar=$_POST['seleccion_buscar'];
						$buscar=$_POST['txtbuscar'];
						$status_opcion=$_POST['status_opcion'];
						
					?>		
						<fieldset>
						<legend>Buscar </legend>
						<form name='miformulario' method='post' action='buscar.php'>
						<?php
						if ( !(isset ($_POST['BtnEnviar']) )  )
						{
							
							
							echo "<select style='width:200px' name='seleccion_buscar'>
							<option value='todo'>Todo</option>      
							<option value='status_trabajador'>Por Status Trabajador</option>
							</select><br>";

							echo "<input type='submit' name='BtnEnviar' class='btn btn-warning' value='&nbsp;>>&nbsp;'>";
							echo "<br><br>";
						}

						if ( isset ($_POST['BtnEnviar']) )
						{
							
							echo "<select style='width:200px' name='seleccion_buscar'>
							<option value='todo' ";
							if ( $seleccion_buscar == 'todo' )
							{
								echo "selected ";
							}
							echo ">Todo</option>     
							<option value='status_trabajador' ";
							if ( $seleccion_buscar == 'status_trabajador' )
							{
								echo "selected ";
							}
							echo ">Por Status Trabajador</option>
							</select>";
							echo "<br><input type='submit' name='BtnEnviar' class='btn btn-warning' value='&nbsp;>>&nbsp;'>";
							echo "<br><br>";
							
							if ( $seleccion_buscar == 'todo' )
							{
								$querybuscarU = $mysqli->query("SELECT * FROM trabajador 
								join cargo on trabajador.id_cargo = cargo.id_cargo WHERE trabajador.status_bd = 'En BD' ORDER BY trabajador.cedula ") 
								or die ( "<br>No se puede ejecutar query para buscar datos P ". $mysqli->error);
							}
							if ( $seleccion_buscar == 'status_trabajador' )
							{

								echo "Status : 
								<br>
								<input type='radio' required  name='status_opcion' id='status_opcion' checked value='Activo'";/* >Activo <br>";*/
								if($status_opcion === 'Activo')
								{
				        		  echo "checked > Activo";
				    			}else{
				    				echo ">Activo
								";
				    			}

				    			echo "<input type='radio' required  name='status_opcion' id='status_opcion'  value='Inactivo'";/* >Inactivo <br>";*/
								if($status_opcion === 'Inactivo')
								{
				        		  echo "checked > Inactivo";
				    			}else{
				    				echo ">Inactivo
								";
				    			}
								echo "   <br>";
								echo "<input type='submit' name='BtnEnviar' class='btn btn-warning' value='&nbsp;>>&nbsp;'>";
								echo "<br><br>";

								if ( !$status_opcion=='' ) 
								{	
									$querybuscarU = $mysqli->query("SELECT * FROM trabajador 
								join cargo on trabajador.id_cargo = cargo.id_cargo where status_trabajador='$status_opcion' and status_bd='En BD' ") 
									or die ( "<br>No se puede ejecutar query para buscar datos P ". $mysqli->error);
								}
							}
						

								
							if (mysqli_num_rows($querybuscarU) > 0 )
							{
								echo "<table class='table table-striped table-hover '>";
								echo "<tr>";
								echo "<th class='warning'> Nombre</th>";
								echo "<th class='warning'> Apellido</th>";
								echo "<th class='warning'> C&eacute;dula</th>";
								echo "<th class='warning'> Correo</th>";
								echo "<th class='warning'> Cargo</th>";
								echo "<th class='warning'> Status</th>";
								echo "<th class='warning'> Modificar</th>";
								echo "<th class='warning'> Eliminar</th>";


								while (($fila=mysqli_fetch_array($querybuscarU)))
								{
									$id_cargo= $fila['id_cargo'];
									$id_trabajador = $fila['id_trabajador'];
									$nombre= $fila['nombre'];
									$apellido= $fila['apellido'];
									$cedula= $fila['cedula'];
									$correo= $fila['correo'];
									$nombre_cargo= $fila['nombre_cargo'];
									$status_trabajador = $fila['status_trabajador'];
		
								

									echo "<tr>";
									//echo "<td> $id</td>";
									echo "<td> $nombre</td>";
									echo "<td> $apellido</td>";
									echo "<td> $cedula</td>";
									echo "<td> $correo</td>";
									echo "<td> $nombre_cargo</td>";
									echo "<td> $status_trabajador</td>";
									echo "<td><a href='modificar.php?id_trabajador=$id_trabajador'><img src='image/editar.png' title='Modificar'></a></td>";
									echo "<td><a href='eliminar.php?id_trabajador=$id_trabajador'><img src='image/eliminar.png' title='eliminar'></a></td>";
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