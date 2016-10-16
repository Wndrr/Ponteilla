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
        'default' => array(
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
                'namespace' => 'Entity',
                'path' => __DIR__.'/src/entity',
            ),
        ),
    ),
));

$app->register(new Silex\Provider\MonologServiceProvider(), array());

// initialize the logger
$app['log'] = function($app) {
   return new Monolog\Logger('mylog');
};
$app['log']->pushHandler(new Monolog\Handler\StreamHandler(__DIR__ . '/../logs/test.log', Monolog\Logger::INFO));

$app['app.token_authenticator'] = function ($app) {
    return new Entity\TokenAuthenticator($app['security.firewalls']['admin']['form']['login_path']);
};
$app->register(new Silex\Provider\SessionServiceProvider(), array());
$app->register(new Silex\Provider\SecurityServiceProvider(), array());
$app['security.firewalls'] = array
(
    'admin' => array
    (
        'pattern' => '/admin',
        'form' => 
        array
        (
        	'login_path' => '/login', 
        	'check_path' => '/admin/login_check',
        ),
        'logout' => array('logout_path' => '/admin/logout', 'invalidate_session' => true),
        'users' => function() use($app) 
        { 
            return new Entity\UserProvider($app['orm.em']); 
        },
        'guard' => array
        (
            'authenticators' => array
            (
                'app.token_authenticator'
            ),
        ),
    )
);$app['security.default_encoder'] = function ($app) {
    return new \Symfony\Component\Security\Core\Encoder\PlaintextPasswordEncoder();
};
return $app;
