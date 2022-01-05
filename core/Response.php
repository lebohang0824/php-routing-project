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

	public function view($file, $data = []) {

		/**
		 * 
		 * Views file directory
		 * 
		 */
		$dir = __DIR__ . '/../views/';

		/**
		 * 
		 * Combine directory and file name
		 * 
		 */
		$path = $dir . $file. ".php";

		/**
		 * 
		 * Check file exists
		 * 
		 */
		if (file_exists($path)) {

			/**
			 * 
			 * Include file
			 * 
			 */
			include_once $path;

		}

		exit;

	}
	
}