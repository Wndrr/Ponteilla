<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-16 23:12:01
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-09-20 13:23:19
 */

use Symfony\Component\HttpFoundation\Request;

$relaxation = $app['controllers_factory'];

$relaxation->get('/', function() use($app)
{
    return $app['twig']->render('sections/relaxation/index.html.twig', array());
})
->bind('relaxation_index');

$app->mount('relaxation', $relaxation);