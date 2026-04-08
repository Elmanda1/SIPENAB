<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HasilModel;
use App\Models\KriteriaModel;

class Dashboard extends BaseController
{
    # Function yang berfungsi untuk menampilkan halaman utama dashboard admin
    public function index()
    {
        $hasilModel = new HasilModel();
        $kriteriaModel = new KriteriaModel();

        $data['rankings'] = $hasilModel->select('hasil.*, mahasiswa.nama, mahasiswa.nim')
            ->join('mahasiswa', 'mahasiswa.id = hasil.mahasiswa_id')
            ->orderBy('ranking', 'ASC')
            ->findAll();

        $data['criteria'] = $kriteriaModel->findAll();
        $data['title'] = 'Ranking SAW';

        return view('dashboard/ranking', $data);
    }

    # Function yang berfungsi untuk menampilkan halaman laporan statistik dan rekapitulasi data
    public function report()
    {
        $hasilModel = new HasilModel();
        $data['rankings'] = $hasilModel->select('hasil.*, mahasiswa.nama, mahasiswa.nim')
            ->join('mahasiswa', 'mahasiswa.id = hasil.mahasiswa_id')
            ->orderBy('ranking', 'ASC')
            ->findAll();

        return view('dashboard/report', $data);
    }
}
