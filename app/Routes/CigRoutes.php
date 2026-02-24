<?php

namespace App\Routes;

use Config\Services;

$routes = Services::routes();

//CigBurger Bo Routes


$routes->get('/', 'Main::index');

$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/login_submit', 'Auth::login_submit');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('product', 'Product::index' );
$routes->get('product/new', 'Product::new_product' );
$routes->post('product/new_submit', 'Product::new_submit');

