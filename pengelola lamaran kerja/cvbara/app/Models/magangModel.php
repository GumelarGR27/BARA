<?php
 
namespace App\Models;
use CodeIgniter\Model;
 
class magangModel extends Model
{
    protected $table            = 'magang';
    protected $primaryKey       = 'id_magang';
    protected $allowedFields    = ['id_magang','id_pelamar', 'durasi'];
}