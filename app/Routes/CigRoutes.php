<?php

namespace App\Routes;

use Config\Services;

$routes = Services::routes();

//CigBurger Bo Routes

$routes->get('/', 'Auth::index');