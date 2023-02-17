<?php 

namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\tagihan;
use App\Models\detailtagihan;
use App\ThirdParty\mpdf;
 
class ngeditinv extends BaseController
{
    protected $helpers = ['form'];
    public function index(){
        $detail = new detailtagihan();
        $model = new tagihan();
        $idtag = $model->select('id_tagihan')->where('no_invoice', $this->request->getVar('noinv'))->first();
        $no = $detail->select('no')->where('id_tagihan', $idtag)->first();
        $tot = $detail->select('total')->where('id_tagihan', $idtag)->first();
        $kiteye = $detail->select('quantity')->where('id_tagihan', $idtag)->first();
        //var_dump($tot);die();
        $unit = $this->request->getPost('unit') ;
        $desk = $this->request->getPost('desk');
      for($i=0; $i < count($unit); $i++){
        $qty = (int) filter_var($this->request->getPost('qty')[$i], FILTER_SANITIZE_NUMBER_INT);
        $totallama =  $tot['total'] / $kiteye['quantity'];
        $total = $totallama * $qty;
        $detail->update($no, [
                'unit'          => $unit[$i],
                'deskripsi'     => $desk[$i],
                'quantity'      => $qty,
                'total'         => $total,
            ]);
        }  
        return redirect()->to('/datainvoice');
    }
}