<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-27 13:04:31
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-09-27 13:08:36
 */

use Symfony\Component\HttpFoundation\Request;

$hiking = $app['controllers_factory'];

/*==============================
=            Routes            =
==============================*/

	/*----------  Section entry point  ----------*/
	$hiking->get('/', function() use($app)
	{
	    return $app['twig']->render('sections/hiking/index.html.twig');
	})
	->bind('hiking_index');

/*=====  End of Routes  ======*/

/*----------  Enable controller  ----------*/
$app->mount('hiking', $hiking);