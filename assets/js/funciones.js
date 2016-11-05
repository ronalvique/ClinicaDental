$(document).ready(function(){
	
	/* Formulario de Nuevo_Usuario
	* Validacion del formulario de nuevo usuario.
	* Usando el plugin de validacion
	* de jquery.
	* --Este plugin se debe añadir desde el archivo functions --
	* Autor: Ronal Vasquez
	* Version 2.0
	* 2.0 -> cambio para validar si el plugin existe.
	*/
	if ($.fn.validate) {
		$("#form_nuevo_usuario_enviar").click(function() {
			/* Act on the event */
		
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
						contrasenia:{
							required:    true,
							minlength:   6

						},
						confirmar_contrasenia:{
							required:    true,
							minlength:   6,
							equalTo:     "#contrasenia"
						},
						correo:{
							required:    true,
							email:       true,
						},
						confirmar_correo:{
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
						contrasenia:{
							required:    "Este campo es requerido",
							minlength:   "El nombre debe tener mas de 6 caracteres"

						},
						confirmar_contrasenia:{
							required:    "Este campo es requerido",
							minlength:   "El nombre debe tener mas de 6 caracteres",
							equalTo:     "Las contraseñas no son identicas"

						},
						correo:{
							required:    "Este campo es requerido",
							email:       "Introduce un correo valido"				
						},
						confirmar_correo:{
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
		                     	window.location.href = "/usuarios.php"
		                     } else{
		                     	alert("Error: \n" + e.error);
		                     }

		                 }
		             });
		             return false; // required to block normal submit since you used ajax
		         }
			});
		});
	}

	/*
	 * Formulario: Login.php
	 * Validacion de los campos del login.
	 * Autor: Ronal Vasquez
	 * Version: 1.5
	 * 1.5 -> cambio para validar si el plugin
	 * validate existe,para que no os de error
	 * al llamar a esta funcion cuando no esta definida.
	*/
	if ($.fn.validate) {
		$('#form_login').validate({
			ignore: ":hidden",
			rules:{
				usuario:{
					required: true
				},
				contrasenia: {
					required: true
				}
			},
			messages:{
				usuario:{
					required: "Por favor ingresa tu usuario"
				},
				contrasenia:{
					required: "Por favor ingresa tu contraseña"
				}
			},
			submitHandler: function(form){
				form.submit();
			}

		});
	}

	/* android-837fe6e96dd0e207
	 * Formulario de usuarios.php
	 * Modificar usuarios.
	 establecera el usario a estado 0 para
	 desactivarlo.
	*/
	$('.form_usuario_opciones').click(function(event) {
		/* Act on the event */
		event.preventDefault();

		var opcion = $(this).attr('data-opcion');
		var codigo = $(this).attr('id');
		if( (opcion.localeCompare("eliminar")) == 0 ){
			
			var respuesta = confirm('Estas seguro eliminar este usuario');
			if(respuesta == true){
				$.ajax({
	                 type: "POST",
	                 url: "/servicios/service_usuario.php",
	                 data: {accion:2,id:codigo},
	                 dataType: 'json',
	                 success: function (e) {
	                 	
	                 	
	                     if(e.hasOwnProperty('Id'))
	                     {
	                     	//window.location.reload();
	                     	$(".elim" + codigo).text('Eliminado');
	                     	$(".elim" + codigo).removeClass('label-success');
	                     	$(".elim" + codigo).addClass('label-default');
	                     	$(".ul" + codigo).css({'display':'none'});

	                     } else{
	                     	alert("Error: \n" + e.error);
	                     }
	                     

	                 }
	             });
			}
			
		}else{
			//es la opcion editar
			window.location.href = $(this).attr('href');
		}
		
		
	});


	/*
	 * Validacion de formulario de modificacion de usuarios.
	 * version 1.0
	 * autor: Ronal vasquez
	*/
	if ($.fn.validate) {
		$("#form_modificacion_usuario").validate({
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
					correo:{
						required:    true,
						email:       true,
					},
					confirmar_correo:{
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
					correo:{
						required:    "Este campo es requerido",
						email:       "Introduce un correo valido"				
					},
					confirmar_correo:{
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
	                     
	                    if(e.hasOwnProperty('Id'))
	                     {
	                     	
	                      alert("Usuario actualizado");
	                      window.location.href = "/usuarios.php"
	                     	

	                     } else{
	                     	alert("Error: \n" + e.error);
	                     }

	                 }
	            });
	             return false; // required to block normal submit since you used ajax
	        }
		});
	}

}); //fin de document

