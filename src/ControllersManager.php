<?php
/**
 * @Author: Wndrr
 * @Date:   2016-11-28 13:53:09
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-12-07 16:52:17
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Entry point for the application
 * This file only references/mounts controllers. 
 * Its purpose is to dispatch trafict between the different parts of the app using the mounted controllers with prefixed routes (see example below)
 */

/*===============================================
=            Include sub-controllers            =
===============================================*/
	
    require_once('controllers/MainController.php');
    require_once('controllers/ErrorController.php');

    /*================================
    =            Sections            =
    ================================*/
    
   		require_once('controllers/TableTennisController.php');
	    require_once('controllers/ArcheryController.php');
	    require_once('controllers/NordWalkingController.php');
	    require_once('controllers/RelaxationController.php');
	    require_once('controllers/TeensController.php');
	    require_once('controllers/AjaxController.php');
	    require_once('controllers/HikingController.php');
	    require_once('controllers/YogaController.php');
	    require_once('controllers/DanceController.php');
	    require_once('controllers/FitnessController.php');
    
    /*=====  End of Sections  ======*/
    
	

/*=====  End of Include sub-controllers  ======*/