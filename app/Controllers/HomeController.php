<?php 

namespace App\Controllers;

use App\Interfaces\RequestInterface as Request;
use App\Interfaces\ResponseInterface as Response;

class HomeController {

	public function index(Request $request, Response $response) {

		return $response->json(201, "Home");

	}

	public function users(Request $request, Response $response) {

		$data = $request->body();

		return $response->json(201, "Home", $data);

	}
	
	public function names(Request $request, Response $response) {

		$data = $request->args();

		return $response->json(200, "names", $data);

	}

}