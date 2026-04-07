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

        $allowedPerPage = [25, 50, 100];
        $perPage = (int) $this->request->getGet('limit') ?: 25;
        if (!in_array($perPage, $allowedPerPage, true)) {
            $perPage = 25;
        }

        $data['mahasiswa'] = $model->orderBy('nim', 'ASC')->paginate($perPage, 'default');
        $data['pager'] = $model->pager;
        $data['perPage'] = $perPage;
        $data['title'] = 'Data Mahasiswa';

        return view('mahasiswa/index', $data);
    }

    public function show($id = null)
    {
        $model = new MahasiswaModel();
        $penilaianModel = new \App\Models\PenilaianModel();

        $data['mahasiswa'] = $model->find($id);
        if (!$data['mahasiswa']) {
            return redirect()->to('mahasiswa');
        }

        $data['evaluations'] = $penilaianModel->select('penilaian.*, kriteria.nama_kriteria, kriteria.tipe')
            ->join('kriteria', 'kriteria.id = penilaian.kriteria_id')
            ->where('mahasiswa_id', $id)
            ->findAll();

        $data['title'] = 'Profil Kandidat';
        return view('mahasiswa/show', $data);
    }

    public function new()
    {
        $data['title'] = 'Registrasi Kandidat';
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

    public function edit($id = null)
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->find($id);
        if (!$data['mahasiswa']) {
            return redirect()->to('mahasiswa');
        }
        $data['title'] = 'Perbarui Kandidat';
        return view('mahasiswa/edit', $data);
    }

    public function update($id = null)
    {
        $model = new MahasiswaModel();
        $data = $this->request->getPost();

        if (!$model->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('mahasiswa')->with('message', 'Record updated successfully');
    }

    public function delete($id = null)
    {
        $model = new MahasiswaModel();
        $model->delete($id);
        return redirect()->to('mahasiswa')->with('message', 'Record purged successfully');
    }
}
