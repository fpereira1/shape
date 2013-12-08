<?php

class HTTP {

	public static function redirect($url) {
		header("Location: $url");
		die;
	}

	public function get_request_data() {
		$uri = 'http://'.srv('http_host').srv('request_uri');
		$path   = array_pop(explode(get_config('base_url'), $uri));
		$parts  = explode('/', $path);
		$routes = array_slice(array('f', 'c', 'a', 'i'), 0, count($parts));
		$params = array_combine($routes, $parts);

		return $params;
	}
}