<?php 

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller {

	public function index($request, $response) {
		return $response->json(201, "Home");
	}

	public function users($request, $response) {

		$users = $request->body();

		return $response->json(201, "Home", $users);
	}
	
	public function names($request, $response) {

		$data = $request->args();

		return $response->json(200, "names", $data);
	}

}