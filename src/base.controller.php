<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/*==============================
=            Routes            =
==============================*/

    /*----------  Global entry point  ----------*/
    $app->get('/', function () use ($app) 
    {
        return $app['twig']->render('index.html.twig', array());
    })
    ->bind('base_index');

    /*----------  Handles errors  ----------*/
    $app->error(function (\Exception $e, Request $request, $code) use ($app)
    {
        if($app['debug']) 
            return;

        $rtrnParams = array('lastPage' => $referer = $request->headers->get('referer'));

        if($code == 404)
            return $app['twig']->render('errors/404.html.twig', $rtrnParams);

        if($code == 500)
            return $app['twig']->render('errors/500.html.twig', $rtrnParams);
    });

$app->get('/test', function () use ($app) {
    $post = $app['db']->fetchAll("SELECT * FROM test")[0];

    return  "<h1>{$post['id']}</h1>".
            "<p>{$post['tada']}</p>";
});

$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('login.html', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
});

$app->get('/hiking/admin', function(Request $request) use ($app) {
    return "admin";
});

$app->get('/admin', function(Request $request) use ($app) {
    return $app['twig']->render('logout.html');
});

/*=====  End of Routes  ======*/

/*===============================================
=            Include sub-controllers            =
===============================================*/

    require_once('controllers/tableTennis.controller.php');
    require_once('controllers/archery.controller.php');
    require_once('controllers/nordWalking.controller.php');
    require_once('controllers/relaxation.controller.php');
    require_once('controllers/teens.controller.php');
    require_once('controllers/ajax.controller.php');
    require_once('controllers/hiking.controller.php');

/*=====  End of Include sub-controllers  ======*/