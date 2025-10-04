<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');



$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/doLogin', 'Auth::doLogin');
$routes->get('/logout', 'Auth::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/anggota', 'Anggota::index');
    $routes->get('/anggota/create', 'Anggota::create');
    $routes->post('/anggota/store', 'Anggota::store');
    $routes->get('/anggota/edit/(:num)', 'Anggota::edit/$1');
    $routes->post('/anggota/update/(:num)', 'Anggota::update/$1');
    $routes->get('/anggota/delete/(:num)', 'Anggota::delete/$1');
});

$routes->get('/dashboard-public', 'Home::publicView');

