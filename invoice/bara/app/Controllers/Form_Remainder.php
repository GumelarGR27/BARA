<?php

namespace App\Controllers;
use App\Models\remindModel;

class Form_Remainder extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new remindModel();
        $data['client'] = $model->where('status',1)->orderBy('due_date', 'DESC')->paginate(5);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        if(! session()->get('logged_in')){
            echo view('user_login');
        }else{
            echo view('form_reminder',$data);
        }
    }
}
