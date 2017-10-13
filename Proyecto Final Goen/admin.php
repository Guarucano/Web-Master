<?php include("header.php"); ?>

<?php 
if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] && $_SESSION['rolid'] == 1) {
		# code...
} else {
	header("Location: inisesion.php");
}
?>

<div class="container-fluid">
	<div class="row">
		<div id="mostrar" class="col-xs-12 hidden-sm hidden-md hidden-lg">
			<br>
			<button id="btnmostrar" class="btn btn-default">
				Mostrar menú	
			</button>
		</div>

		<div class="col-xs-12 col-sm-3 col-md-2 sidebar">
			<ul>
				<li><a onclick="mostrarPrueba1()">Confirmar pagos</a></li>
				<li><a onclick="mostrarPrueba2()">Editar Usuario</a></li>
				<!--<li><a onclick="mostrarPrueba3()">Prueba 3</a></li>-->
			</ul>
		</div>
		<div id="prueba1" class="col-xs-12 col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 with-sidebar" style="display: none;">
			<div class="row">
				<div class="col-xs-12" id="mainconfpag">
					<legend>Datos de Pago</legend>

					<div class="form-group">
						<label for="">Seleccione Usuario</label>
						<select id="usuario2" name="usuario2" class="form-control">
							<option value="">Seleccione usuario</option>
							<?php 
							$conn = new mysqli("localhost","root","","goen");
							$sql = "SELECT DISTINCT usuario.usuario, usuario.idusuario FROM usuario JOIN pagos ON usuario.idusuario = pagos.idusuario  WHERE pagoconfirmado = 0";
							$query = $conn->query($sql);
							while ($rs = mysqli_fetch_array($query)) {
								echo "<option value='".$rs["idusuario"]."'>".$rs["usuario"]."</option>";
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<label class="control-label" for="numeroPago">Numero del depósito / Transferencia y Fecha:</label>
						<div class="form-group">
							<select id="idDePago" name="idDePago" class="form-control">
							</select>

						</div>
					</div>


					<div class="form-group">
						<label class="control-label" for="descripcion">Descripción del pago:</label>
						<textarea class="form-control" id="descPago" name="descPago" readonly=""></textarea>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-goen">
								<div class="panel-heading">
									<h3 class="panel-title">Comprobante de Pago</h3>
								</div>
								<div class="panel-body">
									<div class="container" id="bauche">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" id="confpago">Confirmar pago</button>
					</div>

				</div>


				<div id="cargandoconfpag" class="container-fluid" style="display: none;">
					<br>
					<div class="row">
						<div class="col-xs-12">
							<legend>Confirmando pago</legend>
							<div class="progress">
								<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
									<span class="sr-only">Procesando</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="guardadoconfpag" class="container-fluid" style="display: none;">
					<br>
					<div class="row">
						<div class="col-xs-12">
							<legend>Pago confirmado exitosamente</legend>
							<div class="progress">
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
									<span class="sr-only">Procesando</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- DESDE AQUÍ MODIFICAR DATOS DE USUARIO -->

		<div id="prueba2" class="col-xs-12 col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 with-sidebar" style="display: none;">
			<div class="row">
				<div id="mainmodus" class="col-xs-12">
					<legend>Editar Datos Personales</legend>

					<div class="form-group">
						<label class="control-label" for="buscar">Buscar:</label>
						<div class="input-group">
							<input class="form-control" id="buscar" type="text" name="buscar" placeholder="" value="">
							<span class="input-group-addon btn btn2" id="buscaru"><span class="glyphicon glyphicon-search"></span></span>
						</div>
					</div>

					<form action="modules/modificarUsuario.php" method="post" id="formmodus" class="">
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
											<option value="0414" selected>0414</option>
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
							<button class="btn btn-primary" id="enviarModUs">Guardar cambios</button>
							<!--<button class="btn btn-danger">Eliminar usuario</button>-->
						</div>
					</div>
				</div>
				<div id="cargandomodus" class="container-fluid" style="display: none;">
					<br>
					<div class="row">
						<div class="col-xs-12">
							<legend>Guardando datos de usuario</legend>
							<div class="progress">
								<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
									<span class="sr-only">Procesando</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="guardadomodus" class="container-fluid" style="display: none;">
					<br>
					<div class="row">
						<div class="col-xs-12">
							<legend>Datos guardados exitosamente</legend>
							<div class="progress">
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
									<span class="sr-only">Procesando</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- HASTA AQUÍ MODIFICAR DATOS DE USUARIO -->

			<div id="prueba3" class="col-xs-12 col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 with-sidebar" style="display: none;">
				<legend>Prueba 3</legend>
				<h3>Esto es Prueba 3</h3>
			</div>
		</div>
	</div>
	<?php include("footer.php"); ?>

	<script type="text/javascript" src="js/admin.js"></script>

	<!-- Script DatePicker Fecha -->
	<script type="text/javascript">
		$('.form_datetime').datetimepicker({
        //language:  'es',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
		$('.form_date').datetimepicker({
			language:  'es',
			weekStart: 1,
			todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0
		});
		$('.form_time').datetimepicker({
			language:  'es',
			weekStart: 1,
			todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 1,
			minView: 0,
			maxView: 1,
			forceParse: 0
		});
	</script>
	<!-- - - - - - - - -->

	<script type="text/javascript">
		$(document).ready(function(){
			$("#usuario2").change(function(e){
				e.preventDefault();
				var idusuario = $("#usuario2").val();
				$.ajax({
					url: "modules/buscarpago.php",
					type: "post",
					data: {
						id: idusuario
					},
					dataType: "json"
				}).done(

				function(data){

					$("#idDePago").empty();
					$("#idDePago").html("<option value=''>Escoja su Opción</option>");
					for (var i = 0; i < data.length; i++) {
						$("#idDePago").append("<option value='"+data[i].idpago+"'>"+data[i].numeropago+" - "+data[i].fecha.substr(0,10)+"</option>");

					}

				} 			
				).fail(
				function(error){

				}
				);

			});
		});


		$(document).ready(function(){
			$("#idDePago").change(function(e){
				e.preventDefault();
				var idpago = $("#idDePago").val();
				$.ajax({
					url: "modules/buscarpago2.php",
					type: "post",
					data: {
						id2: idpago
					},
					dataType: "json"
				}).done(

				function(data){

					$("#descPago").empty();
					for (var i = 0; i < data.length; i++) {
						$("#descPago").append(data[i].descripcionpago);
						$("#bauche").empty();
						$("#bauche").append("<img src='imgpago/"+data[i].imgpago+"' class='img-thumbnail' alt='Cinque Terre' style='width:500px ;height:250px'>");

					}

				} 			
				).fail(
				function(error){

				}
				);

			});
		});

		$(document).ready(function(){
			$("#confpago").click(function(e){
				e.preventDefault();
				var idusuario = $("#usuario2").val();
				var idpago2 = $("#idDePago").val();
				$.ajax({
					url: "modules/confirmarPago.php",
					type: "post",
					data: {
						idu: idusuario,
						idp: idpago2
					},
					dataType: "json",
					beforeSend: function () {
						$("#mainconfpag").slideUp();
						$("#cargandoconfpag").slideDown();
					},
					success: function (data) {
						$("#cargandoconfpag").hide();
						$("#guardadoconfpag").show();
					},
					fail: function (error) {
						console.log("error");
					}
				});
			});
		});

	</script>

	<script type="text/javascript">
		$(document).ready(function () {
			$("div.sidebar a").click(function () {
				hideSidebarIfNeed();
				$("div.sidebar a").removeClass("active");
				$(this).addClass("active");
			})
		})

		function mostrarPrueba1() {
			$("div.with-sidebar").slideUp();
			$("#prueba1").slideDown();
			$("#guardadoconfpag").hide();
			$("#mainconfpag").show(function () {
				$("#prueba1").slideDown();
			});
		}

		function mostrarPrueba2() {
			$("div.with-sidebar").slideUp();
			$("#guardadomodus").hide();
			document.getElementById("formmodus").reset();
			$("#mainmodus").show(function () {
				$("#prueba2").slideDown();
			});
		}

		function mostrarPrueba3() {
			$("div.with-sidebar").slideUp();
			$("#prueba3").slideDown();

		}

		function hideSidebarIfNeed() {
			if ($(window).width() < 768) {
				$('#mostrar').show();
				$("div.sidebar").hide(); 
			}
		}

		function hideInfoIfNeed() {
			if ($(window).width() < 768) {
				$("div.with-sidebar").hide(); 
			}
		}

		$("#btnmostrar").click(function () {
			hideInfoIfNeed();
			$('#mostrar').hide();
			$("div.sidebar").show(); 
		})

		$("#buscaru").click(function (e) {
			buscarDatosDeUsuario(e);
		})

		$("#enviarModUs").click(function (e) {
			modificarUsuario(e);
		})

	</script>

</body>
</html>