<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/*==============================
=            Routes            =
==============================*/

    /*----------  Global entry point  ----------*/
    $app->get('/', function () use ($app) 
    {

        /*=======================================================
        =            Build list of path for carousel            =
        =======================================================*/
                
            $indexBackgroundPath = 'backgrounds/';

            //List all files in carousel folder
            $filesSystemPath = glob($app['path.system.images'] . $indexBackgroundPath . '{*}.{jpg,png,JPG,PNG}', GLOB_BRACE);
            $filesWebPath = array();


            //Convert system paths to web paths
            foreach ($filesSystemPath as $key => $file)
            {
                $fileParts = explode("/", $file);
                $filesWebPath[] = $app['path.web.images'] . $indexBackgroundPath . $fileParts[count($fileParts) - 1];
            }
            $selectedFile = rand(1, count($filesWebPath)) - 1;
        
        /*=====  End of Build list of path for carousel  ======*/

        return $app['twig']->render('index.html.twig', array("backgroundImagePath" => $filesWebPath[$selectedFile]));
    })
    ->bind('base_index');

    /*----------  Mentions légales  ----------*/
    $app->get('/legals', function() use($app)
    {
        return $app['twig']->render('legals.html.twig', array());
    })
    ->bind('base_mentionsLegales');

    /*----------  Handles errors  ----------*/
    $app->error(function (\Exception $e, Request $request, $code) use ($app)
    {
        if($app['debug']) 
            return;

        $rtrnParams = array('lastPage' => $referer = $request->headers->get('referer'));

        if($code == 404)
            return $app['twig']->render('errors/404.html.twig', $rtrnParams);

        if($code == 500)
            return $app['twig']->render('errors/500.html.twig', $rtrnParams);
    });

/*=====  End of Routes  ======*/

/*===============================================
=            Include sub-controllers            =
===============================================*/

    require_once('controllers/tableTennis.controller.php');
    require_once('controllers/archery.controller.php');
    require_once('controllers/nordWalking.controller.php');
    require_once('controllers/relaxation.controller.php');
    require_once('controllers/teens.controller.php');
    require_once('controllers/ajax.controller.php');
    require_once('controllers/hiking.controller.php');

/*=====  End of Include sub-controllers  ======*/