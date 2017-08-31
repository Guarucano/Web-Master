<?php
	include_once ("acceso.php");
?>
<!DOCTYPE html>
<html lang="es">
<head><title>Javascript</title>
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
						<h1>Javascript</h1>
					</header>
					JavaScript (abreviado comúnmente "JS") es un lenguaje de programación interpretado, dialecto del estándar ECMAScript. Se define como orientado a objetos,3 basado en prototipos, imperativo, débilmente tipado y dinámico.<br>Se utiliza principalmente en su forma del lado del cliente (client-side), implementado como parte de un navegador web permitiendo mejoras en la interfaz de usuario y páginas web dinámicas4 aunque existe una forma de JavaScript del lado del servidor (Server-side JavaScript o SSJS). Su uso en aplicaciones externas a la web, por ejemplo en documentos PDF, aplicaciones de escritorio (mayoritariamente widgets) es también significativo.<br>JavaScript se diseñó con una sintaxis similar al C, aunque adopta nombres y convenciones del lenguaje de programación Java. Sin embargo Java y JavaScript no están relacionados y tienen semánticas y propósitos diferentes.
					<figure>
						<img src="image/JSLogo.png">
						<figcaption>
							Logo Javascript
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