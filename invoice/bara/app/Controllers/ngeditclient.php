<?php 

namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\klienModel;

class ngeditclient extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $db = \Config\Database::connect();
        $request = \Config\Services::request();
        $nama = $this->request->getVar('comp');
        $model = new klienModel();
        $id = $model->select('no')->where('nama_perusahaan', $nama)->first();
        // var_dump($nama);die;
        $model->update($id, [
                'nama_perusahaan'         => $this->request->getPost('kompani'),
                'nama'                    => $this->request->getPost('nama'),
                'kota'                    => $this->request->getPost('kota'),
                'telepon'                 => $this->request->getPost('telp'),
                'email'                   => $this->request->getPost('email'),
                'bank'                    => $this->request->getPost('bank'),]);
        
        return redirect()->to('/daftar');
        
    }
}
?>