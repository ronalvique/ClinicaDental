<?php
	require_once 'includes/functions.php';

	session_start();
 	//Vaciar sesión
 	$_SESSION = array();
 	//Destruir Sesión
 	session_destroy();
 	//Redireccionar a login.php
 	$ruta = ruta("login.php");
 	header("location: $ruta");
?>