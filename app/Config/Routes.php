<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Autentikasi
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attempt');
$routes->get('/logout', 'Auth::logout');

// Group untuk user yang sudah LOGIN (Filter Auth)
$routes->group('', ['filter' => 'auth'], function($routes) {
    
    $routes->get('/dashboard', 'Dashboard::index');

    // === AKSES UMUM (Bisa dilihat semua user login) ===
    // Transparansi Gaji & List Anggota (Read Only)
    $routes->get('/penggajian', 'Penggajian::index'); 
    $routes->get('/penggajian/detail/(:num)', 'Penggajian::detail/$1');
    $routes->get('/penggajian/komponen/(:segment)', 'Penggajian::komponenByJabatan/$1');
    $routes->get('/anggota', 'Anggota::index'); 
    $routes->get('/komponen', 'Komponen::index');

    // === KHUSUS ADMIN (Filter Role: Admin) ===
    $routes->group('', ['filter' => 'role:admin'], function($routes) {
        
        // CRUD Anggota
        $routes->get('/anggota/create', 'Anggota::create');
        $routes->post('/anggota/store', 'Anggota::store');
        $routes->get('/anggota/edit/(:num)', 'Anggota::edit/$1');
        $routes->post('/anggota/update/(:num)', 'Anggota::update/$1');
        $routes->get('/anggota/delete/(:num)', 'Anggota::delete/$1');

        // CRUD Komponen
        $routes->get('/komponen/create', 'Komponen::create');
        $routes->post('/komponen/store', 'Komponen::store');
        $routes->get('/komponen/edit/(:num)', 'Komponen::edit/$1');
        $routes->post('/komponen/update/(:num)', 'Komponen::update/$1');
        $routes->get('/komponen/delete/(:num)', 'Komponen::delete/$1');

        // CRUD Penggajian (Atur Gaji)
        $routes->get('/penggajian/create', 'Penggajian::create');
        $routes->post('/penggajian/store', 'Penggajian::store');
    });
});

$routes->get('/dashboard-public', 'Home::publicView');