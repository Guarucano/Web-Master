<!DOCTYPE html>
<html lang="es">
<head><title>Parte2</title>
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
						<h1>Destreza Lógica.</h1>
					</header>
						
					Dada una lista de categorías las cuales cada elemento de esta, son padres e hijos, Realizar un algoritmo (usar PHP o JavaScript),  que organice dicha lista de tal forma que los  hijos queden debajo de sus padres. De igual forma este algoritmo debe funcionar aun cuando coloque nuevos elementos a la lista. (No es necesaria la creación de una base de datos). El resultado debe ser plasmado en HTML. <br>

			<?php 
				$categoria = array
  				(
  				
  				array("0","Carros",""),
  				array("1","Computadoras",""),
  				array("2","Rines","0"),
  				array("3","Perfil Bajo","2"),
  				array("4","Lujo","3"),
  				array("5","Repuestos","0"),
  				array("6","Momo","4"),
  				array("7","Software","1"),
  				array("8","Motores","5"),
  				array("9","Juegos","7"),
  				array("10","Sistemas","7"),
  				array("11","Animales",""),
  				array("12","Hardware","1"),
  				array("13","Perros","11"),
  				array("14","Pequeños","13"),
  				array("15","Hogar",""),
  				);



			 ?>


		




				<figure>
						<img src="image/tabla.png">
						
				</figure>
						No supe como hacerlo.

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