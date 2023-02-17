<?php 

namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\klienModel;
 
class tamah extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $model = new klienModel();
        $kunci = $this->request->getVar('cari');
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT * FROM client');
        $results = $query->getResult();
        
        if($results == null){
            $baru = "KL1";
        }else{
            foreach ($results as $row) {
                $idkel = $row->id_klien;
             }
             $angka  = intval(substr($idkel, 2));
             $int    = $angka+1;
             $baru   = "KL".$int;
        }       
        $data = array(
                'no'                      => '',
                'id_klien'                => $baru,
                'nama_perusahaan'         => $this->request->getPost('company'),
                'nama'                    => $this->request->getPost('nama'),
                'kota'                    => $this->request->getPost('kota'),
                'telepon'                 => $this->request->getPost('telp'),
                'email'                   => $this->request->getPost('email'),
                'bank'                    => $this->request->getPost('bank'),
                'status'                  => 1,
            );
        $model = new klienModel();
        $model->insert($data);
        return redirect()->to('/daftar');
    }
}