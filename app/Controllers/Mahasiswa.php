<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use CodeIgniter\API\ResponseTrait;

class Mahasiswa extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->findAll();
        $data['title'] = 'STUDENT_REGISTRY';
        return view('mahasiswa/index', $data);
    }

    public function new()
    {
        $data['title'] = 'REGISTER_CANDIDATE';
        return view('mahasiswa/new', $data);
    }

    public function create()
    {
        $model = new MahasiswaModel();
        $data = $this->request->getPost();

        if (!$model->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('mahasiswa')->with('message', 'Record committed successfully');
    }

    public function delete($id = null)
    {
        $model = new MahasiswaModel();
        $model->delete($id);
        return redirect()->to('mahasiswa')->with('message', 'Record purged successfully');
    }
}
