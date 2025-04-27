<?php

namespace App\Models;

use CodeIgniter\Model;

class SertifikasiModel extends Model
{
    protected $table            = 'tb_sertifikasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_sertifikasi_id',
        'nama_sertifikasi_en',
        'deskripsi_sertifikasi_id',
        'deskripsi_sertifikasi_en',
        'foto_sertifikasi',
        'alt_sertifikasi_id',
        'alt_sertifikasi_en',
        'title_id',
        'title_en',
        'meta_desc_id',
        'meta_desc_en',
        'slug_id',
        'slug_en'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
