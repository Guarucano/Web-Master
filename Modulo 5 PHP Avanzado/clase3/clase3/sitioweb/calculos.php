<?php
	error_reporting(E_ERROR | E_PARSE); // Desactiva la notificación y warnings de error en php.
	
	include_once('funciones.php'); //  Importa o inserta el código contenido en el archivo.php dentro de otro. El _once impide la carga de un mismo archivo más de una vez.
?>
<!-- calculos.php -->
<!DOCTYPE html>
<html lang="es">
<head><title>Calculos</title>
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
						$N1 = $_POST['txtnumero1'];
						$N2 = $_POST['txtnumero2'];
						$Result = $_POST['txtresultado'];
					?>


					<?php

						echo "<fieldset>
								<legend>Calculos </legend>";
						echo "<form name='miformulario' action='calculos.php' method='post'>";

						echo "<label>1er Numero :</label>";
						echo "<input type='text' name='txtnumero1' size='3' maxlength='3' value='$N1'>";
						echo "<br>";
						
						
						echo "<label>2do Numero :</label>";
						echo "<input type='text' name='txtnumero2' size='3' maxlength='3' value='$N2'>";
						echo "<br>";
						
					if (isset($_POST['BtnSuma']) || isset($_POST['BtnResta']) || isset($_POST['BtnMulti']) || isset($_POST['BtnDiv'])) 
					{	
						// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
						if ( ($N1 !='') and ($N2 != '') )
						{						
							if (validarFlotante($N1))
							{
								
							}else
							{
								$errorendato = 1;
							}
							if (validarFlotante($N2))
							{
								
							}else
							{
								$errorendato = 1;
							}
							if ( $errorendato !== 1 )
							{
								if (isset($_POST['BtnSuma']) ) 
								{
								
									$Result = suma($N1,$N2);

								}
								if (isset($_POST['BtnResta']) ) 
								{
								
									$Result = resta($N1,$N2);

								}
								if (isset($_POST['BtnMulti']) )
								{
								
									$Result = multi($N1,$N2);

								}
								if (isset($_POST['BtnDiv']) ) 
								{
								
									$Result = div($N1,$N2);

								}
							}else
							{
								echo "<span class='error'>Posee Datos no V&aacute;lidos<br></span>";
							}
						}
						else
						{
							echo "<span class='error'>Faltan Campos obligatorios<br></span>";
						}
						/*if ( $errorendato == 1 )
						{
							echo "<span class='error'>Posee Datos no V&aacute;lidos<br></span>";
						}*/
					}
						
							
						
						echo "<br>";
						echo "<input type='submit' name='BtnSuma' value='  +  '>";

						echo "<input type='submit' name='BtnResta' value='  -  '>";

						echo "<input type='submit' name='BtnMulti' value='  *  '>";

						echo "<input type='submit' name='BtnDiv' value='  /  '>";
						echo "<br>";
						echo "<br>";
						
						
						echo "<label>El Resultado es :</label>";
						echo "<input type='text' name='txtresultado' size='10' disabled value='$Result'>";
						echo "<br>";
						echo "<br>";
						
						echo "</form>";
						echo "</fieldset>";
					?>
					
					
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