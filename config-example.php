<?php

$config = array(

	'theme' => 'default',

	'db.host' => 'localhost',
	'db.user' => '',
	'db.pass' => '',
	'db.name' => '',

	/**
	 * A flag to indicate it's using index.php (without .htaccess)
	 */
	'useIndexPHP' => true,

	'assets_path' => 'assets/',

	/**
	 * Base URL is used by the CMS/Framework to render your website
	 */
	'base_url' => 'http://example.com/'

);

function get_config($key) {
	global $config;
	return $config[$key];
}