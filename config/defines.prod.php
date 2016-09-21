<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-21 22:14:31
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-09-21 23:02:42
 */
$app['path'] = array
(
	'system' 	=> array('root' => 'C:/wamp64/www/Ponteilla/'),
	'web' 		=> array('root' => '/')
);

$app['path.system.images'] = $app['path']['system']['root'] . 'web/assets/img/';
$app['path.web.images'] = $app['path']['web']['root'] . 'assets/img/';