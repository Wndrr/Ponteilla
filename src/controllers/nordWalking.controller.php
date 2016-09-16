<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-16 23:12:01
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-09-20 12:56:46
 */

use Symfony\Component\HttpFoundation\Request;

$nordWalking = $app['controllers_factory'];

$nordWalking->get('/', function() use($app)
{
    return $app['twig']->render('sections/nordWalking/index.html.twig', array());
})
->bind('nordWalking_index');

$app->mount('nordWalking', $nordWalking);