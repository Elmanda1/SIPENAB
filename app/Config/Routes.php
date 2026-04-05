<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Auth Routes
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// Protected Routes
$routes->group('api', ['filter' => 'auth'], function($routes) {
    
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
