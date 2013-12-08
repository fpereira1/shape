<?php

class GuestbookController extends DefaultController {

	public function index() {
		if(Auth::check() !== true) {
			HTTP::redirect(create_link(''));
		}

		$this->Guestbook = new Guestbook();
		$this->set('Guestbook', $this->Guestbook->find());
	}

	public function add() {
		if(Auth::check() !== true) {
			HTTP::redirect(create_link(''));
		}

		$this->Guestbook = new Guestbook();
		foreach($_POST['guestbook'] as $key => $value) {
			$this->Guestbook->data[$key] = $value;
		}
		$this->Guestbook->data['tstamp'] = time();
		$this->Guestbook->save();

		// Flash::debug();
		
		Flash::add('Thanks for writting on our guestbook!');		
		HTTP::redirect(create_link('guestbook'));

	}

}