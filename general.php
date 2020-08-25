<?php
require_once "../vendor/autoload.php";
require_once __DIR__ . '../Entities/Task.php';


use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__);
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'mvc',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null,null,false);
$em = $entityManager = EntityManager::create($dbParams, $config);

$data = $em->getRepository('Task');
$datax = $data->findAll();

foreach($datax as $d) {
    echo '<pre>'; print_r($d);
}