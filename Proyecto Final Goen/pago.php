<?php include("header.php"); ?>
<?php 
						if (!$_SESSION['autenticado'])
						{
							header("Location: inisesion.php");
						}				

$conn = new mysqli("localhost","root","","goen");
$sql = "select  from modulos;";
$sql2 = "SELECT curso.idcurso, curso.idmodulo, modulos.nombremodulo FROM curso JOIN modulos ON curso.idmodulo = modulos.idmodulo";
$query = $conn->query($sql2);

?>


<?php 
	if (isset($_SESSION['autenticado']) && $_SESSION['autenticado']) {
		# code...
	} else {
		header("Location: inisesion.php");
	}
?>

<div id="principal" class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<br>
			<form action="modules/registrarPago.php" method="post" id="formulario" class="" enctype="multipart/form-data">
				<legend>Datos de Pago</legend>
				
				<div class="form-group">
				<label for="">Seleccione Seccion</label>
						<select id="idmodulo" name="idmodulo" class="form-control">
							<?php 
								while ($rs = mysqli_fetch_array($query)) {
									echo "<option value='".$rs["idcurso"]."'>".$rs['idcurso']." - ".$rs["nombremodulo"]."</option>";
								}
							 ?>
						</select>
				</div>

				<div class="form-group">
					<label class="control-label" for="numeroPago">Numero del depósito / Transferencia:</label>
					<input class="form-control" id="numeroPago" type="text" name="numeroPago" placeholder="">

					<div class='alert alert-danger' id="alertvnumeropago" role='alert' style="display: none;">El número del depósito o transferencia ingresado no es válido</div>
				</div>

				<div class="form-group">
					<label class="control-label" for="fechaPago">Fecha del depósito / Transferencia:</label>
					<!-- <input class="form-control" id="fechaPago" type="date" name="fechaPago" placeholder="Fecha de Deposito / trasferencia:"> -->
					<div class="input-group date form_datetime" data-date="2016-05-14T8:25:07Z" data-date-format="dd-MM-yyyy HH:ii:ss" data-link-field="dtp_input1">
						<input class="form-control" size="16" type="text" value="" readonly="" placeholder="" name="date">
						<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
						<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label" for="descripcion">Descripción del pago:</label>
					<textarea class="form-control" id="descPago" name="descPago"></textarea>
				</div>

				<div class="form-group">
					<label class="control-label" for="genero">Cargar comprobante de pago:</label>
					<input id="filePago" name="fileToUpload" type="file" class="file" multiple data-show-upload="false" >
				</div>

				<div class="form-group">
					<button class="btn btn-primary" id="enviar" type="submit" name="submit">Enviar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="cargando" class="container-fluid" style="display: none;">
	<br>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<legend>Cargando datos de pago</legend>
			<div class="progress">
				<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
					<span class="sr-only">Procesando</span>
				</div>
			</div>
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
				<h4 class="modal-title" id="myModalLabel">Hay errores en el formulario</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" id="cerrarb">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<?php include("footer.php"); ?>

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
	function checkAll() {
		var inputs = $("form#formulario :input");

		for (var i = 0; i < inputs.length; i++) {
			var check = checkInput(inputs.eq(i));
			if (inputs.eq(i).attr('id') != 'enviar' && inputs.eq(i).attr('id') != 'cerrarp' && inputs.eq(i).attr('id') != 'cerrarb' && !inputs.eq(i).hasClass('fileinput-remove') && !inputs.eq(i).hasClass('fileinput-cancel')) {
				if (!check) {
					console.log("For: ");
					console.log(inputs.eq(i));
					console.log("Check was: " + check);
					return false;
				}
			}
		}
		console.log("All was well...");
		return true;
	}

	$('#enviar').click(function (e) {
		if (checkAll()) {
			$("#principal").slideUp();
			$("#cargando").slideDown();
		} else {
			e.preventDefault();
			$('#myModal').modal();
		}
		
	})

	$('#numeroPago').blur(function () {
		validateNumeroPago($(this));
	})
</script>

</body>
</html>