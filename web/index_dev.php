<?php
/**
 * @Author: Hanzu
 * @Date:   2016-11-28 13:53:09
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-12-07 16:35:06
 */

use Symfony\Component\Debug\Debug;

ini_set('display_errors', 1);

require(__DIR__.'/../config/preload.php');

if($allowDevMode)
{
	/*============================================
	=            Remote access filter            =
	============================================*/
		
		/* Prevent acces to debug mode from remote for improved security. This scurity check can be disabled from the preload config file. */
		/* If you don't need this, feel free to delete it */
		$isCalledFromRemote = isset($_SERVER['HTTP_CLIENT_IP']) || isset($_SERVER['HTTP_X_FORWARDED_FOR']) || !in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'fe80::1', '::1'));
		if ($isCalledFromRemote && !$allowDevModeFromRemote) 
		{
		    header('HTTP/1.0 403 Forbidden');
		    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
		}
	
	/*=====  End of Remote access filter  ======*/

	require_once __DIR__.'/../vendor/autoload.php';

	Debug::enable();

	$app = require __DIR__.'/../src/app.php';
	require __DIR__.'/../config/dev.php';
	require __DIR__.'/../src/ControllersManager.php';
	$app->run();	
}

else
{	
    header('HTTP/1.0 403 Forbidden');
    exit('Dev mode has been explicitly disabled. You need to enable it in the preload config file to access the Dev functionalities');
}