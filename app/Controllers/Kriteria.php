<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use CodeIgniter\API\ResponseTrait;

class Kriteria extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $model = new KriteriaModel();
        $data['kriteria'] = $model->findAll();
        $data['title'] = 'Data Kriteria';
        return view('kriteria/index', $data);
    }

    public function new()
    {
        $data['title'] = 'Tambah Kriteria';
        return view('kriteria/new', $data);
    }

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

    public function delete($id = null)
    {
        $model = new KriteriaModel();
        $model->delete($id);
        return redirect()->to('kriteria')->with('message', 'Record purged successfully');
    }
}
