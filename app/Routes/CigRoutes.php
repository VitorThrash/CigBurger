<?php

namespace App\Routes;

use Config\Services;

$routes = Services::routes();

//CigBurger Bo Routes

$routes->get('/', 'Auth::index');
$routes->get('/teste', 'Auth::teste');
$routes->get('/teste_db', 'Auth::teste_db');


