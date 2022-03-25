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
// $router->get('/users', 'CategoryController@getAll');
// $router->get('/users/(\d+)', 'CategoryController@getOne');
// $router->post('/users', 'CategoryController@create');
// $router->put('/users/(\d+)', 'CategoryController@update');
// $router->delete('/users/(\d+)', 'CategoryController@delete');

// // routes for users endpoint
$router->post('/users/login', 'UserController@login');

// Run it!
$router->run();