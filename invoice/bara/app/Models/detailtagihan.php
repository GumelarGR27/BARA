<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class detailtagihan extends Model
{
    protected $table = 'detail_tagihan';
    protected $primaryKey       = 'no';
    protected $allowedFields    = ['no','id_tagihan','unit','deskripsi','quantity','nama_perusahaan','total','status'];
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