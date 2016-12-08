<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-27 13:04:31
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-12-08 11:19:57
 */

use Symfony\Component\HttpFoundation\Request;
use Entity\User\User;

$hiking = $app['controllers_factory'];

/*==============================
=            Routes            =
==============================*/

	/*----------  Section index  ----------*/
	$hiking->get('/', function() use($app)
	{
	    return $app['twig']->render('sections/hiking/index.twig');
	})
	->bind('hiking_index');

	/*----------  Section index  ----------*/
	$hiking->get('/rules', function() use($app)
	{
	    return $app['twig']->render('sections/hiking/rules.twig');
	})
	->bind('hiking_rules');

	/*=====================================
	=            User-specific            =
	=====================================*/
	
		/*----------  Display loging view & errors  ----------*/
		$hiking->get('/login', function(Request $request) use($app)
		{
			return $app['twig']->render('sections/hiking/user/login.twig', array
			(
		        'error'         => $app['security.last_error']($request),
		        'last_username' => $app['session']->get('_security.last_username'),
		    ));
		})
		->bind('hiking_login');

		/*----------  Display registering view and errors  ----------*/
		$hiking->get('/register', function(Request $request) use($app)
		{
			return $app['twig']->render('sections/hiking/user/register.twig', array());
		})
		->bind('hiking_register');

		/*----------  Insert new user or return errors  ----------*/
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
				$app['session']->getFlashBag()->set('error', $userRepo->getErrors($user));

				return $app->redirect($app['url_generator']->generate('hiking_register')); 
			}		

			$em->persist($user);
			$em->flush();

			$app['session']->getFlashBag()->add('notify', "Compte crée avec succès, attendez qu'il soit validé");

			return $app->redirect($app['url_generator']->generate('hiking_index'));
		})
		->bind('hiking_register_check');
	
	/*=====  End of User-specific  ======*/

	/*----------  Admin route placeholder  ----------*/
	$hiking->get('/admin', function(Request $request) use ($app) 
	{
    	return $app['twig']->render('logout.html');
	});

	/*----------  Replaces every route that is not yet created  ----------*/
	$hiking->get('/wip', function(Request $request) use ($app) 
	{
    	return $app['twig']->render('sections/hiking/dev/wip.twig');
	})
	->bind('hiking_wip');

/*=====  End of Routes  ======*/

/*----------  Enable controller  ----------*/
$app->mount('hiking', $hiking);