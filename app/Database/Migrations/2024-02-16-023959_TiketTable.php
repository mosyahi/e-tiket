<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TiketTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tiket' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'biodata_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nama_tiket' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'jenis_tiket' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'jenis_transportasi' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'harga_tiket' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'jumlah_tiket' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'alamat_tiket' => [
                'type' => 'TEXT',
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_tiket', true);
        $this->forge->createTable('t_tiket');
    }

    public function down()
    {
        // Menghapus foreign key dan tabel
        // $this->forge->dropForeignKey('tb_tiket', 'tb_tiket_user_id_foreign');
        $this->forge->dropTable('t_tiket');
    }
}
