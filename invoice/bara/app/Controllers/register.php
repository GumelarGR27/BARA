<?php

namespace App\Controllers;
use App\Models\UserModel;

class register extends BaseController
{
    public function index()
    {
        return view('user_register');
    }
    public function tambah(){
        $model = new UserModel();
        helper(['form']);
        $session = session();
        $encrypter = \Config\Services::encrypter();
        $rules = [
            'email' => 'required|is_unique[user.email]',
            'password' => 'required|min_length[6]',
        ];
        if(!$this->validate($rules)) {
            $session->setFlashdata('msg', 'Username must contain a unique value and Password must be at least 6 characters in length.');
            return redirect()->to('/register');
        }
        $password = $this->request->getVar('password');
        $data = [
            'id_user'      => '',
            'nama'         => $this->request->getVar('nama'),
            'email'        => $this->request->getVar('email'),
            'password'     => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'telepon'      => $this->request->getVar('telepon'),
            'jabatan'      => $this->request->getVar('jabatan'),
        ];
        $save = $model->save($data);
        if($save){
            $session->setFlashdata('msg', 'Registration Successful !');
            return redirect()->to('/login');
        }
    }
}
