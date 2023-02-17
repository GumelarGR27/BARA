<?php 

namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\remindModel;
 
class ngeditreminder extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        //$model = new klienModel();
        $db = \Config\Database::connect();
        $request = \Config\Services::request();
        $noinv = $request->getVar('noinvoice');
        $queryy   = $db->query('SELECT due_date FROM remainder WHERE no_invoice="'.$noinv.'"');
        $resultss = $queryy->getResult();
             $model = new remindModel();
             $no = $model->select('no')->where('no_invoice', $noinv)->first();
            //  $data = array(
            //     //'no'                      => $no,
            //     'due_date'                => $this->request->getPost('date'),
            // );
        
        $model->update($no, [  'due_date'  => $this->request->getPost('tgl'), ]);       
        
        return redirect()->to('/form_remainder');
    }
}