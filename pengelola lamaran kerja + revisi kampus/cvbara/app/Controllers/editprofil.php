<?php

namespace App\Controllers;


class editprofil extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    
    public function index()
    {
        // $query   = $db->query('SELECT user FROM user_log');
        // $results = $query->getResult();
        if(! session()->get('logged_in')){
            return "<div style='text-align: center;'>".
                        "<h1 style='border-bottom: 1px solid black;'>".'403 Forbidden'."</h1>"
                        ."<a href='home'>".
                            "Go to Homepage"
                        ."</a>"
                   ."</div>";
        }else{
            return view('admin/pages/editprofil');
        }
        
    }
}