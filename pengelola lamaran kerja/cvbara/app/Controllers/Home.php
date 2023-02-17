<?php

namespace App\Controllers;
use App\Models\LowonganModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new LowonganModel();
        $data['lowongan'] = $model->paginate(5);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        //$data['hasil'] = $hasil;
        return view('index', $data);
    }
}
