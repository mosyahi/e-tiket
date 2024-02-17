<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'  => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['1', '2', '3'],
                // 1 (Admin), 2 (Penjual), 3 (Pembeli)
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'],
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('t_user');
    }

    public function down()
    {
        $this->forge->dropTable('t_user');
    }
}
