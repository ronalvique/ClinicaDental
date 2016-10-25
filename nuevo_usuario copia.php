<?php 
	/**
	* LLamado al topLogin donde tambien incluimos 
	* el archivo funciones
	*/
	include("includes/top_page_login.php"); 

	/*
	 * Funcion para guardar el usuario en la base 
	 * de datos
	 * Ronal Vasquez
	 * version 1.0
	*/
	require 'bootstrap.php'; /* Llamado a archivo de config a bd */
	if (isset($_POST['submit']))
	{	
		if ( empty($_POST['usuario']) || 
			 empty($_POST['nombre']) ||
			 empty($_POST['apellido']) || 
		     empty($_POST['Contrasenia']) ||
		     empty($_POST['confirmar_contrasenia']) ||
		     empty($_POST['confirmar_contrasenia']) ||
		     empty($_POST['Correo']) || 
		     empty($_POST['Confirmar_correo'])
		   ){
			header("location: nuevo_usuario.php");
			exit();
		} else {
			
			/*
			 * Coneccion a la base de datos.
			*/
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
							              . $_POST['Contrasenia'] . ")"
							              ;
			echo $sql;

			/*	
			$resultados = $entityManager->getRepository('\entidades\usuarios')->findAll();
			echo "<pre>";
			print_r($resultados);
			echo "</pre>";
			*/


			//echo "tu contraseña es: " .  encriptarContrasenia($_POST['Contrasenia']) . "<br />";

			/*
			if( password_verify($_POST['Contrasenia'],encriptarContrasenia($_POST['Contrasenia'])) ){
				echo "correcto <br>";
			} else {
				echo "incorrecto <br>";
			}
			*/



		}
	}
?>
<body>

		<?php include("includes/header_login.php"); ?>



	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Registration form -->
					<form action="" id="form_nuevo_usuario" method="post">
						<div class="row">
							<div class="col-lg-6 col-lg-offset-3">
								<div class="panel registration-form">
									<div class="panel-body">
										<div class="text-center">
											<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
											<h5 class="content-group-lg">Crear Cuenta de usuario <small class="display-block">Ingresa los datos</small></h5>
										</div>

										<div class="form-group has-feedback">
											<div class="form-control-feedback">
												<i class="icon-user-plus text-muted"></i>
											</div>
											<input type="text" id="usuario" class="form-control" placeholder="Usuario" name="usuario" required />
											
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
													<input id="nombre" type="text" class="form-control" placeholder="Nombre" name="nombre" required />
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
													<input id="apellido" type="text" class="form-control" placeholder="Apellido" name="apellido" required>
													
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
													<input id="Contrasenia" type="password" class="form-control" placeholder="Contraseña" name="Contrasenia" required="true" >
													
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
													<input id="confirmar_contrasenia" type="password" class="form-control" placeholder="Confirmar Contraseña" name="confirmar_contrasenia" required>
													
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
													<input id="Correo" type="email" class="form-control" placeholder="Correo" name="Correo" required>
													
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
													<input id="Confirmar_correo" type="email" class="form-control" placeholder="Confirmar correo" correo" name="Confirmar_correo" required>
													
												</div>
											</div>
										</div>

										<!-- tel-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-phone text-muted"></i>
													</div>
													<input id="Tel_fijo" type="text" class="form-control" placeholder="Teléfono fijo" name="Tel_fijo">
													
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-mobile text-muted"></i>
													</div>
													<input id="Tel_celular" type="text" class="form-control" placeholder="Teléfono celular" correo" name="Tel_celular">
													
												</div>
											</div>
										</div>

										<div class="text-right">
											
											<button name="submit" type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Crear Usuario</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<!-- /registration form -->


				<?php include("includes/footer_login.php"); ?>

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>