<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserTable extends Migration
{
    public function up()
    {
        //create restaurante table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'id_restaurant' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'passwrd' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'roles' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
            ],
            'blocked_until' => [
                'type' => 'DATETIME',
                'null'  => true
            ],
               'active' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'code' => [
                'type' => 'INT',
                'constraint' => 20,
            ],
            'last_login' => [
                'type' => 'DATETIME',
                'null'  => true
            ],
            'create_at' => [
                'type' => 'DATETIME',
                'null'  => true
            ],
            'update_at' => [
                'type' => 'DATETIME',
                'null'  => true
            ],
            'delete_at' => [
                'type' => 'DATETIME',
                'null'  => true
            ]
            
        ]);

        //primary key
        $this->forge->addKey('id',true);

        //create table
        $this->forge->createTable('users');



    }

    public function down()
    {
         $this->forge->dropTable('users');
    }


    }

