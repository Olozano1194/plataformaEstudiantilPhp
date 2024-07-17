<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Auth::index');
$routes->post('Auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout');
$routes->get('dashboard', 'Dashboard::index');

/** 
 * enlaces del menu registrar
*/
$routes->get('registrar/alumnos', 'Registrar\Alumnos::index');
$routes->get('registrar/alumnos/add', 'Registrar\Alumnos::add');
$routes->post('registrar/alumnos/store', 'Registrar\Alumnos::store');
$routes->get('registrar/alumnos/edit/(:num)', 'Registrar\Alumnos::edit/$1');
$routes->post('registrar/alumnos/update/(:num)', 'Registrar\Alumnos::update/$1');
$routes->get('registrar/alumnos/delete/(:num)', 'Registrar\Alumnos::delete/$1');

