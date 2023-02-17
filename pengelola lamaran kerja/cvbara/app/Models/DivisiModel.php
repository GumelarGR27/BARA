<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class DivisiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'divisi';
    protected $primaryKey       = 'id_divisi';
    protected $allowedFields    = ['id_divisi','Nama'];
}