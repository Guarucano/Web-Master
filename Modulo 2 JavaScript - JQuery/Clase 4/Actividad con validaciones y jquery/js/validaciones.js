function funmouseover(parametro) {
		
		parametro.style.backgroundColor = "#3333FF";
		parametro.style.color = "#FFF";
	}

	function funmouseout(parametro) {
		
		parametro.style.backgroundColor = "#81F7F3";
		parametro.style.color = "#000";
	}

//pagina 1

		function comprobarnum(){
			valor = document.getElementById("numero1").value;
			if( isNaN(valor)||/^\s+|\s+$/.test(valor)) {
  			alert ( 'Contiene un caracter incorrecto' );
  			numero1.focus();
  				}

  			valor = document.getElementById("numero2").value;
			if( isNaN(valor) ||/^\s+|\s+$/.test(valor)) {
  			alert ( 'Contiene un caracter incorrecto' );
  			numero2.focus();
  				}

  			valor = document.getElementById("numero3").value;
			if( isNaN(valor) ||/^\s+|\s+$/.test(valor)) {
  			alert ( 'Contiene un caracter incorrecto' );
  			numero3.focus();
  				}

  			valor = document.getElementById("numero4").value;
			if( isNaN(valor) ||/^\s+|\s+$/.test(valor)) {
  			alert ( 'Contiene un caracter incorrecto' );
  			numero4.focus();
  				}

  			valor = document.getElementById("numero5").value;
			if( isNaN(valor) ||/^\s+|\s+$/.test(valor)) {
  			alert ( 'Contiene un caracter incorrecto' );
  			numero5.focus();
  				}

  			valor = document.getElementById("numero6").value;
			if( isNaN(valor) ||/^\s+|\s+$/.test(valor)) {
  			alert ( 'Contiene un caracter incorrecto' );
  			numero6.focus();
  				}

  			valor = document.getElementById("numero7").value;
			if( isNaN(valor) ||/^\s+|\s+$/.test(valor)) {
  			alert ( 'Contiene un caracter incorrecto' );
  			numero7.focus();
  				}


  			valor = document.getElementById("numero8").value;
			if( isNaN(valor) ||/^\s+|\s+$/.test(valor)) {
  			alert ( 'Contiene un caracter incorrecto' );
  			numero8.focus();
  				}
  			valor = document.getElementById("numero9").value;
			if( isNaN(valor) ||/^\s+|\s+$/.test(valor)) {
  			alert ( 'Contiene un caracter incorrecto' );
  			numero9.focus();
  				}
  			valor = document.getElementById("numero10").value;
			if( isNaN(valor) ||/^\s+|\s+$/.test(valor)) {
  			alert ( 'Contiene un caracter incorrecto' );
  			numero10.focus();
  				}
  			valor = document.getElementById("numero11").value;
			if( isNaN(valor) ||/^\s+|\s+$/.test(valor)) {
  			alert ( 'Contiene un caracter incorrecto' );
  			numero11.focus();
  				}



			}

			
		var	suma = function(numero1,numero2){
			var numero1 = parseFloat(document.getElementById("numero1").value);
			var numero2 = parseFloat(document.getElementById("numero2").value);
			var resultado = numero1 + numero2;
			var dosdec=resultado.toFixed(2);
			return	dosdec;
		}
		var	resta = function(numero1,numero2){
			var numero1 = parseFloat(document.getElementById("numero3").value);
			var numero2 = parseFloat(document.getElementById("numero4").value);
			var resultado = numero1 - numero2;
			var dosdec=resultado.toFixed(2);
			return	dosdec;
		}
		var	mul = function(numero1,numero2){
			var numero1 = parseFloat(document.getElementById("numero5").value);
			var numero2 = parseFloat(document.getElementById("numero6").value);
			var resultado = numero1 * numero2;
			var dosdec=resultado.toFixed(2);
			return	dosdec;
		}
		var	div = function(numero1,numero2){
			
			
				var numero1 = parseFloat(document.getElementById("numero7").value);
				var numero2 = parseFloat(document.getElementById("numero8").value);
				var resultado = numero1 / numero2;
				var dosdec=resultado.toFixed(2);
				return	dosdec;		
		}
		var hora = function(){
			var time = new Date();
			return time;
		}

		var	sumah = function(numero1){
				var i=0;
				var suma=0;
				var numero1 = parseFloat(document.getElementById("numero9").value);
				do{
					suma+=i;
					i++;
				}while (i<=numero1)
			
				return	suma;		
		}

		var	may = function(numero1,numero2){
			
			
				var numero1 = parseFloat(document.getElementById("numero10").value);
				var numero2 = parseFloat(document.getElementById("numero11").value);
				if(numero1!=numero2){
					if(numero1<numero2){
						resultado = numero2;
					}else{
					resultado = numero1;
					}
				}else{
					resultado = "Los números son iguales";
				}

				return	resultado;		
		}

		var	men = function(numero1,numero2){
			
			
				var numero1 = parseFloat(document.getElementById("numero10").value);
				var numero2 = parseFloat(document.getElementById("numero11").value);
				if(numero1!=numero2){
					if(numero1>numero2){
						resultado = numero2;
					}else{
					resultado = numero1;
					}
				}else{
					resultado = "Los numeros son iguales";
				}

				return	resultado;		
		}

