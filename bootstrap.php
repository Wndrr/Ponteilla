<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ ."/vendor/autoload.php";

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/entity"), $isDevMode);

$params = array(
    'driver'    => 'pdo_mysql',
    'host'      => 'localhost',
    'dbname'    => 'ponteilla',
    'user'      => 'ponteilla',
    'password'  => 'ponteilla',
    'charset'   => 'utf8',
);

$entityManager = EntityManager::create($params, $config);