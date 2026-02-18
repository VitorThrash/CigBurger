<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'id_restaurant' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],

            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],

            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],

            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'phone' => [
                'type' => 'INT',
                'constraint' => 50,
            ],
        
            'roles' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
            ],

            'blocked_until' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'active' => [
                'type'       => 'INT',
                'constraint' => 1,
                'default'    => 1,
            ],

            'code' => [
                'type'       => 'INT',
                'constraint' => 20,
                'null'       => true,
            ],

            'last_login' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            // Timestamps padrão do CodeIgniter
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