//pagina 2

function comprobarnombre(){
			valor = document.getElementById("nombre1").value;
			if( /^[a-z]*$/i.test(valor)) {
  			
  				}else{
  					alert ( 'Contiene un caracter incorrecto' );
  			nombre1.focus();
  				}
  			

  			valor = document.getElementById("ape1").value;
			if( /^[a-z]*$/i.test(valor)) {
  			
  				}else{
  					alert ( 'Contiene un caracter incorrecto' );
  			ape1.focus();
  				}
  			
  			valor = document.getElementById("nombre").value;
			if( /^[a-z]*$/i.test(valor)) {
  			
  				}else{
  					alert ( 'Contiene un caracter incorrecto' );
  			nombre.focus();
  				}
  			
  			valor = document.getElementById("nombremin").value;
			if( /^[a-z]*$/i.test(valor)) {
  			
  				}else{
  					alert ( 'Contiene un caracter incorrecto' );
  			nombremin.focus();
  				}
  			
  			valor = document.getElementById("nombrepos").value;
			if( /^[a-z]*$/i.test(valor)) {
  			
  				}else{
  					alert ( 'Contiene un caracter incorrecto' );
  			nombrepos.focus();
  				}
  			
  			valor = document.getElementById("nombreindex").value;
			if( /^[a-z]*$/i.test(valor)) {
  			
  				}else{
  					alert ( 'Contiene un caracter incorrecto' );
  			nombreindex.focus();
  				}
  			
  			valor = document.getElementById("nombrelindex").value;
			if( /^[a-z]*$/i.test(valor)) {
  			
  				}else{
  					alert ( 'Contiene un caracter incorrecto' );
  			nombrelindex.focus();
  				}
  			
  			valor = document.getElementById("nombresubs").value;
			if( /^[a-z]*$/i.test(valor)) {
  			
  				}else{
  					alert ( 'Contiene un caracter incorrecto' );
  			nombresubs.focus();
  				}
  			
  			valor = document.getElementById("nombre11").value;
			if( /^[a-z]*$/i.test(valor)) {
  			
  				}else{
  					alert ( 'Contiene un caracter incorrecto' );
  			nombre11.focus();
  				}
  			
  			valor = document.getElementById("nombre2").value;
			if( /^[a-z]*$/i.test(valor)) {
  			
  				}else{
  					alert ( 'Contiene un caracter incorrecto' );
  			nombre2.focus();
  				}
  			
  			valor = document.getElementById("apellido").value;
			if( /^[a-z]*$/i.test(valor)) {
  			
  				}else{
  					alert ( 'Contiene un caracter incorrecto' );
  			apellido.focus();
  				}
  			
  		}

