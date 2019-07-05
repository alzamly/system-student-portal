<?php

/**
 * A simple PHP MVC skeleton
 *
 * @package php-mvc
 * @author Panique
 * @link http://www.php-mvc.net
 * @link https://github.com/panique/php-mvc/
 * @license http://opensource.org/licenses/MIT MIT License
 */

// start session
session_start();

//session_destroy();

if(isset($_SESSION['control_pq']) != 'control')
{
	$_SESSION['control_pq'] = 'website';
}


// load the (optional) Composer auto-loader
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}

// load application config (error reporting etc.)
require '../app2/config/config.php';

// load application class
require '../app2/libs/application.php';
require '../app2/libs/controller.php';

// start the application
$app = new Application();
