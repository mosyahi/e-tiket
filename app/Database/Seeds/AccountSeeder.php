<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AccountSeeder extends Seeder
{
    public function run()
    {
        $adminData = [
            'nama' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => '1',
            'status' => '1',
            'password' => password_hash('Admin.123', PASSWORD_DEFAULT),
        ];

        $this->db->table('t_user')->insertBatch($adminData);
    }
}
