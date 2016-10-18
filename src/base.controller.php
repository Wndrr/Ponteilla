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


$app->get('/test', function(Request $request) use ($app)
{
  
    $em = $app['orm.em'];

    $u = new Entity\User();
    $u->setUsername("uname");
    $u->setPassword("pssw");
    $u->setEmail("pssw");

    $test = $em->getRepository('Entity\User')->findBy(array('username' => 'uname'));
    var_dump($test);
    return 'test';
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