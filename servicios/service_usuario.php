<?php
	require '../config.php';
		if ( empty($_POST['usuario']) || 
			 empty($_POST['nombre']) ||
			 empty($_POST['apellido']) || 
		     empty($_POST['Contrasenia']) ||
		     empty($_POST['confirmar_contrasenia']) ||
		     empty($_POST['Correo']) || 
		     empty($_POST['Confirmar_correo'])
		   ){
				
				header('Content-type: application/json');
				$errores = array(
					'error' => 'campo_vacio'
				);

				echo json_encode($errores);
		} else {
			
			
			mysql_connect($dbParams['host'],$dbParams['user'],$dbParams['password'])or die ('Ha fallado la conexión: '.mysql_error());
			mysql_select_db($dbParams['dbname'])or die ('Error al seleccionar la Base de Datos: '.mysql_error());

			
			$sql = "insert into usuarios(Usuario,
										 Nombre,
										 Contrasenia,
										 Correo,
										 Fecha_Alta,
										 Tel_Fijo,
										 Tel_celular) 
							     values(" . $_POST['usuario'] . "," 
							              . $_POST['Contrasenia'] . ")";
			echo $sql;
		
		}
	
?>
