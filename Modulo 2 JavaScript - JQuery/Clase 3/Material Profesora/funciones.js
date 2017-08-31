// funciones.js

// funcion confirmar
	function funconfirmar()
	{
		confirm ( "Mensaje de confirmación al Usuario usando Javascript" );
	}

	
// funcion para el if-else
	function funifelse()
	{
		var resp = confirm ( "Acepta los términos y condiciones" );
		if ( resp == true )
		{
			alert ("Términos y condiciones aceptados");
		}else
		{
			alert ("Términos y condiciones NO aceptados");
		}
	}

	
// funcion para el switch
	function funswitch()
	{
		var resp = prompt( "Módulo que cursa actualmente en el diplomado", "1" );
		switch ( resp )
		{
			case '1':
				alert ("Su Módulo es HTML y CSS");
			break;
			case '2':
				alert ("Su Módulo es Javascript y JQuery");
			break;
			case '3':
				alert ("Su Módulo es XML y AJAX");
			break;
			case '4':
				alert ("Su Módulo es BASE DE DATOS");
			break;
			default:
				alert ("El Módulo "+resp+" No pertenece a Webmaster");
		}
	}

	
// funcion para el for
	function funfor()
	{
		var inicio = prompt("Ingrese el número para iniciar el conteo");
		// Conversión a Númerico
		inicio= Number(inicio);
		var fin = prompt("Ingrese el número donde finalizar el conteo");
		// Conversión a Númerico
		fin = Number(fin);
		if ( inicio < fin )
		{
			for ( var i= inicio ; i<= fin ; i++ )
			{
				alert ("Número : "+ i);
			}
		}
		else
		{
			if ( inicio > fin )
			{
				for ( var i= inicio ; i>= fin ; i-- )
				{
					alert ("Número : "+ i);
				}
			}
			else
			{
				alert ("Los números son iguales, no hay conteo.");
			}
		}
	}
	

// funcion para el while
	function funwhile()
	{
		var num = prompt("Ingrese el número entre 0-50");
		// Conversión a Númerico
		num= Number(num);
		/*	if ( num < 0 || num > 50 )
			{
				alert ("Número fuera del rango 0-50");
			}
			else
			{ */
				while ( num < 50 )
				{
					num++;
					alert ("Número : "+ num);
				}
			//}
	}
	

// funcion para el while
	function fundowhile()
	{
		do
		{
			var resp = confirm ( "Acepta los términos y condiciones" );
			if ( resp == true )
			{
				alert ("Términos y condiciones aceptados");
			}else
			{
				alert ("Términos y condiciones NO aceptados");
			}
		}while( resp == false);
	}
	

	
// Objeto Datos
	var ObjDatos = {
		id : 1,
		nombre : '',
		apellido : '',
		
		mostrarnombre : function(){
			alert( 'Nombre: '+ this.nombre );
		} ,
		
		mostrardatos : function(){
			alert( 'Identificacion: '+ this.id +'\nNombre: ' + this.nombre + '\nApellido: ' + this.apellido );
		}
	}
	
// Nuevo Objeto Empleado
	var ObjEmpleado = Object.create(ObjDatos);
	ObjEmpleado.nombre = '';
	//ObjEmpleado.id = '';
	//ObjEmpleado.apellido = '';
	
// Nuevo Objeto Cliente
	var ObjCliente = Object.create(ObjDatos);
	ObjCliente.id = '';
	ObjCliente.nombre = '';
	ObjCliente.apellido = '';
	
// Función al cargar
	function funalcargar()
	{
		alert ("\nFormulario con Javascript");	
	}

// Función MouseOver
	function funmouseover(parametro) {
		parametro.innerHTML = "Mouse Sobre el Titulo del Formulario";
		parametro.style.backgroundColor = "#3333FF";
		parametro.style.color = "#FFF";
	}

// Función MouseOut
	function funmouseout(parametro) {
		parametro.innerHTML = "Llenar los datos del formulario";
		parametro.style.backgroundColor = "#B7D0EB";
		parametro.style.color = "#000";
	}
	
// Función Click en Titulo
	function funclicktitulo()
	{
		alert("Click sobre el Titulo del Formulario");
		
	}
	
// Función Focus
	function funfocus()
	{
		alert("Ingresa acá el nombre");
	}

// Función Focus
	function funtecla()
	{
		alert("Presionaste una tecla");
	}

	
// Función para Validar el formulario
	function validarform()
	{
	
		var error = 0 ;
		
		// validar nombre
		var errorNom = document.getElementById('errorNom');

		var nombre = document.formjs.txtnombre;
		if( nombre.value === '' )
		{
			errorNom.style.visibility = 'visible';
			nombre.style.background = '#B7D0EB';
			error = 1;
		}
		else
		{
			errorNom.style.visibility = 'hidden';
				// validar nombre
				var re = /^[a-z]*$/i;
				if ( !re.test(formjs.txtnombre.value) )
				{
					alert ( 'Posee datos NO validos' );
					nombre.style.background = '#B7D0EB';
					formjs.txtnombre.focus();
					error = 1;					
				}
				else
				{ 
					alert('El Nombre es Correcto');
					nombre.style.background = '#FFF';
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
		if ( seleccionado == false )
		{
			errorSexo.style.visibility = 'visible';
			error = 1;
		}

		// validar estado
		var estado = document.getElementById('estado');

		var estado = document.formjs.estado;
		if( estado.value === '' )
		{
			errorEst.style.visibility = 'visible';
			error = 1;
		}
		else
		{
			errorEst.style.visibility = 'hidden';
		}

		


		// validar apellido
		
		var re = /^[a-z]*$/i;
		if ( !re.test(formjs.txtapellido.value) )
		{
			alert ( 'Posee datos NO validos' );
			formjs.txtapellido.focus();
		}
		else
		{ 
			//alert('Valores Correctos');
		}
		
		
		// validar usuario
		var re = /^[a-z0-9\.\_]*$/i;
		if ( !re.test(formjs.txtusuario.value) )
		{
			alert ( 'Posee datos NO validos' );
			formjs.txtusuario.focus();
		}
		else
		{ 
			//alert('Valores Correctos');
		}
		
		
		// validar clave
		if ( formjs.txtclave1.value != formjs.txtclave2.value )
		{
			alert ( 'Las claves NO coinciden' );
			formjs.txtclave1.focus();
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

	
// expresiones regulares
/*

Letras y espacios
var re = /^[a-z ]*$/i;

Letras, numeros y espacios
var re = /^[a-z0-9 ]*$/i;

Correo Electronico
var re = /^([a-z0-9_-])+([\.a-z0-9_-])*@([a-z0-9-])+(\.[a-z0-9-]+)*\.([a-z]{2,6})*$/i;

Numero Entero
var re = /^[0-9]+$/;

Numero Decimal
var re = /^[0-9\.]+$/;

*/
