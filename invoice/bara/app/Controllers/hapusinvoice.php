<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\detailtagihan;
use App\Models\tagihan;

class hapusinvoice extends Controller
{
    public function index()
    {
                        $id = $this->request->getPost('id');
                        $tagihan = new tagihan();
                        $detail = new detailtagihan();
                        $no = $detail->select('no')->where('id_tagihan', $id)->first();
                        $detail->update($no, ['status' => 2]);
                        $tagihan->update($id, ['status' => 2]);
                        return redirect('datainvoice');
    }
}