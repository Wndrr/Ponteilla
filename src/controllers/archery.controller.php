<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-16 23:12:01
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-09-21 20:26:57
 */


$archery = $app['controllers_factory'];

$archery->get('/', function() use($app)
{
    return $app['twig']->render('sections/archery/index.html.twig', array());
})
->bind('archery_index');

$app->mount('archery', $archery);