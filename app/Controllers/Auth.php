<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function index()
    {
       return view('auth/login_frm');
    }

    public function teste() {

        return view('teste');
    }

    public function teste_db() {
        $db = \Config\Database::connect();
        
        $results = $db->query("SELECT * FROM users")->getResult();
        $data ['users'] = $results;
        return view('teste_db', $data);
        
    }



    }




