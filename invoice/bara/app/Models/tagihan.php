<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class tagihan extends Model
{
    protected $table = 'tagihan';
    protected $allowedFields    = ['id_tagihan','no_invoice','nama_perusahaan','tanggal_invoice','status'];
    protected $primaryKey       = 'id_tagihan';
    protected $useAutoIncrement = true;
    public function pencarian($kunci) {
        return $this->table('tagihan')->like('nama_perusahaan', $kunci);
    }
    public function tanggal($min, $max) {
        //$tgl = [$min, $max];
        $this->table('tagihan')->where('tanggal_invoice >=', $min);
        $this->table('tagihan')->where('tanggal_invoice <=', $max);
        return $this->table('tagihan');
    }
}