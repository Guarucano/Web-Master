<?php
session_start();

error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="es">
<head><title>Sesiones con PHP</title>
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
if ( !$_SESSION['autenticado'] )
{

echo "
<!-- el Formulario -->
<fieldset>
	<legend>Formulario de Acceso </legend>
	<form name='miformulario' method='post' action='sesion.php'>
	";
	?>
	
	<?php
	echo "<br>";
	echo "<label>Usuario :
  			<input name='txtusuario' type='text' id='txtusuario' size='20' maxlength='12' placeholder='usuario' value=''>
	</label>";
	?>

	<?php
	echo "<label>Clave :
  			<input name='txtclave' type='password' id='txtclave' size='20' maxlength='12' placeholder='clave' value=''>
	</label>";
	?>

		
		
		 
	<?php	
	// Boton Enviar
    echo "<br><br><label><input name='BtnEnviar' type='submit' id='BtnEnviar' value='Enviar' /></label><br>";
	?>
	<?php		
		if ($_GET['error']=='si')
		{
			echo "<span class='error'>Verifica los datos</span>";
		}

	?>

<?php
echo "
</form>

</fieldset>	";
?>
<?php

}
else{
	
echo "Bienvenido ".$_SESSION['usuario']." y su id es: ".$_SESSION['id'];

}
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





