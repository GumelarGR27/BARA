<?php 

namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class user extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $model = new UserModel();
        $pager = \Config\Services::pager();
        $data['user'] = $model->paginate(5);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        
        echo view('user',$data);
    }
}