<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHasilTable extends Migration
{
    # Function yang berfungsi untuk menciptakan tabel hasil akhir perhitungan beasiswa
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'mahasiswa_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'total_nilai' => [
                'type' => 'DECIMAL',
                'constraint' => '10,4',
            ],
            'ranking' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('mahasiswa_id', 'mahasiswa', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('hasil');
    }

    # Function yang berfungsi untuk menghapus tabel hasil akhir perhitungan
    public function down()
    {
        $this->forge->dropTable('hasil');
    }
}
