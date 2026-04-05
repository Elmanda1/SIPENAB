<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
    protected $table            = 'penilaian';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['mahasiswa_id', 'kriteria_id', 'nilai'];
    protected $useTimestamps    = true;
}
