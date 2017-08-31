<!DOCTYPE html>
<html lang="es">
<head><title>HTML5</title>
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
					<header>
						<h1>HTML 5</h1>
					</header>
					HTML5 (HyperText Markup Language, versión 5) es la quinta revisión importante del lenguaje básico de la World Wide Web, HTML. HTML5 especifica dos variantes de sintaxis para HTML: un «clásico» HTML (text/html), la variante conocida como HTML5 y una variante XHTML conocida como sintaxis XHTML5 que deberá ser servida como XML.1 2 Esta es la primera vez que HTML y XHTML se han desarrollado en paralelo.<br>La versión definitiva de la quinta revisión del estándar se publicó en octubre de 2014.<br>Al no ser reconocido en viejas versiones de navegadores por sus nuevas etiquetas, se recomienda al usuario común actualizar a la versión más nueva, para poder disfrutar de todo el potencial que provee HTML5.
					<figure>
						<img src="image/HTML5Logo.png">
						<figcaption>
							Logo HTM5
						</figcaption>
					</figure>
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