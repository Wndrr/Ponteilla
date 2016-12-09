<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-16 23:12:01
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-12-08 11:15:30
 */

use Symfony\Component\HttpFoundation\Request;

$archery = $app['controllers_factory'];

/*==============================
=            Routes            =
==============================*/

	/*----------  Section entry point  ----------*/
	$archery->get('/', function() use($app)
	{
		/*=======================================================
		=            Build list of path for carousel            =
		=======================================================*/
				
			$carouselPath = 'archery/carousel/';

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

	    return $app['twig']->render('sections/archery/index.twig', array("carouselImagesPath" => $filesWebPath));
	})
	->bind('archery_index');

/*=====  End of Routes  ======*/

/*----------  Enable controller  ----------*/
$app->mount('archery', $archery);