<?php

namespace App\Models;

use CodeIgniter\Model;

class WilayahModel extends Model
{
    protected $table            = 'wilayah';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode','nama'];

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

    public function getProvinsi()
    {
        return $this->where("LENGTH(kode)", 2)->orderBy('nama', 'ASC')->findAll();
    }

    // Ambil Kabupaten berdasarkan kode provinsi (2 digit pertama)
    public function getKabupaten($provinsiKode)
    {
        return $this->where("LEFT(kode, 2)", $provinsiKode)
                    ->where("LENGTH(kode)", 5)
                    ->orderBy('nama', 'ASC')
                    ->findAll();
    }

    // Ambil Kecamatan berdasarkan kode kabupaten (5 digit pertama)
    public function getKecamatan($kabupatenKode)
    {
        return $this->where("LEFT(kode, 5)", $kabupatenKode)
                    ->where("LENGTH(kode)", 8)
                    ->orderBy('nama', 'ASC')
                    ->findAll();
    }

    // Ambil Kelurahan berdasarkan kode kecamatan (8 digit pertama)
    public function getKelurahan($kecamatanKode)
    {
        return $this->where("LEFT(kode, 8)", $kecamatanKode)
                    ->where("LENGTH(kode)", 13)
                    ->orderBy('nama', 'ASC')
                    ->findAll();
    }
    
}