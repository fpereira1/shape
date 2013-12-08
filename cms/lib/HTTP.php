<?php

class HTTP {
	public static function redirect($url) {
		header("Location: $url");
		die;
	}
}