<?php
session_start();
require_once '../app/globals.php';

require_once '../app/core/Controller.php';
require_once '../app/core/Model.php';
require_once '../app/core/View.php';
require_once '../app/core/Router.php';

$router = new Router();

// Web routes
$router->get('', 'HomeController@index');
$router->get('home', 'HomeController@index');

// USER
$router->post('register', 'UserController@register');
$router->post('login', 'UserController@login');
$router->get('logout', 'UserController@logout');
$router->get('users', 'UserController@index');
$router->get('users/create', 'UserController@create');
$router->post('users/store', 'UserController@store');


// API routes
$router->get('api/data', 'ApiController@getData');

$router->dispatch();


if (!isset($_SESSION[SYSTEM]['user_id'])) {
    header("Location: " . URL);
}
