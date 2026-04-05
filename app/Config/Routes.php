<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('mahasiswa', 'Mahasiswa::create');
$routes->get('ranking/calculate', 'Ranking::calculate');
