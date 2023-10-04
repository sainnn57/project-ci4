<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/valid_login', 'Auth::valid_login');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/valid_register', 'Auth::valid_register');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/user', 'User::dashboard');
$routes->get('/admin', 'Admin::index');

$routes->get('/user/perpustakaan/lihat', 'User::lihat');

$routes->get('/user/perpustakaan/new', 'User::new');

$routes->get('/', 'Home::index');

$routes->get('/admin/tambah/perpustakaan', 'Admin::tambah_perpustakaan');

$routes->post('/perpustakaan/save', 'Perpustakaan::save');

$routes->post('/perpustakaan/admin/save', 'Perpustakaan::saveadmin');

$routes->delete('/perpustakaan/(:num)', 'Perpustakaan::delete/$1');
$routes->get('/perpustakaan/edit/(:num)', 'Perpustakaan::edit/$1'); 
$routes->post('/perpustakaan/update/(:num)', 'Perpustakaan::update/$1');