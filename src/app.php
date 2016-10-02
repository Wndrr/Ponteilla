<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;

use Wndrr\Provider\PhpMailerServiceProvider;

$app = new Application();

//Service providers
$app->register(new ServiceControllerServiceProvider());

$app->register(new AssetServiceProvider());

$app->register(new HttpFragmentServiceProvider());

$app->register(new TwigServiceProvider());
$app['twig'] = $app->extend('twig', function ($twig, $app) 
{
    return $twig;
});

$app->register(new PhpMailerServiceProvider(), array(
    // 'hello.default_name' => 'Igor',
));

return $app;
