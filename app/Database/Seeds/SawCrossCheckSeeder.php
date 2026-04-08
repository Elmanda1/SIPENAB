<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SawCrossCheckSeeder extends Seeder
{
    # Function yang berfungsi untuk mengisi data uji coba guna pengecekan silang formula SAW
    public function run()
    {
        // 1. Insert Criteria
        $kData = [
            ['kode_kriteria' => 'C1', 'nama_kriteria' => 'IPK', 'bobot' => 0.4, 'tipe' => 'benefit'],
            ['kode_kriteria' => 'C2', 'nama_kriteria' => 'Penghasilan', 'bobot' => 0.3, 'tipe' => 'cost'],
            ['kode_kriteria' => 'C3', 'nama_kriteria' => 'Tanggungan', 'bobot' => 0.3, 'tipe' => 'benefit'],
        ];
        $this->db->table('kriteria')->insertBatch($kData);
        $c1Id = $this->db->table('kriteria')->where('kode_kriteria', 'C1')->get()->getRow()->id;
        $c2Id = $this->db->table('kriteria')->where('kode_kriteria', 'C2')->get()->getRow()->id;
        $c3Id = $this->db->table('kriteria')->where('kode_kriteria', 'C3')->get()->getRow()->id;

        // 2. Insert Mahasiswa
        $mData = [
            ['nim' => 'A1', 'nama' => 'Student 1', 'email' => 's1@example.com'],
            ['nim' => 'A2', 'nama' => 'Student 2', 'email' => 's2@example.com'],
            ['nim' => 'A3', 'nama' => 'Student 3', 'email' => 's3@example.com'],
        ];
        $this->db->table('mahasiswa')->insertBatch($mData);
        $a1Id = $this->db->table('mahasiswa')->where('nim', 'A1')->get()->getRow()->id;
        $a2Id = $this->db->table('mahasiswa')->where('nim', 'A2')->get()->getRow()->id;
        $a3Id = $this->db->table('mahasiswa')->where('nim', 'A3')->get()->getRow()->id;

        // 3. Insert Penilaian
        $pData = [
            ['mahasiswa_id' => $a1Id, 'kriteria_id' => $c1Id, 'nilai' => 3],
            ['mahasiswa_id' => $a1Id, 'kriteria_id' => $c2Id, 'nilai' => 400],
            ['mahasiswa_id' => $a1Id, 'kriteria_id' => $c3Id, 'nilai' => 5],

            ['mahasiswa_id' => $a2Id, 'kriteria_id' => $c1Id, 'nilai' => 4],
            ['mahasiswa_id' => $a2Id, 'kriteria_id' => $c2Id, 'nilai' => 200],
            ['mahasiswa_id' => $a2Id, 'kriteria_id' => $c3Id, 'nilai' => 4],

            ['mahasiswa_id' => $a3Id, 'kriteria_id' => $c1Id, 'nilai' => 5],
            ['mahasiswa_id' => $a3Id, 'kriteria_id' => $c2Id, 'nilai' => 500],
            ['mahasiswa_id' => $a3Id, 'kriteria_id' => $c3Id, 'nilai' => 3],
        ];
        $this->db->table('penilaian')->insertBatch($pData);
    }
}
