<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Auth Routes
$routes->get('login', 'Auth::index');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// Protected Routes
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    
    // Mahasiswa UI
    $routes->get('mahasiswa/new', 'Mahasiswa::new');
    $routes->get('mahasiswa', 'Mahasiswa::index');
    $routes->post('mahasiswa', 'Mahasiswa::create');
    $routes->get('mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');

    // Kriteria UI (Admin)
    $routes->group('', ['filter' => 'role:admin'], function($routes) {
        $routes->get('kriteria/new', 'Kriteria::new');
        $routes->get('kriteria', 'Kriteria::index');
        $routes->post('kriteria', 'Kriteria::create');
        $routes->get('kriteria/delete/(:num)', 'Kriteria::delete/$1');
        $routes->get('ranking/calculate', 'Ranking::calculate');
    });

    // Penilaian UI
    $routes->get('penilaian/new', 'Penilaian::new');
    $routes->get('penilaian', 'Penilaian::index');
    $routes->post('penilaian', 'Penilaian::create');

    // API Group (Maintains existing structure)
    $routes->group('api', function($routes) {
        
        // Admin only routes
        $routes->group('', ['filter' => 'role:admin'], function($routes) {
            $routes->resource('kriteria', ['controller' => 'Kriteria']);
            $routes->get('ranking/calculate', 'Ranking::calculate');
        });

        // Admin & Operator routes
        $routes->group('', ['filter' => 'role:admin,operator'], function($routes) {
            $routes->resource('mahasiswa', ['controller' => 'Mahasiswa']);
            $routes->resource('penilaian', ['controller' => 'Penilaian']);
        });
    });
});
