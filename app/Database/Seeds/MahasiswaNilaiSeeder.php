<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MahasiswaNilaiSeeder extends Seeder
{
    public function run()
    {
        // Hapus data lama dulu agar bisa dijalankan berulang tanpa duplikat
        $this->db->disableForeignKeyChecks();
        $this->db->table('penilaian')->truncate();
        $this->db->table('hasil')->truncate();
        $this->db->table('mahasiswa')->truncate();
        $this->db->table('kriteria')->truncate();
        $this->db->enableForeignKeyChecks();

        // 1. Insert Kriteria
        $kriteria = [
            ['kode_kriteria' => 'C1', 'nama_kriteria' => 'IPK', 'bobot' => 0.35, 'tipe' => 'benefit'],
            ['kode_kriteria' => 'C2', 'nama_kriteria' => 'Penghasilan Orang Tua', 'bobot' => 0.25, 'tipe' => 'cost'],
            ['kode_kriteria' => 'C3', 'nama_kriteria' => 'Jumlah Tanggungan', 'bobot' => 0.20, 'tipe' => 'cost'],
            ['kode_kriteria' => 'C4', 'nama_kriteria' => 'Prestasi Akademik', 'bobot' => 0.20, 'tipe' => 'benefit'],
        ];
        $this->db->table('kriteria')->insertBatch($kriteria);

        $c1Id = $this->db->table('kriteria')->where('kode_kriteria', 'C1')->get()->getRow()->id;
        $c2Id = $this->db->table('kriteria')->where('kode_kriteria', 'C2')->get()->getRow()->id;
        $c3Id = $this->db->table('kriteria')->where('kode_kriteria', 'C3')->get()->getRow()->id;
        $c4Id = $this->db->table('kriteria')->where('kode_kriteria', 'C4')->get()->getRow()->id;

        // 2. Insert 100 Mahasiswa
        $classes = ['TI-1A', 'TI-1B', 'TI-1C', 'TI-1D'];
        $mahasiswa = [];

        for ($i = 1; $i <= 100; $i++) {
            $nim = '2024' . str_pad($i, 3, '0', STR_PAD_LEFT);
            $kelas = $classes[($i - 1) % count($classes)];
            $mahasiswa[] = [
                'nim'   => $nim,
                'nama'  => 'Mahasiswa ' . str_pad($i, 3, '0', STR_PAD_LEFT) . ' (' . $kelas . ')',
                'email' => 'm' . str_pad($i, 3, '0', STR_PAD_LEFT) . '@student.pnj.ac.id',
            ];
        }

        $this->db->table('mahasiswa')->insertBatch($mahasiswa);

        $students = $this->db->table('mahasiswa')->select('id, nim')->get()->getResult();
        $ids = [];
        foreach ($students as $student) {
            $ids[$student->nim] = $student->id;
        }

        // 3. Insert Penilaian untuk 100 Mahasiswa
        $penilaian = [];
        for ($i = 1; $i <= 100; $i++) {
            $nim = '2024' . str_pad($i, 3, '0', STR_PAD_LEFT);
            $studentId = $ids[$nim];

            $ipk = 3.00 + (($i * 13) % 101) / 100;
            $penghasilan = 1500000 + (($i * 37) % 2500001);
            $tanggungan = 1 + (($i * 3) % 5);
            $prestasi = 60 + (($i * 9) % 41);

            $penilaian[] = ['mahasiswa_id' => $studentId, 'kriteria_id' => $c1Id, 'nilai' => round($ipk, 2)];
            $penilaian[] = ['mahasiswa_id' => $studentId, 'kriteria_id' => $c2Id, 'nilai' => $penghasilan];
            $penilaian[] = ['mahasiswa_id' => $studentId, 'kriteria_id' => $c3Id, 'nilai' => $tanggungan];
            $penilaian[] = ['mahasiswa_id' => $studentId, 'kriteria_id' => $c4Id, 'nilai' => $prestasi];
        }

        $this->db->table('penilaian')->insertBatch($penilaian);
    }
}
