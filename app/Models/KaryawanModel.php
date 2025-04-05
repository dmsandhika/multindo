<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table            = 'calon_karyawan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nik',
        'nama',
        'pas_foto',
        'alamat',
        'alamat_ortu',
        'identitas',
        'status_rumah',
        'jenis_kelamin',
        'warga_negara',
        'suku_bangsa',
        'tempat_lahir',
        'tanggal_lahir',
        'usia_tahun',
        'usia_bulan',
        'agama',
        'golongan_darah',
        'tinggi_badan',
        'berat_badan',
        'warna_kulit',
        'ciri_khusus',
        'status_marital',
        'status_keluarga',
        'keluaraga',
        'keluarga',
        'pendidikan',
        'kursus',
        'bahasa',
        'pendidikan_luar_negeri',
        'beasiswa',
        'pengalaman',
        'lamaran',
        'hobi',
        'organisasi',
        'kacamata',
        'penyakit',
        'psikologi',
        'kendaraan',
        'handphone',
        'rekomendasi',
        'kontrak',
        'cabang',
        'tunda_pernikahan',
        'jaminan_ijazah',
        'kerahasiaan',
        'visi_misi'
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