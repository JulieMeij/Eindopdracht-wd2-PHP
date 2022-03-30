<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

$router->setNamespace('Controllers');

// routes for the cards endpoint 
$router->get('/cards', 'CardController@getAll');
$router->get('/cards/(\d+)', 'CardController@getOne');
$router->post('/cards', 'CardController@add');
$router->delete('/cards/(\d+)', 'CardController@delete');

// routes for the user endpoint
$router->post('/users/login', 'UserController@login');

$router->get('/users', 'UserController@getAll');
$router->get('/users/(\d+)', 'UserController@getOne');
$router->post('/users', 'UserController@create');
$router->put('/users/(\d+)', 'UserController@update');
$router->delete('/users/(\d+)', 'UserController@delete');

// routes for score endpoints
$router->get('/scores', 'ScoreController@getAll');


// Run it!
$router->run();