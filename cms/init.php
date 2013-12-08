<?php


$cms = dirname(__FILE__) . DIRECTORY_SEPARATOR;
define('CMSROOT', $cms);
define('ROOT', dirname($cms) . '/');

$controllers = array('Default', 'Page', 'Guestbook');

foreach($controllers as $controller) {
	require_once CMSROOT . "controllers/{$controller}Controller.php";
}

// Loading models
require_once __DIR__ . '/models/Model.php';
require_once __DIR__ . '/models/Guestbook.php';

// Loading necessary files for the Framework
require_once 'lib/HTTP.php';
require_once 'lib/Session.php';

function create_link($params) {

	if(is_string($params)) {
		return trim("/index.php/{$params}");
	}

	if(isset($params['controller'])) {
		$link = "/index.php/{$params['controller']}/";
	}
	if(isset($params['action'])) {
		$link .= "{$params['action']}/";
	}
	if(isset($params['id'])) {
		$link .= "{$params['id']}/";
	}

	return trim($link);
}


class HTML {

	public static function tag($type, $inner, $attributes = null) {
		return "<{$type}>{$inner}</{$type}>";
	}

	public static function a($title, $href, $attributes = null) {
		return "<a href=\"{$href}\">{$title}</a>";
	}
}