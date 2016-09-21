<?php

// configure your app for the production environment

require_once(__DIR__ . '/defines.prod.php');

$app['twig.path'] = array(__DIR__.'/../views');
$app['twig.options'] = array('cache' => __DIR__.'/../cache/twig');
