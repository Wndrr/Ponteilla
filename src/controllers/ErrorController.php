<?php
/**
 * @Author: Wndrr
 * @Date:   2016-12-07 16:16:01
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-12-08 11:23:59
 */

use Symfony\Component\HttpFoundation\Request;
/*----------  Handles errors  ----------*/
$app->error(function (\Exception $e, Request $request, $code) use ($app)
{
    if($app['debug']) 
        return;

    $rtrnParams = array('lastPage' => $referer = $request->headers->get('referer'));

    if($code == 404)
        return $app['twig']->render('errors/404.twig', $rtrnParams);

    if($code == 500)
        return $app['twig']->render('errors/500.twig', $rtrnParams);
});