<?php
require_once "../vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = false;
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/Entities/Task"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
// the connection configuration
$config->addEntityNamespace('', '/Entities/Tasks');
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'mvc',
);
$entityManager = EntityManager::create($dbParams, $config);