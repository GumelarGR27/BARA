<?php

namespace App\Controllers;

class file_reminder extends BaseController
{
    public function index()
    {
        if(! session()->get('logged_in')){
            echo view('user_login');
        }else{
            echo view('file_reminder');
        }
    }
}
