<?php

namespace App\Models;

use CodeIgniter\Model;

class CVModel extends Model
{
    protected $table            = 'cv';
    protected $primaryKey       = 'no';
    protected $allowedFields    = ['no','id_pelamar','cv'];
}
