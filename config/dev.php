<?php
/**
 * @Author: Hanzu
 * @Date:   2016-11-28 13:53:09
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-12-07 16:54:27
 */

use Silex\Provider\MonologServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;

// include prod configuration - anything located in the prod.php file that is re-defined in this file will be overwritten
require __DIR__.'/prod.php';

/*========================================
=            Define constants            =
========================================*/

	$app['debug'] = true;

/*=====  End of Define constants  ======*/



/*=========================================================
=            Register and initialize providers            =
=========================================================*/

	$app->register(new MonologServiceProvider(), array(
	    'monolog.logfile' => __DIR__.'/../logs/silex_dev.log',
	));

	$app->register(new WebProfilerServiceProvider(), array(
	    'profiler.cache_dir' => __DIR__.'/../cache/profiler',
	));

/*=====  End of Register and initialize providers  ======*/