<?php

namespace App\Controllers;
use App\Models\detailtagihan;
//use \Mpdf\Mpdf;

class Inpois extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $detail = new detailtagihan();
        // $db = \Config\Database::connect();
        // $request = \Config\Services::request();
        // $nama = $request->getVar('nama');
        // $query   = $db->query('SELECT * FROM tagihan WHERE nama_perusahaan="'.$nama.'"');
        // $results = $query->getResult();
        // foreach ($results as $row) {
        //     $comp = $row->nama_perusahaan;
        // }
        // $data['noinv'] = $row->no_invoice;
        $data['tagihan'] = $detail->where('nama_perusahaan', $this->request->getVar('nama'))->where('status',1)->paginate(5);
        $data['pager'] = $detail->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        if(! session()->get('logged_in')){
            echo view('user_login');
        }else{
            $dompdf = new \Dompdf\Dompdf(); 
            $dompdf->loadHtml(view('inpois',$data));
            $dompdf->setPaper('A4', 'potrait');
            $dompdf->set_option('isRemoteEnabled', true);
            $dompdf->set_option('isHtml5ParserEnabled', true);
            $dompdf->render();
            $dompdf->stream();
        }
    }
}

            