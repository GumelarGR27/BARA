<?php 

namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\tagihan;
use App\Models\detailtagihan;
use App\ThirdParty\mpdf;
 
class tagihann extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $db = \Config\Database::connect();
        $bln = date("m");
            if($bln == "01"){
                $bln = "I";
            }if($bln == "02"){
                $bln = "II";
            }if($bln == "03"){
                $bln = "III";
            }if($bln == "04"){
                $bln = "IV";
            }if($bln == "05"){
                $bln = "V";
            }if($bln == "06"){
                $bln = "VI";
            }if($bln == "07"){
                $bln = "VII";
            }if($bln == "08"){
                $bln = "VIII";
            }if($bln == "09"){
                $bln = "IX";
            }if($bln == "10"){
                $bln = "X";
            }if($bln == "11"){
                $bln = "XI";
            }if($bln == "12"){
                $bln = "XII";
            }
        $query   = $db->query('SELECT * FROM tagihan');
        $results = $query->getResult();
        foreach ($results as $row) {
                $noin = $row->no_invoice;
             }
        if($results == null){
            $noinv = "001/"."BE-INV/".date("d")."-".$bln."/".date("Y");
        }else{
             $angka  = intval(substr($noin,2));
             $int    = $angka+1;
             if(substr($noin, -4) > date("Y")){
                $noinv = "001/"."BE-INV/".date("d")."-".$bln."/".date("Y");
             }else{
                $noinv   = "00".$int."/BE-INV/".date("d")."-".$bln."/".date("Y");
             }
        }

        //$unit = $this->request->getPost('unit');
        // $queryy   = $db->query('SELECT * FROM unit WHERE nama_unit="'.$unit.'"');
        // $resultss = $queryy->getResult();

        //     foreach ($resultss as $roww) {
        //         $harga = $roww->harga;
        //      }
         
        
        $model = new tagihan();
        $detail = new detailtagihan();
        //if(count($this->request->getPost('unit')) >= 1){
            // for($i=0; $i >= count($this->request->getPost('unit')); $i++){
            //     $int = (int) filter_var($this->request->getPost('nominal')[$i], FILTER_SANITIZE_NUMBER_INT);
            //     $total = $int * $this->request->getPost('qty')[$i];
                $data = array(
                    'id_tagihan'              => "",
                    'no_invoice'              => $noinv,
                    'nama_perusahaan'         => $this->request->getPost('nama'),
                    // 'unit'                    => $this->request->getPost('unit')[$i],
                    // 'deskripsi'               => $this->request->getPost('desk')[$i],
                    // 'quantity'                => $this->request->getPost('qty')[$i],
                    'tanggal_invoice'         => date("Y-m-d"),
                    'status'                  => 1,
                    // 'total'                   => $total,
                    //'pdf'                     => "oisanfjdsnn",
                );
                $model->insert($data);
            //}
        //}
        $id = $model->select('id_tagihan')->orderBy('id_tagihan', 'DESC')->first();
        $unit = $this->request->getPost('unit') ;
        $desk = $this->request->getPost('desk');
      for($i=0; $i < count($unit); $i++){
        $qty = (int) filter_var($this->request->getPost('qty')[$i], FILTER_SANITIZE_NUMBER_INT);
        $harga = (int) filter_var($this->request->getPost('nominal')[$i], FILTER_SANITIZE_NUMBER_INT);
        //preg_match_all('!\d+!', implode($this->request->getPost('nominal')), $harga);
        $total =  $harga * $qty;
        $ditel = array(
                'no'            => '',
                'id_tagihan'    => $id,
                'unit'          => $unit[$i],
                'deskripsi'     => $desk[$i],
                'quantity'      => $this->request->getPost('qty')[$i],
                'nama_perusahaan'      => $this->request->getPost('nama'),
                'total'         => $total,
                'status'        => 1,
        );
        $detail->insert($ditel);
        }  
        return redirect()->to('/datainvoice');
    }
}