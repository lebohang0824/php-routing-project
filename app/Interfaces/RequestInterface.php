<?php 

namespace App\Interfaces;

interface RequestInterface {

	/**
	 *
	 * Return request arguments
	 * 
	 */
	public function args();

	/**
	 *
	 * Return request body
	 * 
	 */
	public function body();

} 