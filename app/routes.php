<?php

/**
 *
 * Import controllers 
 * 
 */
use App\Controllers\HomeController;


/**
 *
 * Create routes 
 * 
 */
$app->get('/', HomeController::class);

$app->post('/', HomeController::class, 'users');

$app->get('/names/{name}', HomeController::class, 'names');