<?php

namespace App\Controllers;
use App\Models\detailtagihan;

class pail extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    
    public function index()
    {
        $pager = \Config\Services::pager();
        $detail = new detailtagihan();
        $data['tagihan'] = $detail->orderBy('id_tagihan','DESC')->where('nama_perusahaan', $this->request->getVar('nama'))->paginate(5);
        $data['pager'] = $detail->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        if($data['tagihan'] != null){
            echo view('view_file', $data);
        }else{
            echo "<center><h1>Belum ada invoice</h1>
            <a href='daftar'>Back</a></center>";
        }
        
        //return view('admin/pages/index');
    }
}