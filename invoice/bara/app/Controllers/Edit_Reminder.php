<?php

namespace App\Controllers;

class Edit_Reminder extends BaseController
{
    public function index()
    {
        if(! session()->get('logged_in')){
            echo view('user_login');
        }else{
            echo view('Edit_Reminder');
        }
    }
}
