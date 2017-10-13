<?php include("header.php"); ?>
<?php 

if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {

} else {
	header("Location:". 'error.php');
}
?>
<!-- <div class="container">
	<section class="main row">
			 <aside class="col-xs-12 col-sm-4 col-md-3">
				<p>
					<h3>Datos de usuario</h3>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis rem saepe at laborum? Accusantium iste quod ea nesciunt, harum cum assumenda? Rem aspernatur, beatae obcaecati magnam maiores libero excepturi, tempora.
				</p>
			</aside>
		</section> 
</div> -->

<div class="container-fluid">
	<div class="row">
		<div class="container col-md-6 col-md-offset-3">
			<br>
			<form action="modules/registrarPagoPre.php" method="post" id="formulario" class="">
				<legend>Datos del Depósito</legend>
				<div class="form-group">
					<label for="deposito">Número de Depósito / Transferencia:</label>
					<input class="form-control" id="deposito" type="text" name="deposito" placeholder="Nombre:">
				</div>

				<div class="form-group">
					<label for="fecha">Fecha del depósito:</label>
					<input class="form-control" id="fecha" type="date" name="fecha" placeholder="Apellido:">
				</div>

				<div class="form-group">
					<label for="hora">Hora del depósito:</label>
					<input class="form-control" id="hora" type="text" name="hora" autocomplete="off" placeholder="Cedula:">
				</div>

				<!-- <div class="form-group">
					<label for="archivo">Archivo:</label>
					<input type="file" id="archivo">
					<p class="help-block">Maximo 50MB</p>
				</div> -->

				<div class="form-group">
					<button class="btn btn-primary" id="enviar">Enviar</button>
				</div>

			</form>
		</div>
	</div>
</div>


	
	<?php include("footer.php"); ?>
</body>
</html>