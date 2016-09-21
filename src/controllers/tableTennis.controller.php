<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-16 23:12:01
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-09-21 20:26:29
 */

use Symfony\Component\HttpFoundation\Request;

$tableTennis = $app['controllers_factory'];

$tableTennis->get('/', function() use($app)
{
    return $app['twig']->render('sections/tableTennis/index.html.twig', array());
})
->bind('tableTennis_index');


$app->mount('tableTennis', $tableTennis);