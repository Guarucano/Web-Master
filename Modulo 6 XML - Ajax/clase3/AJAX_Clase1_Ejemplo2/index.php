<!DOCTYPE html>
<html>
<head>
	<title>Ejemplo - Clase 1 AJAX</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
<div class="container">
	<div class="row" style="margin-top: 150px;">
		<div class="col-md-4">
			<form id="formulario" method="post" action="modules/oper.php">
				<label>Valor de A</label>
				<input type="number" name="valorA" id="valorA">
				<br>
				<label>Valor de B</label>
				<input type="number" name="valorB" id="valorB">
				<br>
				<input type="submit" value="Enviar">
			</form>
		</div>
		<div class="col-md-4">
			<div id="image"></div>
		</div>
		<div class="col-md-4"></div>	
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#formulario").submit(function(e){
			e.preventDefault();

			var val_A = $("#valorA").val();
			var val_B = $("#valorB").val();

			$.ajax({
				url: "modules/oper.php",
				type: "post",
				data: {
					valorA: val_A,
					valorB: val_B
				},
				beforeSend: function(){
					$("#formulario").fadeOut("fast");
					$("#image").html("<img src='img/preloader.gif'>");
				},
				success: function(resp){
					//Manejo del DOM
					alert(resp);
					//document.getElementById("formulario").reset();
					$("#image").fadeOut("fast");
					$("#formulario").fadeIn("fast");
				},
				error: function(error){
					console.log(error);
				} 
			});
		});
	});
</script>
</body>
</html>