<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class pesanModel extends Model
{
    protected $table = 'pesan';
    protected $primaryKey       = 'id_pesan';
    protected $allowedFields    = ['id_pesan', 'subjek', 'isi', 'jenis'];
}