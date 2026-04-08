<?php

namespace App\Models;

use CodeIgniter\Model;

# Class Model untuk mengelola penyimpanan nilai kriteria masing-masing mahasiswa
class PenilaianModel extends Model
{
    protected $table = 'penilaian';
    protected $primaryKey = 'id';
    protected $allowedFields = ['mahasiswa_id', 'kriteria_id', 'nilai'];
    protected $useTimestamps = true;
}