var long = function(nombre){
			var nombre = document.getElementById("nombre1").value;
			var longitud = nombre.length;
			return longitud;
		}
		var longape = function(nombre){
			var nombre = document.getElementById("ape1").value;
			var longitud = nombre.length;
			return longitud;
		}
		var suma = function(nombre){
			var nombre = document.getElementById("nombre1").value;
			var ape = document.getElementById("ape1").value;
			var longn = nombre.length;
			var longa = ape.length;
			var resultado = longn+longa;
			return resultado;
		}
		var mayus = function(nombre){
			var nombre = document.getElementById("nombre").value;
			var mayuscula = nombre.toUpperCase();
			return mayuscula;
		}

		var minus = function(nombremin){
			var nombre = document.getElementById("nombremin").value;
			var mayuscula = nombre.toLowerCase();
			return mayuscula;
		}

		var charat = function(nombrepos){
			var nombre = document.getElementById("nombrepos").value;
			var posicion = prompt("Posicion numero");
			
  				while(isNaN(posicion)||/^\s+|\s+$/.test(posicion)){
  					alert ( 'Contiene un caracter incorrecto' );
  					var posicion = prompt("Posicion numero");
  				}
			//if( isNaN(posicion)||/^\s+|\s+$/.test(posicion)) {
  			//alert ( 'Contiene un caracter incorrecto' );
  			//var posicion = prompt("Posicion numero");
  			//	}
			var pos = Number(posicion);
			var resultado = nombre.charAt(pos);
			return resultado;
		}

	var index = function(nombreindex){
			var nombre = document.getElementById("nombreindex").value;
			var letra = prompt("Ingrese letra");
			while(/^[0-9]+$/.test(letra)||/^\s+|\s+$/.test(letra)||letra.length!=1){
			alert ( 'Contiene un caracter incorrecto' );
			var letra = prompt("Ingrese letra");
			}
			var resultado = nombre.indexOf(letra);
			if(resultado == -1){
				var resultado = "Este caracter no esta en el Nombre";
			}else{
			 var resultado= nombre.indexOf(letra);
			}
			return resultado;
		}

		var lastindex = function(nombrelindex){
			var nombre = document.getElementById("nombrelindex").value;
			var letra = prompt("Ingrese letra");
			while(/^[0-9]+$/.test(letra)||/^\s+|\s+$/.test(letra)||letra.length!=1){
			alert ( 'Contiene un caracter incorrecto' );
			var letra = prompt("Ingrese letra");
			}
			var resultado = nombre.indexOf(letra);
			if(resultado == -1){
				var resultado = "Este caracter no esta en el Nombre";
			}else{
			 var resultado= nombre.lastIndexOf(letra);
			}
			return resultado;
		}

		var substring = function(nombresubs){
			var nombre = document.getElementById("nombresubs").value;
			var posicion1 = prompt("Posicion numero 1");
			var posicion2 = prompt("Posicion numero 2");
			var pos1 = Number(posicion1);
			var pos2 = Number(posicion2);
			while(isNaN(pos1)||/^\s+|\s+$/.test(pos1)||isNaN(pos2)||/^\s+|\s+$/.test(pos2)){
  					alert ( 'Contiene un caracter incorrecto' );
  					var posicion1 = prompt("Posicion numero 1");
					var posicion2 = prompt("Posicion numero 2");
					var pos1 = Number(posicion1);
					var pos2 = Number(posicion2);
  				}
			var resultado = nombre.substring(pos1,pos2);
			return resultado;
		}
		var concat = function(nombre11,nombre2,apellido){
			var nombre11 = document.getElementById("nombre11").value;
			var nombre2 = document.getElementById("nombre2").value;
			var nombre3 = document.getElementById("apellido").value;
			if(nombre11==0||nombre2==0||nombre3==0){
				var res = "Los campos estan vacios";
			}else{
				var res = nombre11.concat(nombre2,nombre3);
			}
			
			return res;
		}

//pagina3

function comprobarcedula(){
			valor = document.getElementById("cedula").value;
				if(isNaN(valor)||/^\s+|\s+$/.test(valor)){	
  			alert ( 'Contiene un caracter incorrecto' );
  			cedula.focus();
  				}else{
  					if(valor.length<7 ) {
					alert("No puede ser menor a 7 numeros");
					cedula.focus();
					}
  				}
			}

function comprobarcedula1(){
			valor = document.getElementById("cedula1").value;
				if(isNaN(valor)||/^\s+|\s+$/.test(valor)){	
  			alert ( 'Contiene un caracter incorrecto' );
  			cedula1.focus();
  				}else{
  					if(valor.length<7 ) {
					alert("No puede ser menor a 7 numeros");
					cedula1.focus();
					}
  				}
			}

function comprobarcedula3(){
			valor = document.getElementById("cedula3").value;
				if(isNaN(valor)||/^\s+|\s+$/.test(valor)){	
  			alert ( 'Contiene un caracter incorrecto' );
  			cedula3.focus();
  				}else{
  					if(valor.length<7 ) {
					alert("No puede ser menor a 7 numeros");
					cedula3.focus();
					}
  				}
			}

