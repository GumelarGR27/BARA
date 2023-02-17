<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class clientModel extends Model
{
    protected $table = 'tagihan';
    public function pencarian($kunci) {
        return $this->table('tagihan')->like('nama_perusahaan', $kunci);
    }
}