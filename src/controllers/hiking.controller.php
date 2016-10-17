<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-27 13:04:31
 * @Last Modified by:   Mathieu VIALES
 * @Last Modified time: 2016-10-17 18:08:38
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

	$hiking->get('/login', function(Request $request) use($app)
	{
		return $app['twig']->render('sections/hiking/user/login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
	    ));
	})
	->bind('hiking_login');

	$hiking->get('/register', function(Request $request) use($app)
	{
		return $app['twig']->render('sections/hiking/user/register.html.twig', array());
	})
	->bind('hiking_register');

	$hiking->get('/admin', function(Request $request) use ($app) {
    return $app['twig']->render('logout.html');
	});



/*=====  End of Routes  ======*/

/*----------  Enable controller  ----------*/
$app->mount('hiking', $hiking);