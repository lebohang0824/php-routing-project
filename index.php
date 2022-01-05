<?php 

session_start();


/**
 *
 * Load main app class 
 * 
 */
use Core\App;

/**
 *
 * Require loader 
 * 
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 *
 * Instantiate app class 
 * 
 */

$app = new App;

/**
 *
 * Require routes 
 * 
 */
require_once __DIR__ . '/app/routes.php';