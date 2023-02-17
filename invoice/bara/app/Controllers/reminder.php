<?php

namespace App\Controllers;

class reminder extends BaseController
{
    public function index()
    {
        return view('form_pengingat');
    }
}
