<?php 

namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\klienModel;
 
class Client extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $pager = \Config\Services::pager();
        $data['client'] = $model->where('status',1)->paginate(5);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        
        echo view('daptar',$data);
    }
}