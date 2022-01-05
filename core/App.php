<?php 

namespace Core;

use Core\Request;
use Core\Response;
use App\Interfaces\ResponseInterface;

class App {

	private function uri_split($uri) {

		/**
		 *
		 * Split by forward slash
		 *
		 */
		return preg_split('/\//', $uri);
	}

	/**
	 *
	 * Get all arguments parsed
	 *
	 */
	private function args($uri) {

		/**
		 *
		 * Get request uri
		 *
		 */
		$req_uri = $_SERVER['REQUEST_URI'];

		/**
		 *
		 * Get provided uri parts
		 *
		 */
		$uri_parts = $this->uri_split($uri);

		/**
		 *
		 * Get request uri parts
		 *
		 */
		$req_parts = $this->uri_split($req_uri);

		/**
		 *
		 * Check URL length match
		 *
		 */
		if (count($uri_parts) !== count($req_parts)) {
			return [];
		}

		$values = [];

		/**
		 *
		 * Get all argument values
		 *
		 */
		for ($i = 0; $i < count($uri_parts); $i++) {
			if (preg_match('/\{(.+)\}/', $uri_parts[$i])) {

				$key = preg_replace('/\{|\}/', '', $uri_parts[$i]);

				$values[$key] = $req_parts[$i];
			}
		}

		/**
		 *
		 * Return values
		 *
		 */
		return $values;

	}

	/**
	 *
	 * Match request uri against controller uri
	 *
	 */
	private function match($uri) {

		/**
		 *
		 * Get request uri
		 *
		 */
		$req_uri = $_SERVER['REQUEST_URI'];

		/**
		 *
		 * Get provided uri parts
		 *
		 */
		$uri_parts = $this->uri_split($uri);

		/**
		 *
		 * Get request uri parts
		 *
		 */
		$req_parts = $this->uri_split($req_uri);

		/**
		 *
		 * Check URL length match
		 *
		 */
		if (count($uri_parts) !== count($req_parts)) {
			return false;
		}

		/**
		 *
		 * Compare parts
		 *
		 */
		for ($i = 0; $i < count($uri_parts); $i++) {
			if (!preg_match('/\{(.+)\}/', $uri_parts[$i])) {
				if ($uri_parts[$i] !== $req_parts[$i]) {

					/**
					 *
					 * Return failure
					 *
					 */
					return false;
				}
			}
		}

		/**
		 *
		 * Return success
		 *
		 */
		return true;

	}

	/**
	 *
	 * Make a controller call
	 *
	 */
	private function call($ctrl, $request, ResponseInterface $response) {

		/**
		 *
		 * Get class definition
		 *
		 */
		$class = new $ctrl[0];

		/**
		 *
		 * Get method
		 *
		 */
		$method = $ctrl[1];

		/**
		 *
		 * Call class method
		 *
		 */
		echo call_user_func([$class, $method], $request, $response);

	}

	/**
	 *
	 * Dispatch http verb
	 *
	 */
	private function dispatch($http_method, $uri, $class, $method) {

		/**
		 *
		 * Get parsed arguments
		 *
		 */
		$args = $this->args($uri);

		/**
		 *
		 * Request class
		 *
		 */
		$request = new Request($args);

		/**
		 *
		 * Response class
		 *
		 */
		$response = new Response;

		/**
		 *
		 * Return controller's body
		 *
		 */
		if ($this->match($uri)) {

			$req_method = $_SERVER['REQUEST_METHOD'];

			/**
			 *
			 * Return on wrong method match
			 *
			 */
			if ($req_method === $http_method) {

				/**
				 *
				 * Call controller and method
				 *
				 */
				$this->call([$class, $method], $request, $response);
			}

		}

	}


	/**
	 *
	 * Get verb
	 *
	 */
	public function get($uri, $class, $method = 'index') {

		$this->dispatch("GET", $uri, $class, $method);
		
	}

	/**
	 *
	 * Post verb
	 *
	 */
	public function post($uri, $class, $method = 'index') {

		$this->dispatch("POST", $uri, $class, $method);
	
	}

}