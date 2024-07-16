<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Auth::index');
$routes->post('Auth/login', 'Auth::login');
$routes->get('Auth/logout', 'Auth::logout');
$routes->get('dashboard', 'Dashboard::index');
