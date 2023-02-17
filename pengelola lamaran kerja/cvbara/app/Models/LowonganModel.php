<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class LowonganModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'lowongan';
    protected $primaryKey       = 'id_lowongan';
    protected $allowedFields    = ['id_lowongan','id_divisi','kriteria'];
}