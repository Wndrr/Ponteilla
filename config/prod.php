<?php

// configure your app for the production environment

$app['twig.path'] = array(__DIR__.'/../views');
$app['twig.options'] = array('cache' => __DIR__.'/../cache/twig');
