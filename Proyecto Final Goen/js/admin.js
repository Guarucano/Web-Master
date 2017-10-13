function buscarDatosDeUsuario(e) {
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
}

function modificarUsuario(e) {
	e.preventDefault();

	var nombre = $("#nombre").val();
	var apellido = $("#apellido").val();
	var cedula = $("#cedula").val();
	var genero =  $("#genero").val();
	var email = $("#email").val();
	var estado = $("#estado").val();
	var ciudad = $("#ciudad").val();
	var direccion = $("#mensaje").val();
	var email = $("#email").val();
	var cod = $("#option").val();
	var numero = $("#numero").val();
	var usuario = $("#usuario").val();
	var password = $("#password").val();
	var idoculto = $("#idoculto").val();

	$.ajax({
		url: "modules/modificarUsuario.php",
		type: "post",
		data: {
			nombre: nombre,
			apellido: apellido,
			cedula: cedula,
			genero: genero,
			email: email,
			estado: estado,
			ciudad: ciudad,
			direccion: direccion,
			cod: cod,
			numero: numero,
			idoculto: idoculto,
			usuario: usuario,
			password: password
		},
		dataType: "json",
		beforeSend: function() {
			console.log("enviando");
			$("#mainmodus").slideUp();
			$("#cargandomodus").slideDown();
		},
		success: function(data) {
			$("#cargandomodus").hide();
			$("#guardadomodus").show();
		}, 
		fail: function(error) {
			console.log("error");
			console.log(error);
		}
	});
}