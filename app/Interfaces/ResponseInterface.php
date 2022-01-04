<?php 

namespace App\Interfaces;

interface ResponseInterface {

	/**
	 * 
	 * Return data as json
	 * 
	 */
	public function json($statusCode, $message, $data = []);

} 