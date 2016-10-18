<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ ."/vendor/autoload.php";
require_once('./config/persistance.cfg.php');

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . '/' . $entitiesPath), $isDevMode);

$entityManager = EntityManager::create($database, $config);