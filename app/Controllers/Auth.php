<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RestaurantModel;

class Auth extends BaseController
{
    public function login()
    {
        $restaurants_model = new RestaurantModel();
        $restaurants = $restaurants_model->select('id,name')->findAll();
        $data['restaurants'] = $restaurants;
        // erros de validação
        $data['validation_errors'] = session()->getFlashdata('validation_errors'); // nome igual ao usado no redirect
        $data['select_restaurant'] = session()->getFlashdata('select_restaurant'); // nome igual ao usado no redirect

        return view('auth/login_frm', $data);
    }

    public function login_submit()
    {
        $validation = $this->validate([
            'text_username' => [
                'label' => 'Usuário',
                'rules' => 'required|min_length[6]|max_length[16]',
                'errors' => [ // CORREÇÃO: era "erros"
                    'required'   => 'O campo {field} é obrigatório',
                    'min_length' => 'O campo {field} deve ter, no mínimo, {param} caracteres',
                    'max_length' => 'O campo {field} deve ter, no máximo, {param} caracteres'
                ]
            ],

            'text_password' => [
                'label' => 'Senha',
                'rules' => 'required|min_length[6]|max_length[16]',
                'errors' => [ // CORREÇÃO
                    'required'   => 'O campo {field} é obrigatório',
                    'min_length' => 'O campo {field} deve ter, no mínimo, {param} caracteres',
                    'max_length' => 'O campo {field} deve ter, no máximo, {param} caracteres'
                ]
            ],

            'select_restaurant' => [
                'label' => 'Restaurante',
                'rules' => 'required',
                'errors' => [ // CORREÇÃO
                    'required' => 'O campo {field} é obrigatório'
                ]
            ],
        ]);

        if (!$validation) {
            session()->setFlashdata('select_restaurant',Decrypt($this->request->getPost('select_restaurant')));
            return redirect()->back()
                ->withInput()
                ->with('validation_errors', $this->validator->getErrors()); // CORREÇÃO: nome igual ao que a view espera
        }

        // Aqui você colocaria o login real
        echo "Login válido!";
    }

    public function logout()
    {
        echo 'logout';
    }
}
