<?php include("header.php"); ?>
	

	<div class="container-fluid">
		
			<div class="col-md-8 col-md-offset-2">
				<form action="modules/mailContacto.php" method="post" id="formulario" class="">
					<legend class="featurette-heading-2" align="center">Contáctanos</legend>
					<h4>Escríbenos tus dudas, sugerencias, reclamos, y en breve estaremos en contacto contigo.</h4>
					
					<div class="form-group">
						<label class="control-label" for="nombre">Nombre:</label>
						<input class="form-control" id="nombre" type="text" name="nombre" placeholder="Nombre:">
					</div>
	
					<div class="form-group">
						<label class="control-label" for="apellido">Apellido:</label>
						<input class="form-control" id="apellido" type="text" name="apellido" placeholder="Apellido:">
					</div>

	
					<div class="form-group" id="emailgroup">
						<label class="control-label" for="email">Correo Electrónico:</label>
						<input class="form-control" id="email" type="email" name="email" autocomplete="off" placeholder="Email:">
					</div>
	
					<div class="form-group">
						<label class="control-label" for="numero">Numero telefónico</label><br>
						<div class="row">
							<div class="col-md-3">
								<select  class="form-control" name="cod" id="option">
									<option value="" disabled>Numero</option>
									<option value="0414">0414</option>
									<option value="0424">0424</option>
									<option value="0412">0412</option>
									<option value="0416">0416</option>
									<option value="0426">0426</option>
								</select>
							</div>
							<div class="col-md-9">
								
									<input class="form-control" id="numero" type="number" name="numero" placeholder="Ej: 1234567">
								
							</div>	
						</div>	
					</div>
	
					<div class="form-group">
						<label class="control-label" for="asunto">Asunto:</label>
						<input type="text" class="form-control" id="asunto" name="asunto" placeholder="Asunto:">
					</div>
	
					<div class="form-group">
						<label class="control-label" for="mensaje">Mensaje</label>
						<textarea class="form-control" id="mensaje" name="mensaje" placeholder="Escribe tu mensaje"></textarea>
	
					</div>

					<div class="form-group">
						<button class="btn btn-primary" id="enviar">Enviar</button>
					</div>
	
				
	
					
				</form>
			</div>
		</div>
	</div>
		<div class="container-fluid" align="center">
			<div>	<h2 class="featurette-heading-2">Ubicanos</h2>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.71562951409!2d-71.61549028477401!3d10.679166863900527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e8998da22df8249%3A0x8be06ee11187173!2sGOEN+Maracaibo!5e0!3m2!1ses!2sve!4v1462635489735" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
<?php include("footer.php"); ?>
</body>
</html>