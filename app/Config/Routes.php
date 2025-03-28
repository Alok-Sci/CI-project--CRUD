<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\AdminController;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'AdminController::index');

$routes->get('admin/login', 'AdminController::login');
$routes->post('admin/login', 'AdminController::login');

$routes->get('admin/logout', 'AdminController::logout');

$routes->get('user/add', 'UserController::add');
$routes->post('user/add', 'UserController::add');

$routes->get('user/list', 'UserController::list');

$routes->get('user/(:num)/edit', 'UserController::editUser/$1');
$routes->post('user/(:num)/edit', 'UserController::editUser/$1');
$routes->get('user/(:num)/view', 'UserController::viewUser/$1');
$routes->get('user/(:num)/delete', 'UserController::deleteUser/$1');

$routes->get('user/country/(:num)', 'UserController::loadStateByCountry/$1');
$routes->get('user/country/(:num)/state/(:num)', 'UserController::loadCityByStateAndCountry/$1/$2');