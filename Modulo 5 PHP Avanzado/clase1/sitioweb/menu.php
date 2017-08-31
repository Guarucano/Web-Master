	<ul class="nav">
				<li><a href="html5.php">HTML5</a></li>
				<li><a href="css3.php">CSS</a></li>
				<li><a href="javascript.php">Javascript</a></li>
				<li><a href="jquery.php">JQuery</a></li>
				<li><a href="">Ejemplos</a>
					<ul>
						<li><a href="calculos.php">Calculos</a>
					</ul>
				</li>
				<li><a href="formulario.php">Formulario</a></li>
				<li><a href="login.php">Login</a></li>
				<?php
				error_reporting(E_ERROR | E_PARSE);
				session_start();
				?>

				<?php
					if ( $_SESSION['autenticado'] )
					{
						echo "<li><a href='salir.php'>Cerrar Sesion</a></li>";
					}
				?>
	</ul>
	
	
	
	
	
	
	