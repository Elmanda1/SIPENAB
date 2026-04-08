<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Libraries\SAWCalculator;

class MasterDssSeeder extends Seeder
{
    # Function yang berfungsi untuk memuat data master kriteria dan bobot awal ke sistem
    public function run()
    {
        // 0. Cleanup existing data
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');
        $this->db->table('hasil')->truncate();
        $this->db->table('penilaian')->truncate();
        $this->db->table('kriteria')->truncate();
        $this->db->table('mahasiswa')->truncate();
        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');

        // 1. Setup Criteria
        $kData = [
            ['kode_kriteria' => 'C1', 'nama_kriteria' => 'IPK', 'bobot' => 0.30, 'tipe' => 'benefit'],
            ['kode_kriteria' => 'C2', 'nama_kriteria' => 'Penghasilan Orang Tua', 'bobot' => 0.25, 'tipe' => 'cost'],
            ['kode_kriteria' => 'C3', 'nama_kriteria' => 'Jumlah Tanggungan', 'bobot' => 0.15, 'tipe' => 'benefit'],
            ['kode_kriteria' => 'C4', 'nama_kriteria' => 'Prestasi', 'bobot' => 0.20, 'tipe' => 'benefit'],
            ['kode_kriteria' => 'C5', 'nama_kriteria' => 'Organisasi', 'bobot' => 0.10, 'tipe' => 'benefit'],
        ];
        $this->db->table('kriteria')->insertBatch($kData);

        $kriteria = $this->db->table('kriteria')->get()->getResultArray();
        $kMap = [];
        foreach ($kriteria as $k) {
            $kMap[$k['kode_kriteria']] = $k['id'];
        }

        // 2. Generate 100 Students with diverse profiles
        $faker = \Faker\Factory::create('id_ID');
        $mData = [];
        for ($i = 1; $i <= 100; $i++) {
            $nim = 2200 + $i;
            $mData[] = [
                'nim' => (string) $nim,
                'nama' => $faker->name,
                'email' => $faker->unique()->safeEmail,
            ];
        }
        $this->db->table('mahasiswa')->insertBatch($mData);

        $mahasiswa = $this->db->table('mahasiswa')->get()->getResultArray();
        $mIds = [];
        foreach ($mahasiswa as $m) {
            $mIds[$m['nim']] = $m['id'];
        }

        // 3. Generate 500 Assessment Records (100 students x 5 criteria)
        $pData = [];
        $sawMatrix = [];

        foreach ($mahasiswa as $m) {
            $nim = $m['nim'];
            $mId = $m['id'];

            // Logic to create interesting clusters
            if ($nim % 10 == 0) { // The "Rich but Smart" outliers
                $ipk = rand(380, 400) / 100;
                $income = rand(15, 30);
                $dep = rand(1, 2);
                $prest = rand(1, 2);
                $org = rand(4, 5);
            } elseif ($nim % 7 == 0) { // The "Academic Stars"
                $ipk = rand(390, 400) / 100;
                $income = rand(5, 10);
                $dep = rand(2, 3);
                $prest = rand(4, 5);
                $org = rand(3, 5);
            } elseif ($nim % 3 == 0) { // The "Economic Priority"
                $ipk = rand(275, 340) / 100;
                $income = rand(1, 3);
                $dep = rand(4, 6);
                $prest = rand(1, 3);
                $org = rand(1, 3);
            } else { // Balanced students
                $ipk = rand(300, 385) / 100;
                $income = rand(3, 8);
                $dep = rand(2, 4);
                $prest = rand(2, 4);
                $org = rand(2, 4);
            }

            $vals = [$ipk, $income, $dep, $prest, $org];
            $sawMatrix[$mId] = $vals;

            $idx = 0;
            foreach (['C1', 'C2', 'C3', 'C4', 'C5'] as $kode) {
                $pData[] = [
                    'mahasiswa_id' => $mId,
                    'kriteria_id' => $kMap[$kode],
                    'nilai' => $vals[$idx++]
                ];
            }
        }
        $this->db->table('penilaian')->insertBatch($pData);

        // 4. Calculate DSS ranking for 100 students
        $saw = new SAWCalculator();
        $criteriaInfo = [];
        foreach ($kriteria as $k) {
            $criteriaInfo[] = ['type' => $k['tipe'], 'weight' => (float) $k['bobot']];
        }

        $scores = $saw->calculateScores($sawMatrix, $criteriaInfo);
        $ranked = $saw->rank($scores);

        $hData = [];
        foreach ($ranked as $r) {
            $hData[] = [
                'mahasiswa_id' => $r['id'],
                'total_nilai' => $r['score'],
                'ranking' => $r['rank']
            ];
        }
        $this->db->table('hasil')->insertBatch($hData);
    }
}
