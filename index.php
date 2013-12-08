<?php

ini_set('display_errors', 1);

define('THEME', 'default');

require_once __DIR__ . '/framework/init.php';

@list($f, $file, $controller, $action, $id) = explode('/', $_SERVER['REQUEST_URI']);
$controller = ucfirst($controller ?: 'pages') . 'Controller';

// Dispatching the request to the main controller
$cms = new $controller();