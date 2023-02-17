<?php 

namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\remindModel;
 
class Remind extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT * FROM remainder');
        $results = $query->getResult();
        
        if($results == null){
            $baru = "RINV1";
        }else{
            foreach ($results as $row) {
                $idrem = $row->id_remainder;
             }
             $angka  = intval(substr($idrem, 4));
             $int    = $angka+1;
             $baru   = "RINV".$int;
        }

        //$nama = $this->request->getPost('company');
        // $queryy   = $db->query('SELECT * FROM tagihan WHERE nama_perusahaan="'.$this->request->getPost('nama').'"');
        // $resultss = $queryy->getResult();

        //     foreach ($resultss as $roww) {
        //         $noinv = $roww->no_invoice;
        //      }
        $tag = $db->query('SELECT * FROM tagihan WHERE no_invoice="'.$this->request->getPost('noinvoice').'"');
        $get = $tag->getResult();
        foreach ($get as $gett) {
                $name = $gett->nama_perusahaan;
             }
        $queryyy   = $db->query('SELECT * FROM client WHERE nama_perusahaan="'.$name.'"');
        $resultsss = $queryyy->getResult();

            foreach ($resultsss as $rowww) {
                $idkel = $rowww->id_klien;
             }

        $model = new remindModel();
        $data = array(
            'no'                          => '',
            'id_remainder'                => $baru,
            'no_invoice'                  => $this->request->getPost('noinvoice'),
            'id_klien'                    => $idkel,
            'due_date'                    => $this->request->getPost('tgl'),
            'status'                      => 1,
            );
        $model->save($data);
        return redirect()->to('/form_remainder');
    }
}