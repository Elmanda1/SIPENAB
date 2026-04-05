<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use CodeIgniter\API\ResponseTrait;

class Mahasiswa extends BaseController
{
    use ResponseTrait;

    public function create()
    {
        $model = new MahasiswaModel();
        $data = $this->request->getPost();

        if (!$model->insert($data)) {
            return $this->fail($model->errors(), 400);
        }

        return $this->respondCreated(['message' => 'Mahasiswa created successfully']);
    }
}
