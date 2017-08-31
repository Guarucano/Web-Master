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
						$cedula     = $_POST['txtcedula'];
						$nombre     = $_POST['txtnombre'];
						$apellido   = $_POST['txtapellido'];
						$RadOpcion  = $_POST['RadOpcion'];
						//$CheckBox1  = $_POST['CheckBox1'];
						//$CheckBox2  = $_POST['CheckBox2'];
						//$CheckBox3  = $_POST['CheckBox3'];
						$Seleccion  = $_POST['seleccion_simple'];
						$fechanac   = $_POST['txtfechanac'];
						$correo     = $_POST['txtcorreo'];
						$usuario     = $_POST['txtusuario'];
						$clave     = $_POST['txtclave1'];
						$clave2     = $_POST['txtclave2'];
						
						//echo "Su nombre es: $nombre";
					?>		
					
					<!-- el Formulario -->
					<fieldset>
						<legend>Formulario </legend>
						<form name='miformulario' method='post' action='formulario.php'>

						<?php
						echo "<label>Cedula :
								<input name='txtcedula' type='text' id='txtnombre' size='12' maxlength='8' placeholder='ingrese cedula' value='$cedula'>
						</label>";

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

						 //Buscar en la base de datos

						 $querybuscarH = $mysqli->query("SELECT * FROM hobies") or die ("<br>No se puede ejecutar query para buscar hobies ".$mysqli->error);
										while(($fila=mysqli_fetch_array($querybuscarH))) 
										{
											$idhobie = $fila['idhobie'];
											$nombrehobie=$fila['nombrehobie'];
											echo "$nombrehobie: <input name='CheckBox[]' type='checkbox' value='$idhobie'";

											foreach ($_POST['CheckBox'] as $idh) 
											{
												if ($idhobie == $idh) {
													echo "checked";
												}
											}

											echo " ><br>";
										}
/*
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
								echo " ><br>";		*/
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
								<input name='txtclave1' type='password' id='txtclave1' size='30' maxlength='20' placeholder='ingrese la clave' value='$clave'>
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
								<input name='txtclave2' type='password' id='txtclave2' size='30' maxlength='20' placeholder='ingrese la clave' value='$clave2'>
						</label>";
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
									echo "<br /><br /><label><input name='BtnEnviar' type='submit' id='BtnEnviar' value='Enviar' /></label>";
								}
								else
								{
									// Insertar en la Base de Datos
									$querybuscar = $mysqli->query("SELECT * FROM datospersonales join usuario on datospersonales.id = usuario.id where cedula='$cedula' or usuario='$usuario' ");
									if (mysqli_num_rows($querybuscar) > 0 )
									{

										$querybuscarC = $mysqli->query("SELECT * FROM datospersonales where cedula='$cedula'") or die ("<br>No se puede ejecutar query para buscar cedula ".$mysqli->error);
										if (mysqli_num_rows($querybuscarC)>0) 
										{
											echo "<span class='error'><br><br>Cédula ya registrada</span>";
										}

										$querybuscarU = $mysqli->query("SELECT * FROM usuario where usuario='$usuario'") or die ("<br>No se puede ejecutar query para buscar usuario ".$mysqli->error);
										if (mysqli_num_rows($querybuscarU)>0) 
										{
											echo "<span class='error'><br><br>Usuario ya registrado</span>";
										}



										
										echo "<br><br><label><input name='BtnEnviar' type='submit' id='BtnEnviar' value='Enviar' ></label>";
									}
									else
									{
									
										// Insertar en la Base de Datos
										$queryInsertar = $mysqli->query("INSERT INTO datospersonales(
										id,    cedula,     nombre,    apellido,   genero,       edocivil,     fechanac,  correo   ) values (
										null, '$cedula', '$nombre', '$apellido', '$RadOpcion', '$Seleccion', '$fechanac', '$correo' )") ;
										
										// Buscar Datos
										$querybuscar2 = $mysqli->query("SELECT id FROM datospersonales where cedula='$cedula' ");
										while (($fila=mysqli_fetch_array($querybuscar2)))
										{
											$id= $fila['id'];
											//echo "<br> el id es $id <br>";
										}
										if ($querybuscar2)
										{
											// Insertar en la Base de Datos
											$queryInsertar2 = $mysqli->query("INSERT INTO usuario( idusuario,    usuario,     clave,    id ) values ( null, '$usuario', '$clave', '$id' )");
										}

										foreach ($_POST['CheckBox'] as $idh) 
										{
											//Insertar en la base de datos
											$queryInsertar3 = $mysqli->query("INSERT INTO hobiesdp( idhobiedp, id, idhobie ) values ( null, '$id', '$idh' )");
										}
										
										/*if($CheckBox1 == 'CheckBox1')
											{
											// Insertar en la Base de Datos
											$queryInsertar3 = $mysqli->query("INSERT INTO hobiesdp( idhobiedp, id, idhobie ) values ( null, '$id', 1 )");
											}
											if($CheckBox2 == 'CheckBox2')
											{
											// Insertar en la Base de Datos
											$queryInsertar4 = $mysqli->query("INSERT INTO hobiesdp( idhobiedp, id, idhobie ) values ( null, '$id', 2 )");
											}
											if($CheckBox3 == 'CheckBox3')
											{
											// Insertar en la Base de Datos
											$queryInsertar5 = $mysqli->query("INSERT INTO hobiesdp( idhobiedp, id, idhobie ) values ( null, '$id', 3 )");
											}
										*/
										
										if ($queryInsertar && $queryInsertar2 )
										{
											echo "<span class='error'><br><br>Datos registrados exitosamente<br><br></span>";
										}
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