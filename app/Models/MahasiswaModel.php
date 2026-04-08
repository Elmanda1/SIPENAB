<?php

namespace App\Models;

use CodeIgniter\Model;

# Class Model yang mengatur logika data, validasi, dan relasi tabel mahasiswa
class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['nim', 'nama', 'email'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'id' => 'permit_empty|integer',
        'nim' => 'required|is_unique[mahasiswa.nim,id,{id}]|min_length[3]|max_length[20]',
        'nama' => 'required|alpha_space|min_length[3]|max_length[100]',
        'email' => 'required|valid_email|max_length[100]',
    ];
    protected $validationMessages = [
        'nama' => [
            'required' => 'Nama wajib diisi.',
            'alpha_space' => 'Nama hanya boleh berisi huruf dan spasi (tidak boleh angka).',
        ],
        'email' => [
            'required' => 'Email wajib diisi.',
            'valid_email' => 'Format email tidak valid (harus mengandung @).',
        ],
        'nim' => [
            'required' => 'NIM wajib diisi.',
            'is_unique' => 'NIM sudah terdaftar di sistem.',
        ]
    ];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
