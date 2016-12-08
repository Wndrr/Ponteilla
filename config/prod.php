<?php
/**
 * @Author: Hanzu
 * @Date:   2016-11-28 13:53:09
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-12-07 16:52:30
 */

/**
 *
 * Initialize vars, include files and namespaces for the Prod environement
 *
 */

/*========================================
=            Define constants            =
========================================*/

	$app['twig.path'] = array(__DIR__.'/../views');
	$app['twig.options'] = array('cache' => __DIR__.'/../cache/twig');

/*=====  End of Define constants  ======*/

$app['path'] = array
(
	'system' 	=> array('root' => $_SERVER['DOCUMENT_ROOT'] . "/"),
	'web' 		=> array('root' => '/')
);

$app['path.system.images'] = $app['path']['system']['root'] . 'assets/img/';
$app['path.web.images'] = $app['path']['web']['root'] . 'assets/img/';