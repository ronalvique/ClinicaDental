<?php include("includes/top_page_login.php"); ?>
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

				<?php
					require 'bootstrap.php';
					require_once 'src/Usuarios.php';

					$usuario = $entityManager->getRepository('Usuarios')->find($_GET['id']);

				?>
					<!-- Registration form -->
					<form action="" id="form_modificacion_usuario" method="post">
						<div class="row">
							<div class="col-lg-6 col-lg-offset-3">
								<div class="panel registration-form">
									<div class="panel-body">
										<div class="text-center">
											<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
											<h5 class="content-group-lg">Modificación de cuenta de usuario <small class="display-block">Actualiza los datos</small></h5>
										</div>

										<div class="form-group has-feedback">
											<div class="form-control-feedback">
												<i class="icon-user-plus text-muted"></i>
											</div>
											<input type="text" id="usuario" class="form-control" placeholder="Usuario" name="usuario" readonly="true" required value="<?php echo $usuario->getUsuario();?>"/>
											
										</div>

										<?php $nombres = explode(" ", $usuario->getNombre()); ?>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
													<input id="nombre" type="text" class="form-control" placeholder="Nombre" name="nombre" required value="<?php echo trim($nombres[0]);?>" />
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
													<input id="apellido" type="text" class="form-control" placeholder="Apellido" name="apellido" required value="<?php echo trim($nombres[1]);?>">
													
												</div>
											</div>
										</div>

										<!--
										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
													<input id="contrasenia" type="password" class="form-control" placeholder="Contraseña" name="contrasenia" required="true" >
													
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
										-->

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
													<input id="correo" type="email" class="form-control" placeholder="Correo" name="correo" required value="<?php echo $usuario->getCorreo();?>">
													
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
													<input id="confirmar_correo" type="email" class="form-control" placeholder="Confirmar correo" correo" name="confirmar_correo" required value="<?php echo $usuario->getCorreo();?>">
													
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
													<input id="tel_fijo" type="text" class="form-control" placeholder="Teléfono fijo" name="tel_fijo" value="<?php echo $usuario->getTelFijo();?>">
													
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-mobile text-muted"></i>
													</div>
													<input id="tel_celular" type="text" class="form-control" placeholder="Teléfono celular" correo" name="tel_celular" value="<?php echo $usuario->getTelCelular();?>">
													
												</div>
											</div>
										</div>
										<input type="hidden" name="accion" value="3">
										<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
										<div class="text-right">
											
											<button name="submit" type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Actualizar Usuario</button>
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
