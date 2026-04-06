<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\MahasiswaModel;
use App\Models\PenilaianModel;
use App\Models\HasilModel;
use App\Libraries\SAWCalculator;

class Ranking extends BaseController
{
    public function calculate()
    {
        $kriteriaModel  = new KriteriaModel();
        $mahasiswaModel = new MahasiswaModel();
        $penilaianModel = new PenilaianModel();
        $hasilModel     = new HasilModel();
        $calculator     = new SAWCalculator();

        // 1. Fetch Criteria
        $kriteria = $kriteriaModel->orderBy('id', 'ASC')->findAll();
        if (empty($kriteria)) {
            return redirect()->to('dashboard')->with('error', 'Tidak ada kriteria. Tambah kriteria terlebih dahulu.');
        }

        // 2. Fetch students
        $mahasiswa = $mahasiswaModel->findAll();
        if (empty($mahasiswa)) {
            return redirect()->to('dashboard')->with('error', 'Tidak ada data mahasiswa. Tambah mahasiswa terlebih dahulu.');
        }

        // 3. Build decision matrix
        $matrix = [];
        foreach ($mahasiswa as $m) {
            $mId = $m['id'];
            $row = [];
            foreach ($kriteria as $k) {
                $p = $penilaianModel->where([
                    'mahasiswa_id' => $mId,
                    'kriteria_id'  => $k['id']
                ])->first();
                $row[] = $p ? (float)$p['nilai'] : 0;
            }
            $matrix[$mId] = $row;
        }

        // 4. Format criteria for SAW
        $criteriaData = array_map(fn($k) => [
            'type'   => $k['tipe'],
            'weight' => (float)$k['bobot']
        ], $kriteria);

        // 5. Run SAW
        $scores        = $calculator->calculateScores($matrix, $criteriaData);
        $rankedResults = $calculator->rank($scores);

        // 6. Save results
        $hasilModel->truncate();
        foreach ($rankedResults as $res) {
            $hasilModel->insert([
                'mahasiswa_id' => $res['id'],
                'total_nilai'  => $res['score'],
                'ranking'      => $res['rank']
            ]);
        }

        return redirect()->to('dashboard')->with('success', 'Perhitungan SAW berhasil! Peringkat ' . count($rankedResults) . ' kandidat telah diperbarui.');
    }
}
