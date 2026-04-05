<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\MahasiswaModel;
use App\Models\PenilaianModel;
use App\Models\HasilModel;
use App\Libraries\SAWCalculator;
use CodeIgniter\API\ResponseTrait;

class Ranking extends BaseController
{
    use ResponseTrait;

    public function calculate()
    {
        $kriteriaModel = new KriteriaModel();
        $mahasiswaModel = new MahasiswaModel();
        $penilaianModel = new PenilaianModel();
        $hasilModel = new HasilModel();
        $calculator = new SAWCalculator();

        // 1. Fetch Criteria and Weights
        $kriteria = $kriteriaModel->orderBy('id', 'ASC')->findAll();
        if (empty($kriteria)) {
            return $this->fail('No criteria found.', 400);
        }

        // 2. Fetch all students
        $mahasiswa = $mahasiswaModel->findAll();
        if (empty($mahasiswa)) {
            return $this->fail('No students found.', 400);
        }

        // 3. Build Matrix
        $matrix = [];
        foreach ($mahasiswa as $m) {
            $mId = $m['id'];
            $row = [];
            foreach ($kriteria as $k) {
                $p = $penilaianModel->where([
                    'mahasiswa_id' => $mId,
                    'kriteria_id' => $k['id']
                ])->first();
                $row[] = $p ? (float)$p['nilai'] : 0;
            }
            $matrix[$mId] = $row;
        }

        // 4. Format criteria for calculator
        $criteriaData = array_map(fn($k) => [
            'type' => $k['tipe'],
            'weight' => (float)$k['bobot']
        ], $kriteria);

        // 5. Run SAW Calculation
        $scores = $calculator->calculateScores($matrix, $criteriaData);
        $rankedResults = $calculator->rank($scores);

        // 6. Save/Update Results
        $hasilModel->truncate(); // Clear old results
        foreach ($rankedResults as $res) {
            $hasilModel->insert([
                'mahasiswa_id' => $res['id'],
                'total_nilai' => $res['score'],
                'ranking' => $res['rank']
            ]);
        }

        return $this->respond([
            'status' => 'success',
            'message' => 'Ranking calculated and saved successfully.',
            'results' => $rankedResults
        ]);
    }
}
