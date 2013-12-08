<?php

$config = array(

	'theme' => 'default',

	/**
	 * A flag to indicate it's using index.php (without .htaccess)
	 */
	'useIndexPHP' => true,

	'assets_path' => 'assets/',

	/**
	 * Base URL is used by the CMS/Framework to render your website
	 */
	'base_url' => 'http://192.168.20.103/~newaccount/peartree.me/'

);

function get_config($key) {
	global $config;
	return $config[$key];
}