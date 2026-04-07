<?php

namespace App\Controllers;

use App\Models\KriteriaModel;
use App\Models\MahasiswaModel;
use App\Models\PenilaianModel;
use App\Libraries\SAWCalculator;

class DssAnalysis extends BaseController
{
    public function index()
    {
        $kModel = new KriteriaModel();
        $mModel = new MahasiswaModel();
        $pModel = new PenilaianModel();
        $saw = new SAWCalculator();

        $kriteria = $kModel->findAll();
        $mahasiswa = $mModel->findAll();
        
        if (empty($kriteria) || empty($mahasiswa)) {
            echo "Data kriteria atau mahasiswa kosong!\n";
            return;
        }

        // Prepare Matrix
        $matrix = [];
        foreach ($mahasiswa as $m) {
            $penilaian = $pModel->where('mahasiswa_id', $m['id'])->findAll();
            $row = [];
            foreach ($kriteria as $k) {
                $val = 0;
                foreach ($penilaian as $p) {
                    if ($p['kriteria_id'] == $k['id']) {
                        $val = $p['nilai'];
                        break;
                    }
                }
                $row[] = (float)$val;
            }
            $matrix[$m['id']] = $row;
        }

        // Prepare Criteria Info
        $criteriaInfo = [];
        foreach ($kriteria as $k) {
            $criteriaInfo[] = [
                'type' => $k['tipe'],
                'weight' => (float)$k['bobot']
            ];
        }

        // Calculate
        $scores = $saw->calculateScores($matrix, $criteriaInfo);
        $ranking = $saw->rank($scores);

        // Display
        echo "\n=== DSS MASTER ANALYSIS (SAW METHOD) ===\n";
        echo str_pad("Rank", 5) . " | " . str_pad("Nama Mahasiswa", 20) . " | " . str_pad("Score", 10) . "\n";
        echo str_repeat("-", 45) . "\n";

        foreach ($ranking as $r) {
            $mName = "";
            foreach ($mahasiswa as $m) {
                if ($m['id'] == $r['id']) {
                    $mName = $m['nama'];
                    break;
                }
            }
            echo str_pad($r['rank'], 5) . " | " . str_pad($mName, 20) . " | " . number_format($r['score'], 4) . "\n";
        }
        echo "========================================\n";
    }
}
