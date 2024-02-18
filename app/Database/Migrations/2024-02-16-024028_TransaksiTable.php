<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
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
            'tiket_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'pemesanan_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'order_id' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'jumlah_transaksi' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'metode_pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'status_pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_transaksi', true);
        $this->forge->createTable('t_transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('t_transaksi');
    }
}
