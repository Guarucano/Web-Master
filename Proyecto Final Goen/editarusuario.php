<?php include("header.php"); 

?>
<div id="principal" class="container-fluid">
	<div class="row">
		<div class=" col-md-6 col-md-offset-3">
			<br>
			
			<legend>Editar Datos Personales</legend>

			<div class="form-group">
				<label class="control-label" for="buscar">Buscar:</label>
				<div class="input-group">
					<input class="form-control" id="buscar" type="text" name="buscar" placeholder="" value="18122997">
					<span class="input-group-addon btn btn2" id="buscaru"><span class="glyphicon glyphicon-search"></span></span>
				</div>
			</div>

			<form action="modules/modificarUsuario.php" method="post" id="formulario" class="">
				<div class="form-group">
					<label class="control-label" for="nombre">Nombre:</label>
					<div class="input-group">
						<input class="form-control" id="nombre" type="text" name="nombre" placeholder="" readonly="false" value="">
						<input class="form-control" id="idoculto" type="hidden" name="idoculto" placeholder="" readonly="false" value="">
						<span class="input-group-addon btn" onclick='document.getElementById("nombre").removeAttribute("readonly"  , false)' ><span class="glyphicon glyphicon-edit"></span></span>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label" for="apellido">Apellido:</label>
					<div class="input-group">
						<input class="form-control" id="apellido" type="text" name="apellido" placeholder="" readonly="false">
						<span class="input-group-addon btn" onclick='document.getElementById("apellido").removeAttribute("readonly"  , false)' ><span class="glyphicon glyphicon-edit"></span></span>
					</div>
				</div>

				<div class="form-group" id="cedulagroup">
					<label class="control-label" for="cedula">Cédula:</label>
					<div class="input-group">
						<input class="form-control" id="cedula" type="text" name="cedula" autocomplete="off" placeholder="" value="" readonly="false">
						<span class="input-group-addon btn" onclick='document.getElementById("cedula").removeAttribute("readonly"  , false)' ><span class="glyphicon glyphicon-edit"></span></span>
					</div>

					<div class='alert alert-danger' id="alertvci" role='alert' style="display: none;">La cédula ingresada no es válida</div>

					<div class='alert alert-danger' id="alertci" role='alert' style="display: none;">La cédula ingresada ya existe en la base de datos</div>
				</div>
				

				<div class="form-group">
					<label class="control-label" for="genero">Género:</label>
					<div class="input-group">
						<select name="genero" id="genero" class="form-control" disabled="false">
							<option value="femenino">Femenino</option>
							<option value="masculino">Masculino</option>
						</select>
						<span class="input-group-addon btn" onclick='document.getElementById("genero").removeAttribute("disabled"  , false)' ><span class="glyphicon glyphicon-edit"></span></span>
					</div>
				</div>

				<div class="form-group" id="emailgroup">
					<label class="control-label" for="email">Correo electrónico:</label>
					<div class="input-group">
						<input class="form-control" id="email" type="email" name="email" autocomplete="off" placeholder="" onpaste="return false" readonly="false">
						<span class="input-group-addon btn" onclick='document.getElementById("email").removeAttribute("readonly"  , false)' ><span class="glyphicon glyphicon-edit"></span></span>
					</div>
					<div class='alert alert-info' id="infoemail" role='alert' style="display: none;">Es importante que el correo electrónico sea válido ya que allí le será enviada información importante</div>

					<div class='alert alert-danger' id="alertemail" role='alert' style="display: none;">El correo electrónico ya existe en la base de datos</div>

					<div class='alert alert-danger' id="alertvemail" role='alert' style="display: none;">El formato del correo electrónico no es válido</div>
				</div>

				<div class="form-group">
					<label class="control-label" for="estado">Selecione un Estado:</label>
					<div class="input-group">
						<select name="estado" id="estado" class="form-control" disabled="false">
							<option value="" selected>Selecione un Estado</option>
							<option value="Amazonas">Amazonas</option>
							<option value="Anzo&aacute;tegui">Anzo&aacute;tegui</option>
							<option value="Apure">Apure</option>
							<option value="Aragua">Aragua</option>
							<option value="Barinas">Barinas</option>
							<option value="Bol&iacute;var">Bol&iacute;var</option>
							<option value="Carabobo">Carabobo</option>
							<option value="Cojedes">Cojedes</option>
							<option value="Delta Amacuro">Delta Amacuro</option>
							<option value="Distrito Capital">Distrito Capital</option>
							<option value="Falc&oacute;n">Falc&oacute;n</option>
							<option value="Guarico">Guarico</option>
							<option value="Lara">Lara</option>
							<option value="M&eacute;rida">M&eacute;rida</option>
							<option value="Miranda">Miranda</option>
							<option value="Monagas">Monagas</option>
							<option value="Nueva Esparta">Nueva Esparta</option>
							<option value="Portuguesa">Portuguesa</option>
							<option value="Sucre">Sucre</option>
							<option value="T&aacute;chira">T&aacute;chira</option>
							<option value="Trujillo">Trujillo</option>
							<option value="Vargas">Vargas</option>
							<option value="Yaracuy">Yaracuy</option>
							<option value="Zulia">Zulia</option>
						</select>
						<span class="input-group-addon btn" onclick='document.getElementById("estado").removeAttribute("disabled"  , false)' ><span class="glyphicon glyphicon-edit"></span></span>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label" for="ciudad">Ciudad:</label>
					<div class="input-group">
						<input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="" readonly="false">
						<span class="input-group-addon btn" onclick='document.getElementById("ciudad").removeAttribute("readonly"  , false)' ><span class="glyphicon glyphicon-edit"></span></span>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label" for="direccion">Dirección</label>
					<div class="input-group">
						<textarea class="form-control" id="mensaje" name="direccion" placeholder="" readonly="false"></textarea>
						<span class="input-group-addon btn" onclick='document.getElementById("mensaje").removeAttribute("readonly"  , false)' ><span class="glyphicon glyphicon-edit"></span></span>
					</div>

				</div>
				<div class="form-group">
					<label class="control-label" for="numero">Numero telefónico</label><br>
					<div class="row">
						<div class="col-xs-5 col-sm-3 col-md-3">
							<div class="input-group">
								<select  class="form-control" name="cod" id="option" disabled="false">
									<option value="" disabled>Numero</option>
									<option value="0414">0414</option>
									<option value="0424">0424</option>
									<option value="0412">0412</option>
									<option value="0416">0416</option>
									<option value="0426">0426</option>
								</select>
								<span class="input-group-addon btn" onclick='document.getElementById("option").removeAttribute("disabled"  , false)' ><span class="glyphicon glyphicon-edit"></span></span>
							</div>
						</div>
						<div class="col-xs-7 col-sm-9 col-md-9">
							<div class="form-group">
								<div class="input-group">
									<input class="form-control" id="numero" type="number" name="numero" placeholder="" readonly="false">
									<span class="input-group-addon btn" onclick='document.getElementById("numero").removeAttribute("readonly"  , false)' ><span class="glyphicon glyphicon-edit"></span></span>
								</div>
								<div class='alert alert-danger' id="alertvphone" role='alert' style="display: none;">El número telefónico ingresado no es válido</div>
							</div>
						</div>	
					</div>	
				</div>

				<legend>Datos de Usuario</legend>
				<div class="form-group" id="usuariogroup">
					<label class="control-label" for="nombre">Usuario:</label>
					<div class="input-group">
						<input class="form-control" id="usuario" name="usuario" type="text" autocomplete="off" placeholder="" readonly="false">
						<span class="input-group-addon btn" onclick='document.getElementById("usuario").removeAttribute("readonly"  , false)' ><span class="glyphicon glyphicon-edit"></span></span>
					</div>
					<div class='alert alert-danger' id="alertuser" role='alert' style="display: none;">El usuario ya existe en la base de datos</div>
				</div>
				<div class="form-group" id="passgroup">
					<label class="control-label" for="nombre">Contraseña:</label>
					<div class="input-group">
						<input class="form-control" id="password" name="password" type="text" placeholder="" onpaste="return false" readonly="false">
						<span class="input-group-addon btn" onclick='document.getElementById("password").removeAttribute("readonly"  , false)' ><span class="glyphicon glyphicon-edit"></span></span>

					</div>
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

$(document).ready(function(){
	$("#buscaru").click(function(e){
		e.preventDefault();
		var cedula = $("#buscar").val();
		$.ajax({
			url: "modules/editarUsuario.php",
			type: "post",
			data: {
				ci: cedula
			},
			dataType: "json"
		}).done(
			function(data){
				$("#nombre").empty();
				$("#nombre").val(data.nombre);
				$("#apellido").val(data.apellido);
				$("#cedula").val(data.cedula);
				$("#genero").val(data.genero);
				$("#email").val(data.email);
				$("#estado").val(data.estado);
				$("#ciudad").val(data.ciudad);
				$("#mensaje").val(data.direccion);
				$("#email").val(data.email);
				$("#option").val(data.telefono.substr(0,4));
				$("#numero").val(data.telefono.substr(5,12));
				$("#usuario").val(data.usuario);
				$("#password").val(data.clave);
				$("#idoculto").val(data.id);
			} 			
		).fail(
			function(error){
				console.log("error");
				console.log(error);
			}
		);
	});
});

</script>
</body>
</html>