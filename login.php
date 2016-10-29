<?php
require 'bootstrap.php';
require_once 'src/Usuarios.php';

/*
 * Determinar Primero si el formulario fue enviado.
 * despues realizar la busqueda por medio del usuario a la bd
 * comprobar si la consulta trajo resultados,
 * si no trajo redireccionar a la pagina de login.
 */
if (isset($_POST['submit'])){

	$usuario = $entityManager->getRepository('Usuarios')->findOneBy(
		array('usuario' => $_POST['usuario'],
			'estado' => 1
		)
	);


	if($usuario == NULL)
	{
		//header("Location: ./login.php");
		//exit();
	} else{

		if( password_verify($_POST['contrasenia'],$usuario->getContrasenia()) ){
			session_start();
			$_SESSION['usuario'] = $_POST['usuario'];
			header("Location: ./index.php");
			exit();
		}else{
			header("Location: ./login.php");
			exit();
		}
	}




}

?>
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

					<!-- Simple login form -->
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"" method="post" id="form_login">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Inicia sesión con tu cuenta <small class="display-block">ingresa tus credenciales</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
								<input type="text" id="usuario" class="form-control" placeholder="Usuario" name="usuario" required>
								
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
								<input type="password" id="contrasenia" class="form-control" placeholder="Contraseña" name="contrasenia" required>
								<?php if (isset($_POST['submit'])){ ?>
									<label class="error">usuario/contraseña incorrectas</label>
								<?php } ?>
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