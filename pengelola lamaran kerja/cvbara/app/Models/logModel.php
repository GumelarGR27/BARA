<?php

namespace App\Models;

use CodeIgniter\Model;

class logModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user_log';
    protected $allowedFields    = ['user', 'username'];
}
