<?php

namespace App\Models;

use CodeIgniter\Model;

class logModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'log';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'id_users', 'keterangan','tanggal'];
}
