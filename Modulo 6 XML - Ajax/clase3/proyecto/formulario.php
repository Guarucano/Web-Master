<?php
	include_once('conexion.php');
?>

<?php
	error_reporting(E_ERROR | E_PARSE); 
	include_once('funciones.php');
	$campoobligado = 0; 
	$errorendato = 0; 
?>

<!DOCTYPE html>
<html lang="es">
<head><title>Formulario</title>
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
					include_once('cabecera.php'); 
				?>
			</div>
		</header>
		
		<nav id="navmenu">
			<?php
				include_once('menu.php'); 
			?>
		</nav>
		
		<section id="area_principal">
			<div id="caja2">
				<article>
					<?php
						$cedula     = $_POST['txtcedula'];
						$nombre     = $_POST['txtnombre'];
						$apellido   = $_POST['txtapellido'];
						$correo     = $_POST['txtcorreo'];
						$status_trabajador     = $_POST['txtstatus_trabajador'];
						
						$seleccion1  = $_POST['seleccion_simple1'];
						$seleccion2  = $_POST['seleccion_simple2'];
					
						
						//echo "Su nombre es: $nombre";

						
					?>		
					
					
						<form  name='miformulario' method='post' action='formulario.php'>
						<fieldset>
						<legend>Formulario </legend>

						<?php
						echo "<label>Nombre </label><br>
								<input name='txtnombre' required type='text' id='txtnombre' size='30' maxlength='20' placeholder='Ingrese nombre' value='$nombre'>
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
								<input name='txtapellido' type='text' required id='txtapellido' size='30' maxlength='20' placeholder='Ingrese apellido' value='$apellido'>
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
								<input name='txtcedula' required type='text' id='txtcedula' size='30' maxlength='8' placeholder='Ingrese cédula' value='$cédula'>";

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
								<input name='txtcorreo' required type='email' id='txtcorreo' size='30' maxlength='80' placeholder='Ingrese correo electrónico' value='$correo'>";

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
					
						echo	"<label>Cargo</label><br>
								<select style='width:260px' required name='seleccion_simple1'>
								<option value=''>Escoja su opción</option>";
						// Buscar en la Base de Datos
						$querybuscarCargo = $mysqli->query("SELECT * FROM cargo ") or die ( "<br>No se puede ejecutar query para buscar Hobies ". $mysqli->error);
						while (($fila=mysqli_fetch_array($querybuscarCargo))){
							$id_cargo = $fila['id_cargo'];
							$nombre_cargo2 = $fila['nombre_cargo'];

							echo "<option value='$id_cargo'";
							foreach ($_POST['$nombre_cargo2'] as $idh)
							{
								if ($nombre_cargo2 == $idh) {
									echo "selected ";
								}
							}
							echo " >$nombre_cargo2</option>";
							
						}
								echo "</select>";

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
							  echo "<span class='error'>Escoja su opción</span> ";
							  $campoobligado = 1;
						}
						echo "<br><br> ";




						?>
	

						<?php
						// status trabajador
						
						echo	"<label>Status del Trabajador</label><br>
								<select required style='width:260px' name='seleccion_simple2'>
								<option value=''>Escoja su opción</option>
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
							  echo "<span class='error'>Escoja su opción</span> ";
							  $campoobligado = 1;
						}
						echo "<br><br> ";


						$querybuscarCargo3 = $mysqli->query("SELECT * FROM cargo WHERE nombre_cargo='Ninguno'") or die ( "<br>No se puede ejecutar query para buscar Hobies ". $mysqli->error);

							while (($fila=mysqli_fetch_array($querybuscarCargo3))){
							$id_cargo3 = $fila['id_cargo'];
							$nombre_cargo3 = $fila['nombre_cargo'];
								}



							
							if ( $seleccion1 == "$id_cargo3" && $seleccion2 == "Activo" or $seleccion1 != "$id_cargo3" && $seleccion2 == "Inactivo" ) {

								echo "<span class='error'>No puede estar activo sin ningun cargo o inactivo con cargo</span> ";
							 	 $campoobligado = 1;
								
							}
						?>

						
						
						<?php	
						// Boton Enviar
						if ( isset ($_POST['BtnEnviar']) )
						{
								if ( $campoobligado == 1 or $errorendato == 1 )
								{
									echo "<br /><br /><label><input name='BtnEnviar' class='btn btn-primary' type='submit' id='BtnEnviar' value='Enviar' /></label>";
								}
								else
								{
									// Buscar en la Base de Datos
									$querybuscar = $mysqli->query("SELECT * FROM trabajador where cedula='$cedula'") or die ( "<br>No se puede ejecutar query para buscar datos ". $mysqli->error);
									if (mysqli_num_rows($querybuscar) > 0 )
									{
										
										$querybuscarC = $mysqli->query("SELECT * FROM trabajador where cedula='$cedula' ") or die ( "<br>No se puede ejecutar query para buscar cédula ". $mysqli->error);
										if (mysqli_num_rows($querybuscarC) > 0 )
										{
											echo "<span class='error'><br><br>C&eacute;dula ya registrada</span>";
										}
										
										echo "<br><br><label><input name='BtnEnviar' class='btn btn-primary' type='submit' id='BtnEnviar' value='Enviar' ></label>";

									}
									else
									{	
										$querybuscarCargo2 = $mysqli->query("SELECT id_cargo FROM cargo where nombre_cargo='$idh' ") or die ( "<br>No se puede ejecutar query para buscar datos 2 ". $mysqli->error);
										while (($fila=mysqli_fetch_array($querybuscarCargo2)))
										{
											$id_cargo= $fila['id_cargo'];
											//echo "<br> el id es $id <br>";
										}if ($querybuscarCargo2) {
										// Insertar en la Base de Datos
										$queryInsertar = $mysqli->query("INSERT INTO trabajador(
										id_trabajador,    nombre,    apellido,   cedula,  correo, id_cargo, status_trabajador, status_bd ) values (
										null, '$nombre', '$apellido', '$cedula', '$correo', '$seleccion1', '$seleccion2','En BD' )") or die ( "<br>No se puede ejecutar query para insertar datos ". $mysqli->error);
										
										}
									

										/*if($CheckBox1 == 'CheckBox1')
											{
											// Insertar en la Base de Datos
											$queryInsertar3 = $mysqli->query("INSERT INTO hobiesdp( idhobiedp, id, idhobie ) values ( null, '$id', 1 )") or die ( "<br>No se puede ejecutar query para insertar datos 3". $mysqli->error);
											}
											if($CheckBox2 == 'CheckBox2')
											{
											// Insertar en la Base de Datos
											$queryInsertar4 = $mysqli->query("INSERT INTO hobiesdp( idhobiedp, id, idhobie ) values ( null, '$id', 2 )") or die ( "<br>No se puede ejecutar query para insertar datos 4". $mysqli->error);
											}
											if($CheckBox3 == 'CheckBox3')
											{
											// Insertar en la Base de Datos
											$queryInsertar5 = $mysqli->query("INSERT INTO hobiesdp( idhobiedp, id, idhobie ) values ( null, '$id', 3 )") or die ( "<br>No se puede ejecutar query para insertar datos 5". $mysqli->error);
											}
										*/
										
										
										if ($queryInsertar )
										{
											echo "<span class='error'><br><br>Datos registrados exitosamente<br><br></span>";
										}
									}
								}
						}
						else
						{
							echo "<br /><br /><label><input name='BtnEnviar' class='btn btn-primary' type='submit' id='BtnEnviar' value='Enviar' /></label>";
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