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
						if (!isset($_POST['BtnEnviar']))
						{
							$id = $_REQUEST['id'];
						}else
						{
							$id = $_REQUEST['hiddenid'];
						}
						
						$querybuscarD = $mysqli->query("SELECT * FROM datospersonales where id = $id ") 
						or die ( "<br>No se puede ejecutar query para buscar datos P ". $mysqli->error);
						
						$querybuscarU = $mysqli->query("SELECT * FROM usuario where id = $id ") 
						or die ( "<br>No se puede ejecutar query para buscar usuario ". $mysqli->error);
						
						if ( $fila=mysqli_fetch_array($querybuscarD) )
						{
							$cedula= $fila['cedula'];
							$nombre= $fila['nombre'];
							$apellido= $fila['apellido'];
							$RadOpcion= $fila['genero'];
							$Seleccion= $fila['edocivil'];
							$fechanac= $fila['fechanac'];
							$correo= $fila['correo'];
							
						}
						
						if ( $fila=mysqli_fetch_array($querybuscarU) )
						{
							$idusuario= $fila['idusuario'];
							$usuario= $fila['usuario'];
							$clave= $fila['clave'];
						}
						

						if (isset($_POST['BtnEnviar'])) 
						{
							$id = $_POST['hiddenid'];
							$cedula     = $_POST['hiddenced'];
							$nombre     = $_POST['txtnombre'];
							$apellido   = $_POST['txtapellido'];
							$RadOpcion  = $_POST['RadOpcion'];
							$Seleccion  = $_POST['seleccion_simple'];
							$fechanac   = $_POST['txtfechanac'];
							$correo     = $_POST['txtcorreo'];
							$usuario     = $_POST['txtusuario'];
							$clave     = $_POST['txtclave1'];
							$clave2     = $_POST['txtclave2'];

							/*foreach ($_POST['CheckBox'] as $idh)
							{
								echo "<br>el hobie es: CheckBox$idh ";
							}*/
						}

					?>		
					
					<!-- el Formulario -->
					<fieldset>
						<legend>Formulario </legend>
						<form name='miformulario' method='post' action='modificar.php'>

						<?php
					
						// Campo Oculto ID
						echo "<input type='hidden' name='hiddenid' value='$id'>";					
						echo "<label>Cedula :
								<input name='txtcedula' type='text' id='txtnombre' size='12' maxlength='8' disabled placeholder='ingrese cedula' value='$cedula'>
						</label>";
					// Campo Oculto Cedula
						echo "<input type='hidden' name='hiddenced' value='$cedula'>";	
						
						echo "<br><br> ";
						?>

						<?php
						echo "<label>Nombre :
								<input name='txtnombre' type='text' id='txtnombre' size='30' maxlength='20' placeholder='ingrese nombre' value='$nombre'>
						</label>";
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
						echo "<label>Apellido :
								<input name='txtapellido' type='text' id='txtapellido' size='30' maxlength='20' placeholder='ingrese apellido' value='$apellido'>
						</label>";
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
							// Buscar en la Base de Datos
							$querybuscarH = $mysqli->query("SELECT * FROM hobies ") or die ( "<br>No se puede ejecutar query para buscar Hobies ". $mysqli->error);
							while (($fila=mysqli_fetch_array($querybuscarH)))
							{
								$idhobie= $fila['idhobie'];
								$nombrehobie= $fila['nombrehobie'];

								echo "$nombrehobie : <input name='CheckBox[]' type='checkbox' value='$idhobie' ";
							
								if (isset($_POST['BtnEnviar'])) 
								{
									foreach ($_POST['CheckBox'] as $idh)
									{
										if($idhobie == $idh )
										{
										   echo "checked ";
										}						
									}
								}else
								{
									$querybuscarHD = $mysqli->query("SELECT * FROM hobiesdp 
										join hobies on hobiesdp.idhobie = hobies.idhobie
										where id='$id'  order by idhobiedp") or die ( "<br>No se puede ejecutar query para buscar datos hobies ". $mysqli->error);
																		
									while (($fila=mysqli_fetch_array($querybuscarHD)))
									{
										$idhobie2= $fila['idhobie'];
										$nombrehobie2= $fila['nombrehobie'];

										if($idhobie2 == $idhobie )
										{
											echo "checked ";
										}
									}
								}
								
								echo " ><br>";
							}

						?>
							<?php
						// Validad Seleccion en Php
							echo	"<label><br />Estado Civil : </label> <br />
								<select name='seleccion_simple'>
								<option value=''>escoja su opcion</option>
								<option value='s' ";
								if ($Seleccion == 's')
								{
									echo "selected ";
								}
								echo " >Soltero</option>
								<option value='c' ";
								if($Seleccion == 'c')
								{
									echo "selected ";
								}
								echo " >Casado</option>
								<option value='o' ";
								if($Seleccion == 'o')
								{
									echo "selected ";
								}
								echo " >Otros</option>
								</select> 
								";

							if ( isset($Seleccion) and ($Seleccion == '') )
							{
								  echo "<span class='error'>escoja su opcion</span> ";
								  $campoobligado = 1;
							}						
						echo "<br><br> ";
						?>
							
						<?php
						echo "<label>fechanac :
								<input name='txtfechanac' type='date' id='txtfechanac' size='12' maxlength='8' placeholder='ingrese fecha nac.' value='$fechanac'>
						</label>";

						// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
						if ( isset($fechanac) and ($fechanac != '') )
						{
							// if ( datecheck($fechanac) )
							// {
							  //echo $fechanac;
							// }else {
							//  echo "<span class='error'>Dato no es v&aacute;lido</span>";
							//  $errorendato = 1;
							// }
						}
						else
						{
							if ( isset($fechanac) and ($fechanac == '') ) { 
							echo "<span class='error'>Campo obligatorio</span>";
							$campoobligado = 1;
							}
						}
						echo "<br><br> ";
						?>

						<?php
						echo "<label>correo :
								<input name='txtcorreo' type='email' id='txtcorreo' size='80' maxlength='80' placeholder='ingrese correo electrónico' value='$correo'>
						</label>";

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
						echo "<label>Nombre de Usuario :
								<input name='txtusuario' type='text' id='txtusuario' size='30' maxlength='20' placeholder='ingrese el usuario' value='$usuario'>
						</label>";
						?>
						<?php
						// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
						if ( isset($usuario) and ($usuario != '') )
						{
							if ( validaAlfaNum($usuario) )
							{
							  //echo $nomusuariobre;
							}else {
							  echo "<span class='error'>Dato no es v&aacute;lido</span>";
							  $errorendato = 1;
							}
						}
						else
						{
							if ( isset($usuario) and ($usuario == '') ) { 
							echo "<span class='error'>Campo obligatorio</span>";
							$campoobligado = 1;
							}
						}
						echo "<br><br> ";
						?>
						
						<?php
						echo "<label>Clave :
								<input name='txtclave1' type='text' id='txtclave1' size='30' maxlength='20' placeholder='ingrese la clave' value='$clave'>
						</label>";
						?>
						<?php
						// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
						if ( isset($clave) and ($clave != '') )
						{
							if ( validaAlfaNum($clave) )
							{
							  //echo $clave;
							}else {
							  echo "<span class='error'>Dato no es v&aacute;lido</span>";
							  $errorendato = 1;
							}
						}
						else
						{
							if ( isset($clave) and ($clave == '') ) { 
							echo "<span class='error'>Campo obligatorio</span>";
							$campoobligado = 1;
							}
						}
						echo "<br><br> ";
						?>
						<?php
						echo "<label>Repetir Clave :
								<input name='txtclave2' type='text' id='txtclave2' size='30' maxlength='20' placeholder='ingrese la clave' ";
								if (isset($_POST['BtnEnviar'])) 
								{
									echo "value='$clave2'>";
								}else
								{
									echo "value='$clave'>";
								}
						echo "</label>";
						?>
						<?php
						// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
						if ( isset($clave2) and ($clave2 != '') )
						{
							if ( validaAlfaNum($clave2) )
							{
							  //echo $clave2;
								if ( $clave != $clave2 )
								{
								  echo "<span class='error'>Las claves no coinciden</span>";
								  $errorendato = 1;
								}
							}else {	
							  echo "<span class='error'>Dato no es v&aacute;lido</span>";
							  $errorendato = 1;
							}
						}
						else
						{
							if ( isset($clave2) and ($clave2 == '') ) { 
							echo "<span class='error'>Campo obligatorio</span>";
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
								echo "<br /><br /><label><input name='BtnEnviar' type='submit' id='BtnEnviar' value='Modificar' /></label>";
							}
							else
							{
								// Modificar en la Base de Datos
								$queryUpdate = $mysqli->query("UPDATE datospersonales SET nombre='$nombre', apellido='$apellido', genero='$RadOpcion', edocivil='$Seleccion', fechanac='$fechanac', correo='$correo' where id='$id'") or die ( "<br>No se puede ejecutar query para modificar datos p ". $mysqli->error);

								$queryUpdate2 = $mysqli->query("UPDATE usuario SET usuario='$usuario', clave='$clave' where id='$id'") or die ( "<br>No se puede ejecutar query para modificar usuario ". $mysqli->error);
										
								if ( $queryUpdate & $queryUpdate2)
								{
									echo "<span class='error'><br><br>Datos modificados exitosamente<br><br></span>";
								}
							}
						}
						else
						{
							echo "<br /><br /><label><input name='BtnEnviar' type='submit' id='BtnEnviar' value='Modificar' /></label>";
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