<!DOCTYPE html>
<html lang="es">
<head><title>Inicio</title>
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
				include_once('menu.php'); // llamado a la pagina
			?>
		</nav>
		
		<section id="area_principal">
			<div id="caja2">
				<article>
					<header>
						<h1>Etech Venezuela.</h1>
						<h2>Prueba Técnica</h2>
						<h3>Cargo Programador</h3>
						<h6>El nombre de la Base de Datos es 'Etech'</h6>
					</header>	
				</article>
				<h3>Miguel Guarucano</h3>
						<h4>CI: 19546948</h4>
						<h5>Telefonos</h5>
						<h6>0412-6581188/0424-6924644/0261-7555246</h6>
				Calle 79E entre avenida 85 y 86
				Conjunto Residencial La Floresta <br>
				Urb. La Floresta - Maracaibo - Zulia
				<article>	
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