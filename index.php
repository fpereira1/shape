<?php

require_once('./config.php');
require_once('./framework/init.php');

// Setting the theme to be used as HTML
define('THEME', get_config('theme'));

// TODO: make it work on any subdirectory
// TODO: Fix harcoded http on $uri
// TODO: Fix hardcoded index.php
$params = HTTP::get_request_data();

$controller = ucfirst($params['c'] ?: 'pages') . 'Controller';

// Dispatching the request to the main controller
if(!class_exists($controller)) throw new Exception();
else new $controller();
