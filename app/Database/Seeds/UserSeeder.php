<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    # Function yang berfungsi untuk mengeksekusi pengisian data user awal ke database
    public function run()
    {
        // Cleanup existing users
        $this->db->table('users')->truncate();

        $data = [
            [
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'operator',
                'password' => password_hash('operator123', PASSWORD_DEFAULT),
                'role' => 'operator',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert using batch for efficiency
        $this->db->table('users')->insertBatch($data);
    }
}
