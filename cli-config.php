<?php
//use Doctrine\ORM\Tools\Console\ConsoleRunner;
//require_once 'bootstrap.php';
//
//return ConsoleRunner::createHelperSet($entity_manager);
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once 'bootstrap.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = GetEntityManager();

return ConsoleRunner::createHelperSet($entityManager);