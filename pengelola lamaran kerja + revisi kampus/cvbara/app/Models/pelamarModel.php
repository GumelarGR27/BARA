<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class pelamarModel extends Model
{
    protected $table = 'pelamar';
    protected $primaryKey       = 'id_pelamar';
    protected $allowedFields    = ['id_pelamar', 'nama', 'email', 'deskripsi', 'id_divisi', 'gaji', 'jenis', 'status', 'upload'];
    public function pencarian($kunci) {
        return $this->table('pelamar')->like('nama', $kunci);
    }
    public function nyari($dipisi) {
        $db = \Config\Database::connect();
        $kueri  = $db->query('SELECT id_divisi FROM divisi WHERE Nama = "'.$dipisi.'"');
        $dipisii = $kueri->getResult();

        foreach ($dipisii as $roww) {
           $divisi = $roww->id_divisi;
        }
        return $this->table('pelamar')->like('id_divisi', $divisi);
    }
}