<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RestaurantTable extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
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
        $this->forge->createTable('restaurants');



    }

    public function down()
    {
        //drop table
        $this->forge->dropTable('restaurants');
    }
}
