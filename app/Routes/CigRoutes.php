<?php

namespace App\Routes;

use Config\Services;

$routes = Services::routes();

//CigBurger Bo Routes


$routes->get('/', 'Main::index');

$routes->get('/auth/login', 'Auth::login');
$routes->get('/auth/login_submit', 'Auth::login_submit');
$routes->get('/auth/logout', 'Auth::logout');


