<?php

namespace App\Controllers;
use App\Models\DivisiModel;
use App\Models\LowonganModel;

class Kelola extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    
    public function index()
    {
        $db = \Config\Database::connect();
        $pager = \Config\Services::pager();
        $model = new LowonganModel();
        $data['kelola'] = $model->paginate(5);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        
        if(! session()->get('logged_in')){
            return "<div style='text-align: center;'>".
                        "<h1 style='border-bottom: 1px solid black;'>".'403 Forbidden'."</h1>"
                        ."<a href='home'>".
                            "Go to Homepage"
                        ."</a>"
                   ."</div>";
        }else{
            echo view('admin/pages/kelola',$data);
        }
        
       // return view('admin/pages/kelola');
    }
    public function tambah()
    {
        return view('admin/pages/TambahDivisi');
    }
    public function nambah()
    {
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT id_divisi FROM divisi');
        $results = $query->getResult();
        $queryy   = $db->query('SELECT * FROM lowongan');
        $resultss = $queryy->getResult();
        $model = new DivisiModel();
        $modell = new LowonganModel();
        if($results == null){
            $baru = "DIV01";
            $data = array(
                'id_divisi'        => $baru,
                'Nama'              => $this->request->getPost('nama'),
            );
            $model->insert($data);

            if($resultss == null){
                foreach ($results as $row) {
                    $iddiv = $row->id_divisi;
                 }
                 $angkaa  = intval(substr($iddiv, 4));
                 $intt    = $angkaa+1;
                 $iddiv   = "DIV0".$intt;
                $idlow = "LOW01";
                $data = array(
                    'id_lowongan'           => $idlow,
                    'id_divisi'             => $iddiv,
                    'kriteria'              => $this->request->getPost('kriteria'),
                );
                $modell->insert($data);
            }else{
                foreach ($resultss as $row) {
                    $idlow = $row->id_lowongan;
                 }
                 $angka  = intval(substr($idlow, 4));
                 $int    = $angka+1;
                 $baru   = "LOW0".$int;

                 foreach ($results as $row) {
                    $iddiv = $row->id_divisi;
                 }
                 $angkaa  = intval(substr($iddiv, 4));
                 $intt    = $angkaa+1;
                 $iddiv   = "DIV0".$intt;

                 $data = array(
                    'id_lowongan'           => $baru,
                    'id_divisi'             => $iddiv,
                    'kriteria'              => $this->request->getPost('kriteria'),
                );
                $modell->insert($data);
            }
            return redirect()->to('/kelola');
        }else{
            foreach ($results as $row) {
                $iddiv = $row->id_divisi;
             }
             $angka  = intval(substr($iddiv, 4));
             $int    = $angka+1;
             $baru   = "DIV0".$int;

             $data = array(
                'id_divisi'        => $baru,
                'Nama'              => $this->request->getPost('nama'),
            );
            $model->insert($data);

            if($resultss == null){
                foreach ($results as $row) {
                    $iddiv = $row->id_divisi;
                 }
                 $angkaa  = intval(substr($iddiv, 4));
                 $intt    = $angkaa+1;
                 $iddiv   = "DIV0".$intt;
                $idlow = "LOW01";
                $data = array(
                    'id_lowongan'           => $idlow,
                    'id_divisi'             => $iddiv,
                    'kriteria'              => $this->request->getPost('kriteria'),
                );
                $modell->insert($data);
            }else{
                foreach ($resultss as $row) {
                    $idlow = $row->id_lowongan;
                 }
                 $angka  = intval(substr($idlow, 4));
                 $int    = $angka+1;
                 $baru   = "LOW0".$int;

                 foreach ($results as $row) {
                    $iddiv = $row->id_divisi;
                 }
                 $angkaa  = intval(substr($iddiv, 4));
                 $intt    = $angkaa+1;
                 $iddiv   = "DIV0".$intt;

                 $data = array(
                    'id_lowongan'           => $baru,
                    'id_divisi'             => $iddiv,
                    'kriteria'              => $this->request->getPost('kriteria'),
                );
                $modell->insert($data);
            }
             return redirect()->to('/kelola');
        }
    }
    public function edit(){
        $db = \Config\Database::connect();
        if(! session()->get('logged_in')){
            return "<div style='text-align: center;'>".
                        "<h1 style='border-bottom: 1px solid black;'>".'403 Forbidden'."</h1>"
                        ."<a href='home'>".
                            "Go to Homepage"
                        ."</a>"
                   ."</div>";
        }else{
            return view('admin/pages/edit');
        }
         
    }
    public function update(){
        $db = \Config\Database::connect();
        $request = \Config\Services::request();
        $nama = $this->request->getPost('nama');
        $id = $db->query('SELECT id_divisi FROM divisi WHERE Nama = "'.$nama.'"'); 
        $results = $id->getResult();
        foreach ($results as $roww) {
            $aidi = $roww->id_divisi;
        }
        
             $query   = $db->query('SELECT id_lowongan FROM lowongan WHERE id_divisi="'.$aidi.'"');
             $idlowongan = $query->getResult();
        
        foreach ($idlowongan as $row) {
            $idlow = $row->id_lowongan;
          }
        $model = new LowonganModel();
        //$id = $this->request->getPost('product_id');
        $data = array(
            'id_lowongan'      => $idlow,
            'id_divisi'        => $aidi,
            'kriteria'         => $this->request->getPost('kriteria'),
        );
        //$model->updateLowongan($data, $idlow);
        $model->save($data);
        if(! session()->get('logged_in')){
            return "<div style='text-align: center;'>".
                        "<h1 style='border-bottom: 1px solid black;'>".'403 Forbidden'."</h1>"
                        ."<a href='home'>".
                            "Go to Homepage"
                        ."</a>"
                   ."</div>";
        }else{
            return redirect()->to('/kelola');
        }
    }
    public function hapus(){
        $model = new DivisiModel();
        $modell = new LowonganModel();
        $nama = $this->request->getPost('nama');
        $iddiv = $model->select('id_divisi')->where('Nama', $nama)->first();
        $idlow = $modell->select('id_lowongan')->where('id_divisi', $iddiv)->first();
        $modell->delete($idlow);
        $model->delete($iddiv);
        $session = session();
        $session->setFlashdata('msg', 'Lowongan Kerja Berhasil Dihapus !');
        return redirect()->to('/kelola');
    }
}