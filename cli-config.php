<?php

use Doctrine\ORM\Tools\Setup;
require 'vendor/autoload.php';
//require_once "vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Setup.php";

// (1) Class Auto Loader
Setup::registerAutoloadPEAR();

// (2) Configuración
$config = new \Doctrine\ORM\Configuration();

// (3) Caché
$cache = new \Doctrine\Common\Cache\ArrayCache();
$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);

// (4) Driver
$driverImpl = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(array(__DIR__."/Entities"));
//$driverImpl = new Doctrine\ORM\Mapping\Driver\YamlDriver("./config/yml/");
//$driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver("./config/xml/");

$config->setMetadataDriverImpl($driverImpl);

// (5) Proxies
$config->setProxyDir(__DIR__ . './Proxies');
$config->setProxyNamespace('Proxies');

// (6) Conexión
$connectionOptions = array(
'dbname'    => 'ClinicaDental',
'user'      => 'root',
'password'  => '',
'host'      => 'localhost',
'driver'    => 'pdo_mysql',
);

// (7) EntityManager
$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);

// (8) HelperSet
$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));

?>