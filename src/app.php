<?php

use Silex\Application;

use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\SecurityServiceProvider;

use Symfony\Component\Security\Core\Encoder\PlaintextPasswordEncoder;

use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

use Wndrr\Provider\PhpMailerServiceProvider;

use Entity\User\FormAuthenticator;
use Entity\User\UserProvider;

require_once('./../config/persistance.cfg.php');

$app = new Application();

/*========================================================
=            Register and parameter providers            =
========================================================*/

    $app->register(new ServiceControllerServiceProvider());
    $app->register(new AssetServiceProvider());
    $app->register(new HttpFragmentServiceProvider());
    $app->register(new PhpMailerServiceProvider());   
    $app->register(new SessionServiceProvider());

    /*============================================
    =            Twig template engine            =
    ============================================*/
      
        $app->register(new TwigServiceProvider());
        $app['twig'] = $app->extend('twig', function ($twig, $app) 
        {
            return $twig;
        });
    
    /*=====  End of Twig template engine  ======*/
    
    /*================================
    =            Database            =
    ================================*/

        /*----------  Doctrine  ----------*/
        $app->register(new DoctrineServiceProvider(), array
        (
            'dbs.options' => array 
            (
                'default' => $database
            ),
        ));

        /*----------  ORM  ----------*/
        $app->register(new DoctrineOrmServiceProvider, array
        (
            'orm.proxies_dir' => '/proxies',
            'orm.em.options' => array
            (
                'mappings' => array
                (
                    array
                    (
                        'type' => 'annotation',
                        'namespace' => 'Entity\User',
                        'path' => __DIR__ . '/' . $entitiesPath,
                    ),
                ),
            ),
        ));

    /*=====  End of Database  ======*/

    /*============================
    =            Logs            =
    ============================*/

        $app->register(new MonologServiceProvider());

        $app['log'] = function($app) 
        {
           return new Logger('log');
        };

        $app['log']->pushHandler(new StreamHandler(__DIR__ . '/../logs/test.log', Logger::INFO));

    /*=====  End of Logs  ======*/

    /*================================
    =            Security            =
    ================================*/

        $app['app.FormAuthenticator'] = function ($app) 
        {
            return new FormAuthenticator($app);
        };

        $app->register(new SecurityServiceProvider());

        $app['security.firewalls'] = array
        (
            'admin' => array
            (
                'pattern' => 'hiking/',
                'anonymous' => true,
                'form' => 
                array
                (
                    'login_route' => 'hiking_login', 
                    'check_path' => '/hiking/admin/login_check',
                ),
                'logout' => 
                array
                (
                    'logout_path' => '/hiking/admin/logout', 
                    'target_url' => 'hiking_index',
                    'invalidate_session' => true
                ),
                'users' => function() use($app) 
                { 
                    return new UserProvider($app['orm.em']); 
                },
                'guard' => array
                (
                    'authenticators' => array
                    (
                        'app.FormAuthenticator'
                    ),
                ),
            )
        );

        $app['security.access_rules'] = array
        (
            array('^/', 'IS_AUTHENTICATED_ANONYMOUSLY'),
            array('hiking/admin', 'ROLE_ADMIN'),
        );

        $app['security.role_hierarchy'] = array
        (
            'ROLE_ADMIN' => array('ROLE_USER'),
        );

        $app['security.default_encoder'] = function ($app) 
        {
            return new PlaintextPasswordEncoder();
        };

    /*=====  End of Security  ======*/

/*=====  End of Register and parameter providers  ======*/

return $app;
