<!DOCTYPE html>
<?php 
	$conn = new mysqli("localhost","root","","personas");
	$sql = "select * from telefonos;";
	$query = $conn->query($sql);
 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Clase 2 - Ejemplo 2</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 3%">
			<div class="col-md-offset-4 col-md-4">
				<div class="form-group">
					<form action="" id="formulario" method="post">
						<label for="">Seleccione el numero</label>
						<select id="numero" class="form-control">
							<?php 
								while ($rs = mysqli_fetch_array($query)) {
									echo "<option value='".$rs["Personas_cedula"]."'>".$rs["cod_area"]." ".$rs["numero"]."</option>";
								}
							 ?>
						</select>
						<br>
						<label for="">Persona</label>
						<div id="resp"></div>
						
						<!--<select id="resp" class="form-control">
							RESULTADOS
						</select-->					
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
	<script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#numero").change(function(e){
				e.preventDefault();
				var num = $("#numero").val();
				$.ajax({
					url: "modules/consulta.php",
					type: "post",
					data: {
						number: num
					},
					dataType: "json"
				}).done(
					function(data){

						$("#resp").html(data);

					/*	for (var i = 0; i < data.length; i++) {
							$("#resp").append("<option value='"+data[i]+"'>"+data[i]+"</option>");
						}*/
					}
				).fail(
					function(error){

					}
				);

			});
		});
	</script>
</html>
<?php 
	$conn->close();
 ?>