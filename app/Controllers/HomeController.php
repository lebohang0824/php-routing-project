<?php 

namespace App\Controllers;

use Core\Session;
use App\Interfaces\RequestInterface as Request;
use App\Interfaces\ResponseInterface as Response;

class HomeController {

	private $session;

	public function __construct() {

		$this->session = new Session;

	}

	public function index(Request $request, Response $response) {

		return $response->view("home");

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