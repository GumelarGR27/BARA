<?php

namespace App\Controllers;
use App\Models\klienModel;

class Pendaftaran extends BaseController
{
    public function index()
    {
        $kunci = $this->request->getPost('cari');
        $model = new klienModel();
        if ($kunci!="") {
            $db = \Config\Database::connect();
            // $query   = $db->query('SELECT * FROM client WHERE nama_perusahaan LIKE "%'.$kunci.'%"');
            // $results = $query->getResult();
            
            // foreach ($results as $row) {
            //     $kunci = $row->id_klien;
            // }
            $query = $model->pencarian($kunci);
            $hasil = "Pencarian dengan nama <B>$kunci</B> ditemukan ".$query->affectedRows()." Data";
        } else {
            $query = $model;
            $hasil = "";
        }

        $pager = \Config\Services::pager();
        
        $data['client'] = $model->paginate(5);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        echo view('daptar',$data);
    }

}
