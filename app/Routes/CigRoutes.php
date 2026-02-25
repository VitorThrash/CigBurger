<?php

namespace App\Routes;

use Config\Services;

$routes = Services::routes();

//CigBurger Bo Routes

//main
$routes->get('/', 'Main::index');
//login / logout
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/login_submit', 'Auth::login_submit');
$routes->get('/auth/logout', 'Auth::logout');

//products
$routes->get('product', 'Product::index' );
$routes->get('product/new', 'Product::new_product' );
$routes->post('product/new_submit', 'Product::new_submit');

//edit product
$routes->get('/product/edit/(:alphanum)','Product::edit/$1');
$routes->post('/product/edit_submit','Product::edit_submit');

//delete product
$routes->get('/product/delete/(:alphanum)','Product::deletet/$1');
$routes->get('/product/delete_confirm/(:alphanum)','Product::delete_confirm/$1');

//stock
$routes->get('/stocks/product/(:alphanum)','Stocks::stock/$1');
