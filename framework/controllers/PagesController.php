<?php

class PagesController extends DefaultController {

	public static function css() {
		$css = array(
			'/themes/'. THEME . '/css/' . strtolower(THEME) . '.css'
		);

		foreach ($css as $key => $value) {
			$file = ROOT . $value;
			if(is_file($file)) {
				printf('<link rel="stylesheet" href="%s" />', $value);
			}
			else {
				throw new Exception("CSS file defined $file but not found.", 1);
			}
		}
	}

	public function index() {
		if(Auth::check()) {
			HTTP::redirect(create_link('pages/welcome'));
		}

	}

	public function login() {
		if(strtolower($this->post['passcode']) != 'pereira') {
			HTTP::redirect(create_link('pages/index'));
		} else {
			Auth::setState(true);
			HTTP::redirect(create_link('pages/welcome'));
		}
	}

	public function welcome() {
		if(Auth::check() !== true) {
			HTTP::redirect(create_link(''));
		}		
	}

	public function photos() {
		if(Auth::check() !== true) {
			HTTP::redirect(create_link(''));		
		}		
	}

}