<?php

//haciendo referencia al autoload de la carpeta vendors
require 'vendor/autoload.php';

//doctrine
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(
	__DIR__ . "/src"
);

$isDevMode = false;
//configuracion de coneccion
$dbParams = array(
	'driver' => 'pdo_mysql',
	'host' => '127.0.0.1',
	'user' => 'root',
	'password' => '',
	'dbname' => 'ClinicaDental'
	 
);

$configDoctrine = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
$entityManager = EntityManager::create($dbParams, $configDoctrine);
