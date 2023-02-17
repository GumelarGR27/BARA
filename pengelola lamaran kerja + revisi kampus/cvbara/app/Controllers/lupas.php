<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use Firebase\JWT\JWT;
use App\Models\UsersModel;

class lupas extends Controller{

    public function index(){
            echo view('admin/pages/lupas');
    }
    public function ubah(){
        $password = $this->request->getVar('lama');
        $baru = $this->request->getVar('baru');
        $konf = $this->request->getVar('konf');
        $user = $this->request->getVar('user');
        // var_dump($user);die();
        $pw = openssl_encrypt($password, "aes-256-cbc", "https://bara.co.id/", 0, md5("RaihanMP","GumelarGR"));
        $key = getenv('TOKEN_SECRET');
        $payload = array(
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "uid" => $user,
            "password" => $pw
        );
        $token = base64_encode(JWT::encode($payload, $key, 'HS256'));
        $open = openssl_encrypt($baru, "aes-256-cbc", "https://bara.co.id/", 0, md5("RaihanMP","GumelarGR"));
        $pay = array(
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "uid" => $user,
            "password" => $open
        );
        $base = base64_encode(JWT::encode($pay, $key, 'HS256'));
        $model = new UsersModel();
        $session = session();
        $pas = $model->select('password')->where('username', $user)->first();
        //var_dump($pas['password']);die();
        $id = $model->select('id_users')->where('username', $user)->first();
        $nama = $model->select('nama')->where('username', $user)->first();
        $nom = $model->select('notelepon')->where('username', $user)->first();
        $email = $model->select('email')->where('username', $user)->first();
        $role = $model->select('role')->where('username', $user)->first();
        if($token != $pas['password']){
            $session->setFlashdata('msg', 'Password lama salah');
            return view('admin/pages/ganti_pass');
        }if($baru != $konf){
            $session->setFlashdata('msg', 'Password tidak sama');
            return view('admin/pages/ganti_pass');
        }else{
            // $data = [
            //     "id_users" => $id,
            //     "nama"     => $nama,
            //     "notelepon" => $nom,
            //     "email"     => $email,
            //     "username" => $user,
            //     "password" => $base,
            //     "role"     => $role,
            // ];
            $model->update($id, ["password" => $base]);
            $session->setFlashdata('msg', 'Password berhasil diganti');
            return view('admin/pages/ganti_pass');
        }
    }
}