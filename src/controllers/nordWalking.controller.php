<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-16 23:12:01
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-09-22 13:04:14
 */

use Symfony\Component\HttpFoundation\Request;

$nordWalking = $app['controllers_factory'];

/*==============================
=            Routes            =
==============================*/

	/*----------  Section entry point  ----------*/
	$nordWalking->get('/', function() use($app)
	{
		/*=======================================================
		=            Build list of path for carousel            =
		=======================================================*/
				
			$carouselPath = 'nordWalking/carousel/';

			//List all files in carousel folder
			$filesSystemPath = glob($app['path.system.images'] . $carouselPath . '{*}.{jpg,png,JPG,PNG}', GLOB_BRACE);
			$filesWebPath = array();

			//Convert system paths to web paths
			foreach ($filesSystemPath as $key => $file)
			{
				$fileParts = explode("/", $file);
				$filesWebPath[] = $app['path.web.images'] . $carouselPath . $fileParts[count($fileParts) - 1];
			}
		
		/*=====  End of Build list of path for carousel  ======*/

	    return $app['twig']->render('sections/nordWalking/index.html.twig', array("carouselImagesPath" => $filesWebPath));
	})
	->bind('nordWalking_index');

/*=====  End of Routes  ======*/

/*----------  Enable controller  ----------*/
$app->mount('nordWalking', $nordWalking);