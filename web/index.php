<?php
/**
 * @Author: Wndrr
 * @Date:   2016-12-07 16:02:47
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-12-07 16:35:43
 */

ini_set('display_errors', 0);

require(__DIR__.'/../config/preload.php');

require_once __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../src/app.php';
require __DIR__.'/../config/prod.php';
require __DIR__.'/../src/ControllersManager.php';
$app->run();
