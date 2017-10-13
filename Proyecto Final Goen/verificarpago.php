<?php include("header.php");  
$conn = new mysqli("localhost","root","","goen");
$sql = "SELECT DISTINCT usuario.usuario, usuario.idusuario FROM usuario JOIN pagos ON usuario.idusuario = pagos.idusuario  WHERE pagoconfirmado = 0";
$query = $conn->query($sql);
?>

<div id="principal" class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<br>
			<form action="modules/confirmarPago.php" method="post" id="formulario" class="" enctype="multipart/form-data">
				<legend>Datos de Pago</legend>

				<div class="form-group">
					<label for="">Seleccione Usuario</label>
					<select id="usuario" name="usuario" class="form-control">
						<option value="">Seleccione usuario</option>
						<?php 
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
					<button class="btn btn-primary" id="enviar">Enviar</button>
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
	$(document).ready(function(){
		$("#usuario").change(function(e){
			e.preventDefault();
			var idusuario = $("#usuario").val();
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
		$("#enviar").click(function(e){
			e.preventDefault();
			var idusuario = $("#usuario").val();
			var idpago2 = $("#idDePago").val();
			$.ajax({
				url: "modules/confirmarPago.php",
				type: "post",
				data: {
					idu: idusuario,
					idp: idpago2
				},
				dataType: "json"
			}).done(
			
			function(data){
				console.log("bien");

			} 			
			).fail(
			function(error){
				console.log("error");
			}
			);

		});
	});

</script>
</script>



</body>
</html>

<?php 
$conn->close();
?>