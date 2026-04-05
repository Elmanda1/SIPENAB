<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilModel extends Model
{
    protected $table            = 'hasil';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['mahasiswa_id', 'total_nilai', 'ranking'];
    protected $useTimestamps    = true;
}
