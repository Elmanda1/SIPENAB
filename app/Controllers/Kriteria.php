<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use CodeIgniter\API\ResponseTrait;

class Kriteria extends BaseController
{
    use ResponseTrait;

    # Function yang berfungsi untuk menampilkan daftar seluruh kriteria penilaian
    public function index()
    {
        $model = new KriteriaModel();
        $data['kriteria'] = $model->findAll();
        $data['title'] = 'Data Kriteria';
        return view('kriteria/index', $data);
    }

    # Function yang berfungsi untuk menampilkan form pembuatan kriteria penilaian baru
    public function new()
    {
        $data['title'] = 'Tambah Kriteria';
        return view('kriteria/new', $data);
    }

    # Function yang berfungsi untuk memproses penyimpanan data kriteria baru ke database
    public function create()
    {
        $model = new KriteriaModel();
        $data = $this->request->getPost();

        // Optional: add validation rules in KriteriaModel
        if (!$model->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('kriteria')->with('message', 'Record committed successfully');
    }

    # Function yang berfungsi untuk menghapus data kriteria dari database
    public function delete($id = null)
    {
        $model = new KriteriaModel();
        $model->delete($id);
        return redirect()->to('kriteria')->with('message', 'Record purged successfully');
    }
}
