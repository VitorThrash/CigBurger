<?php

namespace App\Routes;

use Config\Services;

$routes = Services::routes();

//CigBurger Bo Routes


$routes->get('/', 'Main::index');

$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/login_submit', 'Auth::login_submit');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('products', 'Products::index' );
$routes->get('products/new', 'Products::new_product' );
$routes->post('products/new_submit', 'Products::new_submit' );

