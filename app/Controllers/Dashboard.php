<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HasilModel;
use App\Models\KriteriaModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $hasilModel = new HasilModel();
        $kriteriaModel = new KriteriaModel();
        
        $data['rankings'] = $hasilModel->select('hasil.*, mahasiswa.nama, mahasiswa.nim')
            ->join('mahasiswa', 'mahasiswa.id = hasil.mahasiswa_id')
            ->orderBy('ranking', 'ASC')
            ->findAll();

        $data['criteria'] = $kriteriaModel->findAll();
        $data['title'] = 'RANKING_INDEX';

        return view('dashboard/ranking', $data);
    }
}