function comprobarcedula4(){
			valor = document.getElementById("cedula4").value;
				if(isNaN(valor)||/^\s+|\s+$/.test(valor)){	
  			alert ( 'Contiene un caracter incorrecto' );
  			cedula4.focus();
  				}else{
  					if(valor.length<7 ) {
					alert("No puede ser menor a 7 numeros");
					cedula4.focus();
					}
  				}
			}

				
var ultimonum = function(cedula){
			var cedula = document.getElementById("cedula").value;
			var lastchar = cedula.charAt(cedula.length-1);
			return lastchar;
		}

		var primernum = function(cedula1){
			var cedula = document.getElementById("cedula1").value;
			var lastchar = cedula.charAt(0);
			return lastchar;
		}

		var diacompra = function(cedula2){
			var cedula = document.getElementById("cedula2").value;
			if (cedula==0 || cedula==1){
				var resultado = "Lunes";
			}else{
				if(cedula==2 || cedula==3){
					var resultado = "Martes";
				}else{
					if(cedula==4 || cedula==5){
						var resultado = "Miercoles";
					}else{
						if(cedula==6 || cedula==7){
							var resultado = "Jueves";
						}else{
							if(cedula==8 || cedula==9){
								var resultado = "Viernes";
							}
						}
					}
				}
			}
			return resultado;
		}
		
		function myFunction(terminal){
			document.getElementById("result").value = terminal;
		}

		var separar = function(cedula3){
			var cedula = document.getElementById("cedula3").value;
			var res = cedula.split("");
			return res;
		}

		var sumarr = function(cedula4){
			var cedula = document.getElementById("cedula4").value;
			var ress = cedula.split("").map(Number);
			
			var suma = 0;
			for (i=0;i<cedula.length;i++){
				suma = suma + ress[i];
			}
			return suma;
		}

//pagina4

function comprobaredad(){
			valor = document.getElementById("fechanac").value;
				if(isNaN(valor)||/^\s+|\s+$/.test(valor)){	
  			alert ( 'Contiene un caracter incorrecto' );
  			fechanac.focus();
  				}else{
  					if(valor.length<4 ) {
  						alert("No puede ser menor a 4 numeros");
					fechanac.focus();

  						}else{

  							if(valor<1900 || valor>2015){
  							alert("Tiene que ser mayor a 1900 y menor a 2015");
						fechanac.focus();
					
					}
  				}
			}
		}

function comprobaredad1(){
			valor = document.getElementById("edadd").value;
				if(isNaN(valor)||/^\s+|\s+$/.test(valor)){	
  			alert ( 'Contiene un caracter incorrecto' );
  			edadd.focus();
  				}
			}

function comprobaredad3(){
			valor = document.getElementById("fechanacmeses").value;
				if(isNaN(valor)||/^\s+|\s+$/.test(valor)){	
  			alert ( 'Contiene un caracter incorrecto' );
  			fechanacmeses.focus();
  				}else{
  					if(valor.length<4 ) {
					alert("No puede ser menor a 4 numeros");
					fechanacmeses.focus();
					}else{

  							if(valor<1900 || valor>2015){
  							alert("Tiene que ser mayor a 1900 y menor a 2015");
						fechanacmeses.focus();
					
					}
  				}
			}
		}
  		

function comprobaredad4(){
			valor = document.getElementById("fechanac1").value;
				if(isNaN(valor)||/^\s+|\s+$/.test(valor)){	
  			alert ( 'Contiene un caracter incorrecto' );
  			fechanac1.focus();
  				}else{
  					if(valor.length<4 ) {
					alert("No puede ser menor a 4 numeros");
					fechanac1.focus();
					}else{

  							if(valor<1900 || valor>2015){
  							alert("Tiene que ser mayor a 1900 y menor a 2015");
						fechanac1.focus();
					
					}
					}
  				}
			}





			

var edad1 = function(fechanac){
			var anonac = document.getElementById("fechanac").value;
			var time = new Date();
			var year = time.getFullYear();
			var eda = year - anonac;
			return eda;
			
		}
		var nacimiento = function(edadd){
			var edad = document.getElementById("edadd").value;
			var time = new Date();
			var year = time.getFullYear();
			var anonac = year - edad;
			return anonac;
			
		}

var edad2 = function(fechanacmeses){
			var anonac = document.getElementById("fechanacmeses").value;
			var time = new Date();
			var year = time.getFullYear();
			var eda = year - anonac;
			var edames = eda * 12;
			return edames;
			
		}
		var mayoromenor = function(fechanac1){
			var anonac = document.getElementById("fechanac1").value;
			var time = new Date();
			var year = time.getFullYear();
			var eda = year - anonac;
			if (eda>=18){
				alert("Es mayor de edad");
			}else{
				alert("Es menor de edad");
			}
		}

