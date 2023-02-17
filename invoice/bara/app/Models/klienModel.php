<?php

namespace App\Models;

use CodeIgniter\Model;

class klienModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'client';
    protected $primaryKey       = 'no';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $protectFields    = false;
    protected $allowedFields    = ['no','id_klien','nama_perusahaan','nama','kota','telepon','email','bank','status'];

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

    public function pencarian($kunci) {
        return $this->table('client')->like('nama_perusahaan', $kunci);
    }

}
