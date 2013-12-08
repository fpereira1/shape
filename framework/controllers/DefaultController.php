<?php

class DefaultController {

	public function __construct() {

		$params = HTTP::get_request_data();

		$this->action = $params['action'] ?: 'index';
		$this->id = $params['id'];

		$this->post = $_POST;

		Session::start();

		try {
			if(method_exists($this, 'init')) {
				call_user_func(array($this, 'init'));
			}
			if(method_exists($this, $this->action)) {
				call_user_func(array($this, $this->action));
			}				
			// Render frontend
			$this->render();
		} catch (Exception $e) {
			die($e->getMessage());
		}

	}

	protected function set($k, $v) {
		$this->data[$k] = $v;
	}

	public function render() {

		$theme = sprintf("%s/themes/%s/templates", ROOT, THEME);

		$file = sprintf(
			"%s/%s/%s.php",
			$theme, get_class($this), $this->action
		);

		if(!is_file($file)) {
			throw new Exception("Template file for $this->action not found: $file", 1);
		}

		foreach($this as $key => $property) {
			if(is_string($property)) {
				$this->data[$key] = $property;
			}
		}

		$this->data['bodyClass'] = get_class($this) . '_' . $this->action;

		if(isset($this->data) && count($this->data)) {
			extract($this->data);
		}

		ob_start();
		include $file;
		$content = ob_get_contents();

		ob_end_clean();

		include $theme . '/Layout.php';

	}

}