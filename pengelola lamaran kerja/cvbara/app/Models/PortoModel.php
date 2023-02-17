<?php

namespace App\Models;

use CodeIgniter\Model;

class PortoModel extends Model
{
    protected $table            = 'porto';
    protected $primaryKey       = 'no';
    protected $allowedFields    = ['no','id_pelamar','porto'];
}
