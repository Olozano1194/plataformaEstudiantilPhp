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
 * enlaces del registar Alumnos
*/
$routes->get('registrar/alumnos', 'Registrar\Alumnos::index');
$routes->get('registrar/alumnos/add', 'Registrar\Alumnos::add');
$routes->post('registrar/alumnos/store', 'Registrar\Alumnos::store');
$routes->get('registrar/alumnos/edit/(:num)', 'Registrar\Alumnos::edit/$1');
$routes->post('registrar/alumnos/update/(:num)', 'Registrar\Alumnos::update/$1');
$routes->get('registrar/alumnos/delete/(:num)', 'Registrar\Alumnos::delete/$1');

/** 
 * enlaces del registar Acudientes
*/
$routes->get('registrar/acudientes', 'Registrar\Acudientes::index');
$routes->get('registrar/acudientes/add', 'Registrar\Acudientes::add');
$routes->post('registrar/acudientes/store', 'Registrar\Acudientes::store');
$routes->get('registrar/acudientes/edit/(:num)', 'Registrar\Acudientes::edit/$1');
$routes->post('registrar/acudientes/update/(:num)', 'Registrar\Acudientes::update/$1');
$routes->get('registrar/acudientes/delete/(:num)', 'Registrar\Acudientes::delete/$1');

