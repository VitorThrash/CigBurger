<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RestaurantModel;
use App\Models\UserModel;

class Auth extends BaseController
{ 
    // MÉTODO 1: Mostra o formulário de login
    public function login()
    {
        // 1. Liga-se à tabela de restaurantes
        $restaurants_model = new RestaurantModel();  
        
        // 2. Procura todos os IDs e Nomes para preencher o "Select" da View
        $restaurants = $restaurants_model->select('id,name')->findAll(); 
        
        // 3. Prepara a "mala" de dados para enviar para a View
        $data['restaurants'] = $restaurants;
        
        // 4. Vai buscar mensagens de erro que possam ter sido enviadas após um erro anterior
        $data['validation_errors'] = session()->getFlashdata('validation_errors'); 
        $data['select_restaurant'] = session()->getFlashdata('select_restaurant'); 
        $data['login_error'] = session()->getFlashdata('login_error');

        // 5. Carrega a página HTML passando os dados
        return view('auth/login_frm', $data);
    }

    // MÉTODO 2: Recebe e processa os dados que o utilizador enviou
    public function login_submit()
    {
        // 1. REGRAS DE SEGURANÇA: Verifica se os campos estão preenchidos corretamente
        $validation = $this->validate([
            'text_username' => [
                'label' => 'Usuário',
                'rules' => 'required|min_length[6]|max_length[16]',
                'errors' => [ 
                    'required'   => 'O campo {field} é obrigatório',
                    'min_length' => 'O campo {field} deve ter, no mínimo, {param} caracteres',
                    'max_length' => 'O campo {field} deve ter, no máximo, {param} caracteres'
                ]
            ],
            'text_password' => [
                'label' => 'Senha',
                'rules' => 'required|min_length[6]|max_length[16]',
                'errors' => [ 
                    'required'   => 'O campo {field} é obrigatório',
                    'min_length' => 'O campo {field} deve ter, no mínimo, {param} caracteres',
                    'max_length' => 'O campo {field} deve ter, no máximo, {param} caracteres'
                ]
            ],
            'select_restaurant' => [
                'label' => 'Restaurante',
                'rules' => 'required',
                'errors' => [ 'required' => 'O campo {field} é obrigatório' ]
            ],
        ]);

        // 2. SE A VALIDAÇÃO FALHAR:
        if (!$validation) {
            // Guarda qual restaurante foi selecionado para não perder a seleção ao voltar
            session()->setFlashdata('select_restaurant', Decrypt($this->request->getPost('select_restaurant')));
            
            // Redireciona de volta para o login com os erros e o que já foi digitado
            return redirect()->back()
                ->withInput()
                ->with('validation_errors', $this->validator->getErrors()); 
        }

        // 3. CAPTURA DE DADOS: Pega no que foi digitado no formulário
        $username = $this->request->getPost('text_username');  
        $password = $this->request->getPost('text_password');
        $id_restaurant = Decrypt($this->request->getPost('select_restaurant')); // Desencripta o ID
       
        $user_model = new UserModel();

        // 4. CONSULTA: Pergunta ao Model se este usuário e senha existem neste restaurante
        $user = $user_model->check_for_login($username, $password, $id_restaurant);

        // 5. SE O LOGIN FALHAR (Usuário ou senha errados):
        if(!$user) {
            session()->setFlashdata('select_restaurant', Decrypt($this->request->getPost('select_restaurant')));
            return redirect()->back()
                ->withInput()
                ->with('login_error', 'Usuário ou senha inválido.');
        }

        // 6. SUCESSO! Vamos buscar o nome real do restaurante para guardar na sessão
        $restaurant = new RestaurantModel();
        $restaurant_name = $restaurant->select('name')->find($user->id_restaurant)->name;

        // 7. MONTAGEM DO PASSAPORTE: Organiza os dados que ficarão na memória do servidor
        $user_data = [
            'id'              => $user->id,
            'name'            => $user->name,
            'id_restaurant'   => $user->id_restaurant,
            'restaurant_name' => $restaurant_name, 
            'email'           => $user->email,
            'phone'           => $user->phone,
            'roles'           => $user->roles,
        ];

        // 8. CRIAÇÃO DA SESSÃO: Grava os dados. O utilizador agora está "Logado"
        session()->set('user', $user_data);

        // 9. ENTRADA: Manda o utilizador para a página inicial do sistema
        return redirect()->to('/');
    }

    // MÉTODO 3: Sai do sistema
    public function logout()
    {
        // Apaga os dados da sessão
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}