<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LamarModel;

class hapus extends Controller{

    public function hapus(){
            $model = new LamarModel();
            $id = $this->request->getPost('id');
            $model->delete($id);
            $session = session();
            $session->setFlashdata('msg', 'Pelamar Berhasil Dihapus !');
            return redirect()->to('/web');
    }

}