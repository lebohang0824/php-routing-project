<?php 

namespace Core;

class Session {

	public function set($key, $value) {

		if (!$this->exists($key)) {

			if (!empty($key) && !empty($value)) {

				$_SESSION[$key] = $value;

			}
		}

	}

	public function get($key) {

		$value = null;
		
		if ($this->exists($key)) {

			$value = $_SESSION[$key];

		}

		return $value;

	}

	public function remove($key) {

		if ($this->exists($key)) {

			unset($_SESSION[$key]);

		}

	}

	public function exists($key) {

		if (empty($_SESSION[$key])) {

			return false;

		}

		return true;

	}

	public function clear() {

		session_destroy();

	}

	public function flash($message) {

		$this->remove('flash');

		$this->set('flash', $message);

	}

	public function message() {

		$values = $this->get('flash');

		$this->remove('flash');

		return $values;

	}


}