<?php

namespace App\Controllers;


class Terima extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    
    public function index()
    {
        return view('admin/pages/index');
    }
}