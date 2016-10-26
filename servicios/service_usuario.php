<?php
	require '../config.php';
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
			
			
			mysql_connect($dbParams['host'],$dbParams['user'],$dbParams['password'])or die ('Ha fallado la conexión: '.mysql_error());
			mysql_select_db($dbParams['dbname'])or die ('Error al seleccionar la Base de Datos: '.mysql_error());

			$Tel_Fijo = (isset($_POST['tel_fijo'])) ? $_POST['tel_fijo'] : "";
			$Tel_celular = (isset($_POST['tel_celular'])) ? $_POST['tel_celular'] : "";

			$sql = "insert into usuarios(Usuario,
										 Nombre,
										 Contrasenia,
										 Correo,
										 Fecha_Alta,
										 Tel_Fijo,
										 Tel_celular) 
							     values(" 
							             . "'" . $_POST['usuario'] . "'," 
							             . "'" . $_POST['nombre'] . " " . $_POST['apellido'] . "',"
							             . "'" . $_POST['contrasenia'] . "',"
							             . "'" . $_POST['correo'] . "',"
							             . "'" . date('d-m-y') . "',"
							             . "'" . $Tel_Fijo . "',"
							             . "'" . $Tel_celular . "')";
			echo $sql;
		
		}
	
?>
