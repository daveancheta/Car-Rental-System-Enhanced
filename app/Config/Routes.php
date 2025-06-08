<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'Login::index');
$routes->get('/', 'Home::index');
$routes->get('/register', 'Register::index');
$routes->post('/register/store', 'Register::store');
$routes->get('/login', 'Login::index');
$routes->post('/loginadmin/auth', 'LoginAdmin::auth');
$routes->get('/admin', 'LoginAdmin::admin');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/rent', 'UserController::rent');
$routes->get('/car', 'CarController::car');
$routes->get('/cars/create', 'CarController::create');
$routes->post('/cars/store', 'CarController::store');
$routes->get('/cars/edit/(:segment)', 'CarController::edit/$1');
$routes->post('/cars/update/(:segment)', 'CarController::update/$1');
$routes->get('/cars/delete/(:segment)', 'CarController::delete/$1');
$routes->get('/rent-car', 'CarController::rent_cars');
$routes->post('/rent-car', 'CarController::rentCar');
$routes->get('user/info', 'User::info');
$routes->get('/policy', 'Home::pp');
$routes->get('/use', 'Home::indexing');
$routes->get('/about', 'Home::about');
$routes->get('/services', 'Home::services');
$routes->get('/home', 'Home::home');
$routes->post('api/login', 'Api\LoginAPI::login');
$routes->post('api/register', 'Api\RegisterAPI::create');



$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->resource('cars', [
        'controller' => 'CarControllerAPI',
    ]);
});







$routes->get('/home', function() {
    if (!session()->get('logged_in')) {
        return redirect()->to('/login');
    }
    return view('home');
});  

$routes->get('/logout', function() {
    return view('rbac');
});  
