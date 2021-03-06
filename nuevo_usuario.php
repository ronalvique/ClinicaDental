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
													<input id="nombre" type="text" class="form-control" placeholder="Nombre" name="nombre" required minlength="3" />
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
													<input id="apellido" type="text" class="form-control" placeholder="Apellido" name="apellido" required minlength="3">
													
												</div>
											</div>
										</div>

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

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
													<input id="correo" type="email" class="form-control" placeholder="Correo" name="correo" required>
													
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
													<input id="confirmar_correo" type="email" class="form-control" placeholder="Confirmar correo" correo" name="confirmar_correo" required>
													
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
													<input id="tel_fijo" type="text" class="form-control" placeholder="Teléfono fijo" name="tel_fijo">
													
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-mobile text-muted"></i>
													</div>
													<input id="tel_celular" type="text" class="form-control" placeholder="Teléfono celular" correo" name="tel_celular">
													
												</div>
											</div>
										</div>
										<input type="hidden" name="accion" value="1">
										<div class="text-right">
											
										
											<a href="/usuarios.php">
												<input type="button" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10" value="Cancelar" />
											</a>

											<button id="form_nuevo_usuario_enviar" name="submit" type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Crear Usuario</button>
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
