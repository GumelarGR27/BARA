<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\remindModel;

class hapusreminder extends Controller
{
    public function index()
    {
                        $id = $this->request->getPost('id');
                        //var_dump($id);die();
                        $reminder = new remindModel();
                        //$no = $reminder->select('no')->where('id_klien', $id)->first();
                        $reminder->update($id,['status' => 2]);
                        //->where('no', $no)->delete();
                        return redirect('form_remainder');
}
}