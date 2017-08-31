	<ul class="nav">
				<li><a href="formulario.php">Parte 1</a>
					<ul>
						<li><a href="formulario.php">Formulario</a>
						<li><a href="Buscar.php">Buscar</a>


					</ul>
				</li>
				<li><a href="parte2.php">Parte 2</a></li>
				<li><a href="jquery.php">Jquery</a></li>
				<li><a href="ajax.php">Ajax</a></li>

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
	
	
	
	
	
	
	