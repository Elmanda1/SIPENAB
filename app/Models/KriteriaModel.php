<?php

namespace App\Models;

use CodeIgniter\Model;

# Class Model yang mendefinisikan struktur data dan konfigurasi tabel kriteria
class KriteriaModel extends Model
{
    protected $table = 'kriteria';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_kriteria', 'nama_kriteria', 'bobot', 'tipe'];
    protected $useTimestamps = true;
}
