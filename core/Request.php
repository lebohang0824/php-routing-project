<?php

namespace Core;

class Request {

	/**
	 *
	 * Parsed arguments properties
	 * 
	 */
	private $args;

	/**
	 *
	 * Set arguments 
	 * 
	 */
	public function __construct($args = []) {
		
		$this->args = $args;
		
	}

	/**
	 *
	 * Return request arguments
	 * 
	 */
	public function args() {

		return $this->args;

	}

	/**
	 *
	 * Return request body
	 * 
	 */
	public function body() {

		$req_method = $_SERVER['REQUEST_METHOD'];

		switch ($req_method) {
			case 'POST':

				/**
				 * 
				 * Return data using global variable for multiparts
				 * 
				 */
				if ($_POST) {
					return $_POST;
				}

				/**
				 * 
				 * Return data as json
				 * 
				 */
				$inputs = file_get_contents("php://input");
				return json_decode($inputs);

				break;

			case 'PUT':

				/**
				 * 
				 * Return data using global variable for multiparts
				 * 
				 */
				if ($_PUT) {
					return $_PUT;
				}

				/**
				 * 
				 * Return data as json
				 * 
				 */
				$inputs = file_get_contents("php://input");
				return json_decode($inputs);

				break;

			default:
				return [];
				break;
		}

	}

}