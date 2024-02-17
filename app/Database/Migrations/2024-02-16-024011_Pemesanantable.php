<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PemesananTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pemesanan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'biodata_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'tiket_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'tanggal_pembelian' => [
                'type' => 'DATE',
            ],
            'tanggal_selesai' => [
                'type' => 'DATE',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_pemesanan', true);
        $this->forge->addForeignKey('user_id', 't_user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('biodata_id', 't_biodata', 'id_biodata', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tiket_id', 't_tiket', 'id_tiket', 'CASCADE', 'CASCADE');
        $this->forge->createTable('t_pemesanan');
    }

    public function down()
    {
        $this->forge->dropTable('t_pemesanan');
    }
}
