<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-16 23:12:01
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-09-20 21:21:57
 */

use Symfony\Component\HttpFoundation\Request;

$teens = $app['controllers_factory'];

$teens->get('/', function() use($app)
{
    return $app['twig']->render('sections/teens/index.html.twig', array());
})
->bind('teens_index');

$app->mount('teens', $teens);