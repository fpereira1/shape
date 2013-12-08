<?php

class Session {
	
	public static $flash = 'flash';

	public static function start() {
		session_start();
	}

	public static function set($k, $v) {
		$_SESSION[$k] = $v;
	}

	public static function get($k) {
		return isset($_SESSION[$k]) ? $_SESSION[$k] : false; 
	}

	public static function debug() {
		var_dump($_SESSION);
	}
}

class Flash extends Session {

	public static $key = 'flash';

	public static function add($msg) {
		self::set(self::$key, $msg);

	}

	public static function flag() {
		return self::get(self::$key);
	}

	public static function flush() {
		$msg = self::get(self::$key);
		unset($_SESSION[self::$flash]);
		return $msg;
	}
}

class Auth extends Session {

	public static $key = 'auth';

	public static function check() {
		return isset($_SESSION[self::$key]) ?: false;
	}

	public static function setState($state) {
		$_SESSION[self::$key] = $state;
	}
}