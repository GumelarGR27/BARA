<?php

namespace App\Controllers;
use App\Models\tagihan;
use App\Models\detailtagihan;
//use \Mpdf\Mpdf;

class datainvoice extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $pager = \Config\Services::pager();
        $model = new tagihan();
        $detail = new detailtagihan();
        $ditel = $model->select('id_tagihan')->where('no_invoice', $this->request->getVar('noinv'))->first();
        $data['tagihan'] = $detail->where('id_tagihan', $ditel)->paginate(5);
        $data['pager'] = $detail->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        if(! session()->get('logged_in')){
            echo view('user_login');
        }else{
            echo view('client', $data);
        }
    }
}
