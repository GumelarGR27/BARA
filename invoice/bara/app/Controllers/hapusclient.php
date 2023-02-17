<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\klienModel;
use App\Models\tagihan;
use App\Models\remindModel;

class hapusclient extends Controller
{
    public function index(){
                        $id = $this->request->getPost('id');
                        $model = new klienModel();
                        $noklien = $model->select('no')->where('id_klien', $id)->first();
                        $model->update($noklien, ['status', 2]);
                        return redirect('daftar');
    }
}