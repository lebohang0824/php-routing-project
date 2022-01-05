<?php

namespace Core;

use App\Interfaces\ResponseInterface;

class Response implements ResponseInterface {

	public function json($statusCode, $message, $data = []) {

		/**
		 *
		 * Set success based on status code 
		 * 
		 */
		$success = ($statusCode === 200 || $statusCode === 201) ? true : false;

		/**
		 *
		 * Return as json encoded  
		 * 
		 */
		return json_encode([
			"success" => $success, "message" => $message, "data" => $data
		]);

	}
	
}