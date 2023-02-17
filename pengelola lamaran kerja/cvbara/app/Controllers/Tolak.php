<?php

namespace App\Controllers;
use App\Models\pesanModel;

class Tolak extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    
    public function index()
    {
        // $pager = \Config\Services::pager();
        $model = new pesanModel();
        $kunci = $this->request->getVar('cari');

        if ($kunci!="") {
            $query = $model->pencarian($kunci);
            $hasil = "Pencarian dengan nama <B>$kunci</B> ditemukan ".$query->affectedRows()." Data";
        } else {
            $query = $model;
            $hasil = "";
        }
        $data['pesan'] = $model->where('jenis','Tolak')->paginate(5);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['hasil'] = $hasil;
        echo view('admin/pages/tolak',$data);
        //return view('admin/pages/index');
    }
}