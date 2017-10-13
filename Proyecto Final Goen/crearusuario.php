<?php include("header.php"); ?>
<div id="principal" class="container-fluid">
	<div class="row">
		<div class=" col-md-6 col-md-offset-3">
			<br>
			<form action="modules/registrarUsuario.php" method="post" id="formulario" class="">
				<legend>Datos Personales</legend>
				<div class="form-group">
					<label class="control-label" for="nombre">Nombre:</label>
					<input class="form-control" id="nombre" type="text" name="nombre" placeholder="">
				</div>

				<div class="form-group">
					<label class="control-label" for="apellido">Apellido:</label>
					<input class="form-control" id="apellido" type="text" name="apellido" placeholder="">
				</div>

				<div class="form-group" id="cedulagroup">
					<label class="control-label" for="cedula">Cédula:</label>
					<input class="form-control" id="cedula" type="text" name="cedula" autocomplete="off" placeholder="">

					<div class='alert alert-danger' id="alertvci" role='alert' style="display: none;">La cédula ingresada no es válida</div>

					<div class='alert alert-danger' id="alertci" role='alert' style="display: none;">La cédula ingresada ya existe en la base de datos</div>
				</div>

				<div class="form-group">
					<label class="control-label" for="genero">Género:</label>
					<select name="genero" id="genero" class="form-control">
						<option value="femenino">Femenino</option>
						<option value="masculino">Masculino</option>
					</select>
				</div>

				<div class="form-group" id="emailgroup">
					<label class="control-label" for="email">Correo electrónico:</label>
					<input class="form-control" id="email" type="email" name="email" autocomplete="off" placeholder="" onpaste="return false">
					
					<div class='alert alert-info' id="infoemail" role='alert' style="display: none;">Es importante que el correo electrónico sea válido ya que allí le será enviada información importante</div>
	
					<div class='alert alert-danger' id="alertemail" role='alert' style="display: none;">El correo electrónico ya existe en la base de datos</div>

					<div class='alert alert-danger' id="alertvemail" role='alert' style="display: none;">El formato del correo electrónico no es válido</div>
				</div>

				<div class="form-group" id="emailgroup2">
					<label class="control-label" for="email2">Repita correo electrónico:</label>
					<input class="form-control" id="email2" type="email" name="email2" autocomplete="off" placeholder="" onpaste="return false">
					<div class='alert alert-danger' id="alertemail2" role='alert' style="display: none;">Los correos electrónicos no coinciden</div>
				</div>


				<input type="hidden" name="estado" value="Zulia">

				<div class="form-group">
					<label class="control-label" for="estado">Estado:</label>
					<select name="" id="estado" class="form-control" disabled="">
						<option value="Zulia" selected>Zulia</option>
					</select>
				</div>

				<div class="form-group">
					<label class="control-label" for="ciudad">Ciudad:</label>
					<input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="">
				</div>

				<div class="form-group">
					<label class="control-label" for="direccion">Dirección</label>
					<textarea class="form-control" id="mensaje" name="direccion" placeholder=""></textarea>

				</div>
				<div class="form-group">
					<label class="control-label" for="numero">Numero telefónico</label><br>
					<div class="row">
						<div class="col-xs-5 col-sm-3 col-md-3">
							<select  class="form-control" name="cod" id="option">
								<option value="" disabled>Numero</option>
								<option value="0414">0414</option>
								<option value="0424">0424</option>
								<option value="0412">0412</option>
								<option value="0416">0416</option>
								<option value="0426">0426</option>
							</select>
						</div>
						<div class="col-xs-7 col-sm-9 col-md-9">
							<div class="form-group">
								<input class="form-control" id="numero" type="number" name="numero" placeholder="">
								<div class='alert alert-danger' id="alertvphone" role='alert' style="display: none;">El número telefónico ingresado no es válido</div>
							</div>
						</div>	
					</div>	
				</div>

				<legend>Datos de Usuario</legend>
				<div class="form-group" id="usuariogroup">
					<label class="control-label" for="nombre">Usuario:</label>
					<input class="form-control" id="usuario" name="usuario" type="text" autocomplete="off" placeholder="">

					<div class='alert alert-danger' id="alertuser" role='alert' style="display: none;">El usuario ya existe en la base de datos</div>
				</div>
				<div class="form-group" id="passgroup">
					<label class="control-label" for="nombre">Contraseña:</label>
					<input class="form-control" id="password" name="password" type="password" placeholder="" onpaste="return false">
				
					<div class='alert alert-info' id="infopass" role='alert' style="display: none;">
						Su contraseña debe contener:
						<ul>
							<li>Entre seis (6) y veinte (20) caracteres</li>
							<li>Al menos una letra minúscula</li>
							<li>Al menos una letra mayúscula</li>
							<li>Al menos un número</li>
							<li>Al menos un caracter especial ("!","?",".",",","@")</li>
						</ul>
					</div>

					<div class='alert alert-danger' id="alertvpass" role='alert' style="display: none;">La contraseña ingresa no es válida</div>

				</div>
				<div class="form-group" id="passgroup2">
					<label class="control-label" for="nombre">Repita contraseña:</label>
					<input class="form-control" id="password2" name="password2" type="password" placeholder="" onpaste="return false">
					<div class='alert alert-danger' id="alertpass" role='alert' style="display: none;">Las contraseñas no coinciden</div>
				</div>

				<div class="form-group">
					<button class="btn btn-primary" id="enviar">Enviar</button>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrarp"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<h4 class="modal-title" id="myModalLabel">Hay errores en el formulario</h4>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal" id="cerrarb">Cerrar</button>
							</div>
						</div>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>

<div id="cargando" class="container-fluid" style="display: none;">
	<br>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<legend>Creando usuario</legend>
			<div class="progress">
				<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
					<span class="sr-only">Procesando</span>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("footer.php"); ?>

<script>
	$(document).ready(function () {
		$(":input").blur(function () {
			checkInput($(this));
		})

		$("#email").focus(function () {
			$("#infoemail").slideDown();
		})

		$("#email").blur(function () {
			$("#infoemail").slideUp();
		})

		$("#password").focus(function () {
			$("#infopass").slideDown();
		})

		$("#password").blur(function () {
			$("#infopass").slideUp();
		})

		$("#password2").keypress(function () {
			checkEqualPass($(this));
		})

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
				console.log("All was well... Again.");
				$("#principal").slideUp();
				$("#cargando").slideDown();
				$('#formulario').submit();
			} else {
				$('#myModal').modal();
			}
		});
	})
</script>
</body>
</html>