//pagina 5

/*function validacion(){
	nombre = document.getElementById("nombre").value;
	apellido = document.getElementById("apellido").value;
	usuario = document.getElementById("usuario").value;
	password1 = document.getElementById("password1").value;
	password2= document.getElementById("password2").value;
}
*/

function validarform()
{
	var error = 0;

	//validar nombre
	var errorNom = document.getElementById("errorNom");

	var nombre = document.formjs.txtnombre;
	if(nombre.value === "")
	{
		errorNom.style.visibility = "visible";
		nombre.style.background = '#B7D0EB';
		error = 1;
	}
	else
	{
		errorNom.style.visibility = "hidden";
		//validar nombre
		var reNom = /^[a-z]*$/i;
		if(!reNom.test(formjs.txtnombre.value))
		{
			alert("Posee datos No Validos en el Nombre");
			nombre.style.background='#B7D0EB';
			formjs.txtnombre.focus();
			error = 1;
		}
		else
		{
			alert("El nombre es correcto");
			nombre.style.background = "#FFF";
		}
	}

	//validar apellido
	var errorApe = document.getElementById("errorApe");

	var apellido = document.formjs.txtapellido;
	if(apellido.value === "")
	{
		errorApe.style.visibility = "visible";
		apellido.style.background = "#B7D0EB";
		error = 1;
	}
	else
	{
		errorApe.style.visibility = "hidden";
			//validar apellido
			var reApe = /^[a-z]*$/i;
			if(!reApe.test(formjs.txtapellido.value))
			{
				alert ( 'Posee datos NO validos en el Apellido' );
				apellido.style.background = '#B7D0EB';
				formjs.txtapellido.focus();
				error = 1;					
			}
			else
			{
				alert('El Apellido es Correcto');
				pellido.style.background = '#FFF';
			}
	}

	//validar usuario
	var errorUsu = document.getElementById('errorUsu');

	var usuario = document.formjs.txtusuario;
	if( usuario.value === '' )
	{
		errorUsu.style.visibility = 'visible';
		usuario.style.background = '#B7D0EB';
		error = 1;
	}
	else
	{
		errorUsu.style.visibility = 'hidden';
			//Validad Usuario
			var reUsu = /^[a-z0-9\.\_]*$/i;
			if ( !reUsu.test(formjs.txtusuario.value) )
			{
				alert ( 'Posee datos NO validos en el usuario' );
				usuario.style.background = '#B7D0EB';
				formjs.txtusuario.focus();
				error = 1;					
			}
			else
			{ 
				alert('El Usuario es Correcto');
				usuario.style.background = '#FFF';
			}
	}

	//validar contraseñas
	var errorClav1 = document.getElementById("errorClav1");
	var clave1 = document.formjs.txtclave1;
	if(clave1.value==="")
	{
		errorClav1.style.visibility = "visible";
		clave1.style.background = '#B7D0EB';
		error = 1;
	}

	var errorClav2 = document.getElementById('errorClav2');
	var clave2 = document.formjs.txtclave2;
	if( clave2.value === '' )
	{
		errorClav2.style.visibility = 'visible';
		clave2.style.background = '#B7D0EB';
		error = 1;
	}
	else
	{
		errorUsu.style.visibility = 'hidden';
		//Validad Contraseñas
		if ( formjs.txtclave1.value != formjs.txtclave2.value )
		{
			alert ( 'Las claves NO coinciden' );
			formjs.txtclave2.focus();
			error = 1;
		}
		else
		{
		alert('Las Claves son Correctas');
		clave2.style.background = '#FFF';
		}
	}

	// validar sexo
	var errorSexo = document.getElementById('errorSexo');
	var sexo = document.formjs.sexo;
	var seleccionado = false;
	for(var i=0; i<2; i++)
	{
		if(sexo[i].checked) 
		{
			seleccionado = true;
				//error = 0;	
		}
		errorSexo.style.visibility = 'hidden';
	}
	if (seleccionado == false)
	{
		errorSexo.style.visibility = 'visible';
		error = 1;
	}

	if ( error == 0 )
	{
		alert ( 'Datos enviados exitosamente' );
		return true;
	}
	else
	{
		return false;
	}


}