$(document).ready(function(){
	
	/* Formulario de Nuevo_Usuario
	* Validacion del formulario de nuevo usuario.
	* Usando el plugin de validacion
	* de jquery.
	* --Este plugin se debe añadir desde el archivo functions --
	* Autor: Ronal Vasquez
	* Version 1.0
	*/
	$("#form_nuevo_usuario").validate({
		ignore: ":hidden",
		rules: {
				usuario: {
					required:    true,
					minlength:   6				
				},
				nombre:{
					required:    true,
					minlength:   3,
					lettersonly: true
				},
				apellido:{
					required:    true,
					minlength:   3,
					lettersonly: true
				},
				Contrasenia:{
					required:    true,
					minlength:   6

				},
				confirmar_contrasenia:{
					required:    true,
					minlength:   6,
					equalTo:     "#contrasenia"
				},
				Correo:{
					required:    true,
					email:       true,
				},
				Confirmar_correo:{
					required:    true,
					email:       true,
					equalTo:     "#correo"
				}
		},
		messages: {
				usuario: {
					required:    "Este campo es requerido",
					minlength:   "El usuario debe tener mas de 6 caracteres"
				},
				nombre: {
					required:    "Este campo es requerido",
					minlength:   "El nombre debe tener mas de 3 caracteres",
					lettersonly: "El campo solo debe tener letras sin espacios"
				},
				apellido:{
					required:    "Este campo es requerido",
					minlength:   "El nombre debe tener mas de 3 caracteres",
					lettersonly: "El campo solo debe tener letras sin espacios"
				},
				Contrasenia:{
					required:    "Este campo es requerido",
					minlength:   "El nombre debe tener mas de 6 caracteres"

				},
				confirmar_contrasenia:{
					required:    "Este campo es requerido",
					minlength:   "El nombre debe tener mas de 6 caracteres",
					equalTo:     "Las contraseñas no son identicas"

				},
				Correo:{
					required:    "Este campo es requerido",
					email:       "Introduce un correo valido"				
				},
				Confirmar_correo:{
					required:    "Este campo es requerido",
					email:       "Introduce un correo valido",
					equalTo:     "Los correos no son identicos"
				}
		},
		submitHandler: function (form) {
             $.ajax({
                 type: "POST",
                 url: "/servicios/service_usuario.php",
                 data: $(form).serialize(),
                 dataType: 'json',
                 success: function (e) {
                 	
                     if(e.hasOwnProperty('mensajes'))
                     {
                     	alert("Usuario Creado: " + e.mensajes);
                     	window.location.reload();
                     } else{
                     	alert("Error: \n" + e.mensajes);
                     }

                 }
             });
             return false; // required to block normal submit since you used ajax
         }
	});

});

