<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenilaianSeeder extends Seeder
{
    public function run()
    {
        $this->db->disableForeignKeyChecks();
        $this->db->table('penilaian')->truncate();
        $this->db->table('hasil')->truncate();
        $this->db->enableForeignKeyChecks();

        $kriteria = $this->db->table('kriteria')->select('id, kode_kriteria')->get()->getResult();
        $criteriaIds = [];
        foreach ($kriteria as $row) {
            $criteriaIds[$row->kode_kriteria] = $row->id;
        }

        $required = ['C1', 'C2', 'C3', 'C4'];
        foreach ($required as $code) {
            if (! isset($criteriaIds[$code])) {
                throw new \RuntimeException('Kriteria ' . $code . ' belum ada. Jalankan seeder kriteria terlebih dahulu.');
            }
        }

        $students = $this->db->table('mahasiswa')
            ->select('id, nim')
            ->like('nim', '2024', 'after')
            ->orderBy('nim', 'ASC')
            ->get()
            ->getResult();

        if (empty($students)) {
            throw new \RuntimeException('Tidak ditemukan data mahasiswa dengan format NIM 2024xxx. Jalankan seeder mahasiswa terlebih dahulu.');
        }

        $penilaian = [];
        foreach ($students as $student) {
            $index = (int) substr($student->nim, 4);
            $ipk = 3.00 + (($index * 13) % 101) / 100;
            $penghasilan = 1500000 + (($index * 37) % 2500001);
            $tanggungan = 1 + (($index * 3) % 5);
            $prestasi = 60 + (($index * 9) % 41);

            $penilaian[] = ['mahasiswa_id' => $student->id, 'kriteria_id' => $criteriaIds['C1'], 'nilai' => round($ipk, 2)];
            $penilaian[] = ['mahasiswa_id' => $student->id, 'kriteria_id' => $criteriaIds['C2'], 'nilai' => $penghasilan];
            $penilaian[] = ['mahasiswa_id' => $student->id, 'kriteria_id' => $criteriaIds['C3'], 'nilai' => $tanggungan];
            $penilaian[] = ['mahasiswa_id' => $student->id, 'kriteria_id' => $criteriaIds['C4'], 'nilai' => $prestasi];
        }

        $this->db->table('penilaian')->insertBatch($penilaian);
    }
}
