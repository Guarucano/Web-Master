<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Clase 2 - Ejemplo 1</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
			<h1>FORMULARIO DE REGISTRO</h1>
				<form action="modules/registro.php" method="post" id="form">
					<div class="form-group">
						<label for="">Cédula</label>
						<input type="text" class="form-control" id="cedula"
						name = "cedula">
						<label for="">Nombre</label>
						<input type="text" class="form-control" id="nombre"
						name = "nombre">
						<label for="">Apellido</label>
						<input type="text" class="form-control" id="apellido"
						name = "apellido">
						<label for="">Profesión</label>
						<input type="text" class="form-control" id="profe"
						name = "profe">
						<label for="">F. de Nacimiento</label>
						<input type="date" class="form-control" id="fnac"
						name = "fnac">
						<br><br>
						<input type="submit" class="form-control btn btn-info">
					</div>
				</form>
			</div>
		</div>
		<div class="row" style="margin-top: 3%;">
		<h1>Consultar Datos</h1>
			<form id="form2">
				<div class="col-md-offset-4 col-md-4">
					<input type="text" id="cedulab">
					<input type="submit">
				</div>
			</form>
		</div>
	</div>
</body>
	<script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script type="text/javascript">
		//AJAX
		$(document).ready(function(){
			$("#form").submit(function(e){
				e.preventDefault();

				var id = $("#cedula").val();
				var name = $("#nombre").val();
				var last = $("#apellido").val();
				var proff = $("#profe").val();
				var bdate = $("#fnac").val();

				$.ajax({
					url: "modules/registro.php",
					type: "post",
					data: {
						cedula: id,
						nombre: name,
						apellido: last,
						profe: proff,
						fnac: bdate
					},
					dataType: "json"
				}).done(
					function(data){
						
						document.getElementById("form").reset();
						alert("Registro Exitoso");

					}
				).fail(
					function(error){

					}
				);
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#form2").submit(function(e){
				e.preventDefault();

				var id2 = $("#cedulab").val();

				$.ajax({
					url: "modules/telefonos.php",
					type: "post",
					data: {
						cedula: id2
					},
					dataType: "json"
				}).done(
					function(data){
						for (var i = 0; i < data.length; i++) {
							console.log(data[i]);
						}
					}
				).fail(
					function(error){
						alert("Fue atacado por el imperio");
						console.log(error);
					}
				);

			});
		});
	</script>
</html>