<?php
	/**
	* Primero incluyo el archivo config.php que tiene
	* un array con los parametros de coneccion a la base
	* de datos, cuyo nombre de array es $dbParams.
	*
	* Realizo la comprobacion de que el formulario se envio.
	* y despues verificamos si usuario y password estan llenos
	* si estan vacios se redirecciona a login.
	*
	* Luego se invoca la funcion de coneccion a bd con los parametros del array.
	*
	* Luego selecciona la base de datos a usar, la bd se saca del archivo 
	* de configuracion.
	*/
	require 'config.php';
	if (isset($_POST['submit']))
	{
		
		if ( empty($_POST['usuario']) || empty($_POST['contrasenia']) ){
			header("location: login.php");
			exit();
		} else {
			mysql_connect($dbParams['host'],$dbParams['user'],$dbParams['password'])or die ('Ha fallado la conexión: '.mysql_error());
			mysql_select_db($dbParams['dbname'])or die ('Error al seleccionar la Base de Datos: '.mysql_error());
		}

	}
?>
<?php include("includes/top_page.php"); ?>

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

					<!-- Simple login form -->
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Inicia sesión con tu cuenta <small class="display-block">ingresa tus credenciales</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" placeholder="Usuario" name="usuario">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Contraseña" name="contrasenia">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block" name="submit">Iniciar sesión <i class="icon-circle-right2 position-right"></i></button>
							</div>

							<div class="text-center">
								<a href="login_password_recover.html">¿Olvidaste tu password?</a>
							</div>
						</div>
					</form>
					<!-- /simple login form -->


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
