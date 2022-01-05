<?php 

namespace App\Interfaces;

interface ResponseInterface {

	public function json($statusCode, $message, $data = []);

} 