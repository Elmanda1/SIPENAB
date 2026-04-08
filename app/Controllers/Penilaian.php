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
        $search = $this->request->getGet('search');

        $allowedPerPage = [25, 50, 100];
        $perPage = (int) $this->request->getGet('limit') ?: 25;
        if (!in_array($perPage, $allowedPerPage, true)) {
            $perPage = 25;
        }

        if ($search) {
            $mahasiswaModel->groupStart()
                ->like('nama', $search)
                ->orLike('nim', $search)
                ->orLike('email', $search)
                ->groupEnd();
        }

        $data['mahasiswa'] = $mahasiswaModel->orderBy('nim', 'ASC')->paginate($perPage, 'default');
        $data['pager'] = $mahasiswaModel->pager;
        $data['perPage'] = $perPage;
        $data['search'] = $search;

        $studentIds = array_column($data['mahasiswa'], 'id');
        $evaluations = [];
        if (!empty($studentIds)) {
            $evaluations = $penilaianModel->select('mahasiswa_id, COUNT(*) as total')
                ->whereIn('mahasiswa_id', $studentIds)
                ->groupBy('mahasiswa_id')
                ->findAll();
        }

        $data['eval_counts'] = [];
        foreach ($evaluations as $e) {
            $data['eval_counts'][$e['mahasiswa_id']] = $e['total'];
        }

        $data['title'] = 'Matriks Penilaian';

        if ($this->request->isAJAX()) {
            return view('penilaian/table_partial', $data);
        }

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

        $data['title'] = 'Input Penilaian';
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
                    'kriteria_id' => $kriteriaId,
                    'nilai' => $nilai
                ];
            }
        }

        if (!empty($batchData)) {
            $penilaianModel->insertBatch($batchData);
        }

        return redirect()->to('penilaian')->with('message', 'Evaluation data committed successfully');
    }
}
