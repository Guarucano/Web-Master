<?php 
session_start(); 
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>GOEN</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/style.css">
	<link href="../../css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">
	<link href="../../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
	<link rel="icon" href="../../images/Logo-GOEN-tinytransp.png" type="image/x-icon">
	<link rel="stylesheet" href="../../css/blog.css">
	<link rel="stylesheet" href="../../css/carousel.css">
	<link href="../../css/jquery.smartmenus.bootstrap.css" rel="stylesheet">

	
</head>
<body>
	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
					<div class="logo">
						<a href="../../index.php"><img src="../../images/goen2.png" alt="Goen Maracaibo"></a>
					</div>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="../../index.php">Inicio</a></li>
						<li><a href="page_1.php">Blog</a></li>
						<li><a href="../../acerca.php">Acerca</a></li>
						<li><a href="../../contacto.php">Contacto</a></li>
						<?php 
						if (!$_SESSION['autenticado'])
						{
							echo "<li><a href='../../inisesion.php'>Iniciar sesion</a></li>";
						}
						?>

						<?php 
						if ($_SESSION['autenticado'])
						{
							echo "<li><a href='../../index.php'>".$_SESSION['nombre']."<span class='caret'></span></a>";						
							echo "<ul class='dropdown-menu'>";
							if ($_SESSION['rolid'] == 1) {
								echo "<li><a href='../../admin.php'>Administrador</a></li>";
								echo "<li class='divider'></li>";
							}
							echo "<!--<li><a href='#'>Perfil</a></li>";
							echo "<li class='divider'></li>-->";
							echo "<li><a href='../../pago.php'>Inscribete</a></li>";
							echo "<li class='divider'></li>";
							echo "<li><a href='../../modules/cerrarsesion.php'>Cerrar Sesion</a></li>";
						}
						?>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
</header>