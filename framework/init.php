<?php

$cms = dirname(__FILE__) . DIRECTORY_SEPARATOR;
define('CMSROOT', $cms);
define('ROOT', dirname($cms) . '/');

require_once __DIR__ . '/controllers/DefaultController.php';
require_once __DIR__ . '/controllers/PagesController.php';
require_once __DIR__ . '/controllers/GuestbookController.php';

// Loading models
require_once __DIR__ . '/models/Model.php';
require_once __DIR__ . '/models/Guestbook.php';

// Loading necessary files for the Framework
require_once 'lib/HTTP.php';
require_once 'lib/Session.php';

function create_link($params) {

	// $base = get_config('base_url');

	if(is_string($params)) {
		return trim("index.php/{$params}");
	}

	if(isset($params['controller'])) {
		$link = "index.php/{$params['controller']}/";
	}
	if(isset($params['action'])) {
		$link .= "{$params['action']}/";
	}
	if(isset($params['id'])) {
		$link .= "{$params['id']}/";
	}

	return trim($link);
}

function dump($var) {

	$out = '';

	if(is_array($var)) $data = print_r($var, 1);
	else $data = $var;

	$backtrace = array_pop(debug_backtrace());

	if($backtrace) {
		$out .= HTML::tag('b', sprintf(
			"%s line %s <br/>",
				$backtrace['file'],
				$backtrace['line']
			)
		);
	}

	$out .= $data;

	echo HTML::tag('pre', $out);
}

function srv($k) {
	$upper = strtoupper($k);
	return $_SERVER[$upper];
}

class HTML {

	public static function tag($type, $inner, $attributes = null) {
		return "<{$type}>{$inner}</{$type}>";
	}

	public static function a($title, $href, $attributes = null) {
		return "<a href=\"{$href}\">{$title}</a>";
	}
}