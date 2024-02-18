<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOtpTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_otp' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'otp' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addPrimaryKey('id_otp');
        $this->forge->createTable('t_otp');
    }

    public function down()
    {
        $this->forge->dropTable('t_otp');
    }
}
