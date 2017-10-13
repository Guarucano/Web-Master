<?php include("header.php"); ?>
<div class="container-fluid">
	<div class="row">
		<div class=" col-md-4 col-md-offset-4">
			<br>
			<form action="modules/sesion.php" method="post" id="formulario" class="">
				<legend>Iniciar Sesion</legend>
				<div class="form-group">
					<label class="control-label" for="usuario">Usuario:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input class="form-control" id="user" name="usuario" type="text" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label" for="password">Contraseña:</label>
					<div class="input-group">
	                	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input class="form-control" id="pass" name="password" type="password" placeholder="" onpaste="return false">
					</div>
				</div>

				<div class="row">
					<div class="col-sm-1">
						<div class="form-group">
							<button id="enviar" class="btn btn-primary">Iniciar sesion</button>
						</div>
					</div>
					<div class="col-sm-1 col-sm-offset-9 col-md-offset-8">
						<div class="form-group">
							<a href="crearusuario.php" class="btn btn-link">Crear Cuenta</a>
						</div>
					</div>
				</div>
				
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrarp"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<h4 class="modal-title" id="myModalLabel">Debe llenar todos los campos</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" id="cerrarb">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<?php include("footer.php"); ?>
<script>
	function checkAll() {
		var inputs = $("form#formulario :input");

		for (var i = 0; i < inputs.length; i++) {
			var check = checkInput(inputs.eq(i));
			if (inputs.eq(i).attr('id') != 'enviar' && inputs.eq(i).attr('id') != 'cerrarp' && inputs.eq(i).attr('id') != 'cerrarb') {
				if (!check) {
					console.log("For: ");
					console.log(inputs.eq(i));
					console.log("Check was: " + check);
					return false;
				}
			}
		}
		console.log("All was well.");
		return true;
	}

	$('#enviar').click(function (e) {
		e.preventDefault();
		if (checkAll()) {
			$('#formulario').submit();
		} else {
			$('#myModal').modal();
		}
		
	})
</script>
</body>
</html>