<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;

use Wndrr\Provider\PhpMailerServiceProvider;

use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Provider\DoctrineServiceProvider;

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

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'dbs.options' => array (
        'localhost' => array(
            'driver'    => 'pdo_mysql',
            'host'      => 'localhost',
            'dbname'    => 'ponteilla',
            'user'      => 'ponteilla',
            'password'  => 'ponteilla',
            'charset'   => 'utf8',
        )
    ),
));

$app->register(new DoctrineOrmServiceProvider, array(
    'orm.proxies_dir' => '/proxies',
    'orm.em.options' => array(
        'mappings' => array(
            // Using actual filesystem paths
            array(
                'type' => 'annotation',
                'path' => __DIR__.'/src/entity',
            ),
        ),
    ),
));

$app->register(new Silex\Provider\SessionServiceProvider(), array());
$app->register(new Silex\Provider\SecurityServiceProvider(), array());
$app['security.firewalls'] = array(
    'admin' => array(
        'pattern' => '^/hiking/admin',
        'form' => array('login_path' => '/login', 'check_path' => '/admin/login_check'),
        'users' => array(
            'admin' => array('ROLE_ADMIN', '$2y$10$3i9/lVd8UOFIJ6PAMFt8gu3/r5g0qeCJvoSlLCsvMTythye19F77a'),
        ),
    ),
);
return $app;
