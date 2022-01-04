<?php

namespace Core;

use App\Interfaces\RequestInterface;

class Request implements RequestInterface {

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
				 * Get inputs
				 * 
				 */
				$inputs = file_get_contents("php://input");

				/**
				 * 
				 * Return json decoded
				 * 
				 */
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
				 * Get inputs
				 * 
				 */
				$inputs = file_get_contents("php://input");

				/**
				 * 
				 * Return as json decoded
				 * 
				 */
				return json_decode($inputs);

				break;

			default:
				return [];
				break;
		}

	}

}