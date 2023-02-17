<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class tolakModel extends Model
{
    protected $table = 'pelamar';
    public function pencarian($kunci) {
        return $this->table('pelamar')->like('nama', $kunci);
    }
}