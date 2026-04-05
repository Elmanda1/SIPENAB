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
        
        // Join with mahasiswa to get names and NIM
        $data['rankings'] = $hasilModel->select('hasil.*, mahasiswa.nama, mahasiswa.nim')
            ->join('mahasiswa', 'mahasiswa.id = hasil.mahasiswa_id')
            ->orderBy('ranking', 'ASC')
            ->findAll();

        $data['criteria'] = $kriteriaModel->findAll();

        return view('dashboard/ranking', $data);
    }
}
