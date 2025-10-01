<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');



$routes->get('/login', 'Auth::login');
$routes->post('/auth/doLogin', 'Auth::doLogin');
$routes->get('/logout', 'Auth::logout');
$routes->get('/anggota', 'Anggota::index');
$routes->get('/anggota/create', 'Anggota::create');
$routes->post('/anggota/store', 'Anggota::store');
