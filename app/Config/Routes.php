<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');



$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attempt');
$routes->get('/logout', 'Auth::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/dashboard', 'Dashboard::index');
    $routes->get('/anggota', 'Anggota::index');
    $routes->get('/anggota/create', 'Anggota::create');
    $routes->post('/anggota/store', 'Anggota::store');
    $routes->get('/anggota/edit/(:num)', 'Anggota::edit/$1');
    $routes->post('/anggota/update/(:num)', 'Anggota::update/$1');
    $routes->get('/anggota/delete/(:num)', 'Anggota::delete/$1');
    $routes->get('/komponen', 'Komponen::index');
    $routes->get('/komponen/create', 'Komponen::create');
    $routes->post('/komponen/store', 'Komponen::store');
    $routes->get('/komponen/edit/(:num)', 'Komponen::edit/$1');
    $routes->post('/komponen/update/(:num)', 'Komponen::update/$1');
    $routes->get('/komponen/delete/(:num)', 'Komponen::delete/$1');
    $routes->get('/penggajian', 'Penggajian::index');
    $routes->get('/penggajian/create', 'Penggajian::create');
    $routes->post('/penggajian/store', 'Penggajian::store');
    $routes->get('/penggajian/detail/(:num)', 'Penggajian::detail/$1');
    $routes->get('/penggajian/komponen/(:segment)', 'Penggajian::komponenByJabatan/$1');
    $routes->group('', ['filter' => 'role:admin'], function($routes) {
        $routes->get('/anggota', 'Anggota::index');
        $routes->get('/komponen', 'Komponen::index');
        $routes->get('/penggajian', 'Penggajian::index');
    });


});


$routes->get('/dashboard-public', 'Home::publicView');

