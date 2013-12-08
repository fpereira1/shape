<?php

class PagesController extends DefaultController {

	public function index() {
		if(Auth::check()) {
			HTTP::redirect(create_link('pages/welcome'));
		}

	}
	public function yourphotos() {}
	public function contactus() {}

	public function login() {
		if(strtolower($this->post['passcode']) != 'pereira1') {
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