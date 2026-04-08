<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Run UserSeeder for authentication
        $this->call('UserSeeder');

        // 2. Run MasterDssSeeder for Students, Criteria, Assessments, and Results
        $this->call('MasterDssSeeder');
    }
}
