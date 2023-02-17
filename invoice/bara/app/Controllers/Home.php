<?php

namespace App\Controllers;
use App\Models\remindModel;

class Home extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new remindModel();
        $kunci = $this->request->getPost('cari');
        $min = $this->request->getPost('min');
        $max = $this->request->getPost('max');

        if ($kunci!="") {
            $db = \Config\Database::connect();
            $query   = $db->query('SELECT * FROM client WHERE nama_perusahaan LIKE "%'.$kunci.'%"');
            $results = $query->getResult();
            
            foreach ($results as $row) {
                $kunci = $row->id_klien;
            }
            $query = $model->pencarian($kunci);
            $hasil = "Pencarian dengan nama <B>$kunci</B> ditemukan ".$query->affectedRows()." Data";
        } if ($max!="") {
            $query = $model->tanggal($min, $max);
            $hasil = "Pencarian dengan nama <B>$kunci</B> ditemukan ".$query->affectedRows()." Data";
        } else {
            $query = $model;
            $hasil = "";
        }
        $data['client'] = $model->orderBy('due_date', 'ASC')->paginate(5);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        if(! session()->get('logged_in')){
            echo view('user_login');
        }else{
            echo view('index', $data);
        }
    }
    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
