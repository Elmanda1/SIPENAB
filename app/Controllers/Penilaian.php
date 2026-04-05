<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenilaianModel;
use App\Models\MahasiswaModel;
use App\Models\KriteriaModel;

class Penilaian extends BaseController
{
    public function index()
    {
        $mahasiswaModel = new MahasiswaModel();
        $penilaianModel = new PenilaianModel();
        
        $data['mahasiswa'] = $mahasiswaModel->findAll();
        
        // Fetch total evaluations per student for status display
        $evaluations = $penilaianModel->select('mahasiswa_id, COUNT(*) as total')
                                      ->groupBy('mahasiswa_id')
                                      ->findAll();
                                      
        $data['eval_counts'] = [];
        foreach ($evaluations as $e) {
            $data['eval_counts'][$e['mahasiswa_id']] = $e['total'];
        }

        $data['title'] = 'EVALUATION_MATRIX';
        return view('penilaian/index', $data);
    }

    public function new()
    {
        $mahasiswaId = $this->request->getGet('mahasiswa_id');
        if (!$mahasiswaId) {
            return redirect()->to('penilaian');
        }

        $mahasiswaModel = new MahasiswaModel();
        $kriteriaModel = new KriteriaModel();
        $penilaianModel = new PenilaianModel();

        $data['mahasiswa'] = $mahasiswaModel->find($mahasiswaId);
        $data['kriteria'] = $kriteriaModel->orderBy('id', 'ASC')->findAll();
        
        // Fetch existing values if any
        $existing = $penilaianModel->where('mahasiswa_id', $mahasiswaId)->findAll();
        $data['existing_values'] = [];
        foreach ($existing as $e) {
            $data['existing_values'][$e['kriteria_id']] = $e['nilai'];
        }

        $data['title'] = 'EVALUATION_INPUT';
        return view('penilaian/new', $data);
    }

    public function create()
    {
        $penilaianModel = new PenilaianModel();
        $mahasiswaId = $this->request->getPost('mahasiswa_id');
        $nilaiData = $this->request->getPost('nilai'); // Array of [kriteria_id => nilai]

        if (!$mahasiswaId || empty($nilaiData)) {
            return redirect()->back()->with('error', 'Invalid evaluation data');
        }

        // Delete existing evaluations for this student to prevent duplicates
        $penilaianModel->where('mahasiswa_id', $mahasiswaId)->delete();

        $batchData = [];
        foreach ($nilaiData as $kriteriaId => $nilai) {
            if ($nilai !== '') { // Only save filled inputs
                $batchData[] = [
                    'mahasiswa_id' => $mahasiswaId,
                    'kriteria_id'  => $kriteriaId,
                    'nilai'        => $nilai
                ];
            }
        }

        if (!empty($batchData)) {
            $penilaianModel->insertBatch($batchData);
        }

        return redirect()->to('penilaian')->with('message', 'Evaluation data committed successfully');
    }
}
