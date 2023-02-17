<?php

namespace App\Controllers;
use App\Models\clientModel;

class invoice extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new clientModel();
        $data['client'] = $model->where('status', 1)->paginate(5);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        if(! session()->get('logged_in')){
            echo view('user_login');
        }else{
            echo view('rimainder',$data);
        }
        $kunci = $this->request->getPost('cari');
        //$model = new klienModel();
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
        //return view('admin/pages/index');
        // return view('index');
    }
}
