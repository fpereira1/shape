<?php

class DefaultController {

	public function __construct() {
		$this->here = $_SERVER['REQUEST_URI'];
		@list($f, $file, $controller, $action, $id) = explode('/', $this->here);

		$this->action = $action ?: 'index';
		$this->id = $id;

		$this->post = $_POST;

		Session::start();

		if(method_exists($this, $this->action)) {
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
		} else {
			throw new Exception("Error Processing Request", 1);
		}

	}

	protected function set($k, $v) {
		$this->data[$k] = $v;
	}

	public function render() {

		$themeDir = ROOT . 'themes/' . THEME . '/';

		$file = sprintf(
			"%s/themes/%s/%s/%s.php",
			ROOT, THEME, get_class($this), $this->action
		);

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

		include $themeDir . 'Layout.php';

	}

}