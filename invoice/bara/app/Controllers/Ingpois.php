<?php

namespace App\Controllers;
use App\Models\detailtagihan;
use App\Models\tagihan;
//use \Mpdf\Mpdf;

class Ingpois extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $pager = \Config\Services::pager();
        $detail = new detailtagihan();
        $tag = new tagihan();
        $idtag = $tag->select('id_tagihan')->where('no_invoice', $this->request->getVar('noinv'))->first();
        $data['tagihan'] = $detail->where('id_tagihan', $idtag)->where('status',1)->paginate(5);
        $data['pager'] = $detail->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        if(! session()->get('logged_in')){
            echo view('user_login');
        }else{
            echo view('ingpois', $data);
        }
    }
}
