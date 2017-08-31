var objDatos = {
	id : 1,
	nombre : "Miguel",
	apellido : "Guarucano",

	mostrarnombre : function(){
		alert("Nombre: "+ this.nombre);
	},


mostrardatos: function(){
		alert("Identificacion: "+ this.id +"\nNombre: "+this.nombre+ "\nApellido: "+this.apellido);
	}
}

//objeto empleado
var objEmpleado = Object.create(objDatos);
objEmpleado.nombre = "Jose";
objEmpleado.id = "2";
objEmpleado.apellido = "gonzales";

//objeto cliente
var objCliente = Object.create(objDatos);
objCliente.nombre = "juan";
objCliente.id = "3";
objCliente.apellido = "parra";