<?php

namespace App\Controllers;
use App\Models\kirimModel;

class kirim extends BaseController
{
    public function pesan(){
        return view('admin/pages/kirimpesan');
    }
}

