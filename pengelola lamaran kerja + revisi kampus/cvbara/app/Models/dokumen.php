<?php

namespace App\Models;

use CodeIgniter\Model;

class dokumen extends Model
{
    protected $table            = 'dokumen';
    protected $primaryKey       = 'id_dokumen';
    protected $allowedFields    = ['id_dokumen','id_pelamar','ijazah','cv'];
}
