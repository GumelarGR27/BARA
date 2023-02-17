<?php

namespace App\Controllers;
use App\Models\clientModel;

class Klien extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new clientModel();
        $data['remainder'] = $model->join('remainder', 'remainder.id_klien = client.id_klien')->join('tagihan', 'tagihan.id_klien = client.id_klien')->orderBy('id_tagihan', 'DESC')->paginate(5);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        if(! session()->get('logged_in')){
            echo view('user_login');
        }else{
            echo view('/',$data);
        }
        
        //return view('admin/pages/index');
    }
}