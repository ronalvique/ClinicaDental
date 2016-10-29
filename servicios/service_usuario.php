<?php
	require '../bootstrap.php';
	require_once '../src/Usuarios.php';
	require_once '../includes/functions.php';

		if ( empty($_POST['usuario']) ||
			 empty($_POST['nombre']) ||
			 empty($_POST['apellido']) || 
		     empty($_POST['contrasenia']) ||
		     empty($_POST['confirmar_contrasenia']) ||
		     empty($_POST['correo']) || 
		     empty($_POST['confirmar_correo'])
		   ){
				
				header('Content-type: application/json');
				$errores = array(
					'error' => 'campo_vacio',
					'nombre' => $_POST['nombre'],
					'apellido' => $_POST['apellido'],
					'contrasenia' => $_POST['contrasenia'],
					'confirmar_contrasenia' => $_POST['confirmar_contrasenia'],
					'correo' => $_POST['correo'],
					'confirmar_correo' => $_POST['confirmar_correo']
				);

				echo json_encode($errores);

		} elseif ( strcasecmp($_POST['contrasenia'], $_POST['confirmar_contrasenia']) <> 0 ) {
			$errores = array('error' => 'las contraseñas no coinciden' );
			echo json_encode($errores);
		} elseif (strcasecmp($_POST['correo'], $_POST['confirmar_correo']) <> 0){
			$errores = array('error' => 'El correo no coincide');
			echo json_encode($errores);
		} else {

		    $consulta = $entityManager->getRepository('Usuarios')->findOneBy(
                                                                                array('usuario' => $_POST['usuario'],
                                                                                    'estado' => 1
                                                                                )
                                                                            );
            if($consulta == NULL) {

                $Tel_Fijo = (isset($_POST['tel_fijo'])) ? $_POST['tel_fijo'] : "";
                $Tel_celular = (isset($_POST['tel_celular'])) ? $_POST['tel_celular'] : "";


                $fecha = new DateTime(date('Y-m-d H:i:s.u T'));
                /*Clase Usuario*/
                $usuario = new Usuarios();

                $usuario->setUsuario($_POST['usuario']);
                $usuario->setNombre($_POST['nombre'] . " " . $_POST['apellido']);
                $usuario->setContrasenia(encriptarContrasenia($_POST['contrasenia']));
                $usuario->setCorreo($_POST['correo']);
                $usuario->setFechaAlta($fecha);
                $usuario->setTelFijo($Tel_Fijo);
                $usuario->setTelCelular($Tel_celular);
                $usuario->setEstado(1);

                $entityManager->persist($usuario);
                $entityManager->flush();

                $mensaje = array(
                    'mensajes' => $usuario->getUsuario()
                );
            } else {
                $mensaje = array(
                    'error' => 'Usuario ya existe, intenta con otro'
                );
            }

			echo json_encode($mensaje);
		}
	
?>