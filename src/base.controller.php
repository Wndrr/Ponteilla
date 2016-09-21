<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/', function () use ($app) 
{
    return $app['twig']->render('index.html.twig', array());
})
->bind('base_index');


$app->error(function (\Exception $e, Request $request, $code) use ($app)
{
    if ($app['debug']) 
    {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});


require_once('controllers/tableTennis.controller.php');
require_once('controllers/archery.controller.php');
require_once('controllers/nordWalking.controller.php');
require_once('controllers/relaxation.controller.php');
require_once('controllers/teens.controller.php');
require_once('controllers/ajax.controller.php');