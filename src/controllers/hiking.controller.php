<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-27 13:04:31
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-10-18 23:14:23
 */

use Symfony\Component\HttpFoundation\Request;
use Entity\User\User;

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

	$hiking->post('/register/check', function(Request $request) use($app)
	{
		$username = $request->get('_username');
		$email = $request->get('_email');
		$password = $request->get('_password');

		$user = new User($username, $password, $email);

		$em = $app['orm.em'];
		$userRepo = $em->getRepository('Entity\User\User');

		if(!$userRepo->isPersistable($user))
		{
			$app['session']->getFlashBag()->set('formErrors', $userRepo->getErrors($user));

			return $app->redirect($app['url_generator']->generate('hiking_register'));
		}			

		$em->persist($user);
		$em->flush();

		return $app->redirect($app['url_generator']->generate('hiking_index'));
	})
	->bind('hiking_register_check');

	$hiking->get('/admin', function(Request $request) use ($app) {
    return $app['twig']->render('logout.html');
	});

	$hiking->get('/wip', function(Request $request) use ($app) {
    	return $app['twig']->render('sections/hiking/dev/wip.html.twig');
	})
	->bind('hiking_wip');



/*=====  End of Routes  ======*/

/*----------  Enable controller  ----------*/
$app->mount('hiking', $hiking);