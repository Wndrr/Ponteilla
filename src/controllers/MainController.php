<?php
/**
 * @Author: Wndrr
 * @Date:   2016-11-29 16:21:11
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-12-08 11:16:13
 */

use Symfony\Component\HttpFoundation\Request;

 /* Build a new controller to mount on the application */ 
$mainController = $app['controllers_factory'];

/*==============================
=            Routes            =
==============================*/
/*----------  Global entry point  ----------*/
    $mainController->get('/', function () use ($app) 
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

        return $app['twig']->render('index.twig', array("backgroundImagePath" => $filesWebPath[$selectedFile]));
    })
    ->bind('base_index');

    /*----------  Mentions légales  ----------*/
    $mainController->get('/legals', function() use($app)
    {
        return $app['twig']->render('legals.twig', array());
    })
    ->bind('base_mentionsLegales');

/*=====  End of Routes  ======*/

$app->mount('', $mainController);