<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKriteriaTable extends Migration
{
    # Function yang berfungsi untuk mendefinisikan dan membuat tabel kriteria penilaian
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_kriteria' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'unique' => true,
            ],
            'nama_kriteria' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'bobot' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
            ],
            'tipe' => [
                'type' => 'ENUM',
                'constraint' => ['benefit', 'cost'],
                'default' => 'benefit',
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
        $this->forge->createTable('kriteria');
    }

    # Function yang berfungsi untuk menghapus tabel kriteria dari database
    public function down()
    {
        $this->forge->dropTable('kriteria');
    }
}
