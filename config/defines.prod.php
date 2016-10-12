<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-21 22:14:31
 * @Last Modified by:   Mathieu VIALES
 * @Last Modified time: 2016-10-12 15:27:06
 */
$app['path'] = array
(
	'system' 	=> array('root' => $_SERVER['DOCUMENT_ROOT'] . "/"),
	'web' 		=> array('root' => '/')
);

$app['path.system.images'] = $app['path']['system']['root'] . 'assets/img/';
$app['path.web.images'] = $app['path']['web']['root'] . 'assets/img/';