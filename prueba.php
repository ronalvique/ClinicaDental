<?php
require 'bootstrap.php';
require_once 'src/Usuarios.php';
require_once 'includes/functions.php';
require_once 'includes/functions.php';
/*
$consulta = $entityManager->getRepository('Usuarios')->findOneBy(
	array('usuario' => 'german',
		  'estado' => true
	     )
);*/
$fecha = new DateTime(date('Y-m-d H:i:s.u T'));
/*Clase Usuario*/
                $usuario = new Usuarios();

                $usuario->setUsuario('ronalvasquez44');
                $usuario->setNombre('Ronal Vique');
                $usuario->setContrasenia(encriptarContrasenia('123456'));
                $usuario->setCorreo('ronal.vasquez@go.com.hn');
                $usuario->setFechaAlta($fecha);
                $usuario->setTelFijo('2543534543');
                $usuario->setTelCelular('993432423');
                $usuario->setEstado(1);

                $entityManager->persist($usuario);
                $entityManager->flush();

echo "<pre>";
	var_dump($usuario);
