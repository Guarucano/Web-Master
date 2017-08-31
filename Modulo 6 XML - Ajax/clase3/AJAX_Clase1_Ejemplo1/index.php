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
	<div class="row">
		<div class="col-md-4" id="uno"></div>
		<div class="col-md-4" id="dos"></div>
		<div class="col-md-4" id="tres"></div>	
	</div>
	<div class="row">
		<div class="col-md-4">
			<button id="boton">Azul</button>
		</div>
		<div class="col-md-4">
			<button id="boton2">Verde</button>
		</div>
		<div class="col-md-4">
			<button id="boton3">Gris</button>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){

		$("#boton").click(function(){
			$("#uno").hide(3500);
		});

		$("#boton2").click(function(){
			$("#dos").show("slow");
		});

		$("#boton3").click(function(){
			$("#tres").toggle("slow");
		});

	});
</script>
<div class="container">
	<div class="row">
		<div class="col-md-4" id="cuatro"></div>
		<div class="col-md-4" id="cinco"></div>
		<div class="col-md-4" id="seis"></div>	
	</div>
	<div class="row">
		<div class="col-md-4">
			<button id="boton4">A</button>
		</div>
		<div class="col-md-4">
			<button id="boton5">B</button>
		</div>
		<div class="col-md-4">
			<button id="boton6">C</button>
		</div>
	</div>
</div>
	<script type="text/javascript">
		
		$(document).ready(function(){

			$("#boton4").click(function(){
				$("#cuatro").fadeOut("fast");
			});

			$("#boton5").click(function(){
				$("#cinco").fadeIn("slow");
			});

			$("#boton6").click(function(){
				$("#seis").fadeToggle();
			})

		});

	</script>
</body>
</html>