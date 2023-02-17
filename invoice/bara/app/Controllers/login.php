<?php

namespace App\Controllers;
use App\Models\UserModel;

class login extends BaseController
{
    public function index()
    {
        return view('user_login');
    }
    public function login(){
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            //$verify_pass = password_verify($password, $pass);
            if(password_verify($password, $pass)){
                $ses_data = [
                    'email'           => $data['email'],
                    'jabatan'         => $data['jabatan'],
                    'logged_in'       => TRUE
                ];  
                $session->set($ses_data);
                return redirect()->to('/index');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Username not Found');
            return redirect()->to('/login');
        }
    }
}
