<?php
require 'bootstrap.php';
require_once 'src/Usuarios.php';
require_once 'includes/functions.php';
require_once 'includes/functions.php';

$consulta = $entityManager->getRepository('Usuarios')->findOneBy(
	array('usuario' => 'german',
		  'estado' => true
	     )
);

if( password_verify('holahola',$consulta->getContrasenia() )){

	echo "b => " . encriptarContrasenia('holahola');
}else {

	echo "r  =>  " . encriptarContrasenia('holahola');
	echo "<br> v  =>" . $consulta->getContrasenia();
}