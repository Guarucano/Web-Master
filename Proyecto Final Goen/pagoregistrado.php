<?php include("header.php"); ?>
<div id="principal" class="container-fluid" style="display: none;">
	<div class="row">
		<div class=" col-md-4 col-md-offset-4">
			<br>
				<div class="form-group">
					<div class="panel panel-success">
					  <div class="panel-heading">
					    <div class="panel-title">Pago registrado</div>
					  </div>
					  <div class="panel-body">
							Su pago ha sido registrado exitosamente y hemos enviado a su correo los datos del mismo.
							<br><br>
							Si en el lapso de 24 horas no recibe confirmación de su pago, por favor envíe un correo con el número de ticket suministrado para validar su pago a la brevedad posible.
					  </div>
					</div>
				</div>	
		</div>
	</div>
</div>

<?php include("footer.php"); ?>

<script type="text/javascript">
	$(document).ready(function () {
		$("#principal").slideDown('slow');
	})
</script>

</body>
</html>