<?php

namespace App\Controllers;
use App\Models\UsersModel;
use Firebase\JWT\JWT;

class Users extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    
    public function index(){
        return view('admin/index');
    }
    public function register()
    {
        if(!session()->get('logged_in')){
            return "<div style='text-align: center;'>".
                        "<img class='gambar' src='assets/img/bara.png'>".
                        "<h1 style='border-top: 1px solid black; padding-top: 30px;'>".'403 Forbidden'."</h1>"
                        ."<a href='home'>".
                            "Go to Homepage"
                        ."</a>"
                   ."</div>";
        }else{
            echo view('admin/register');
        }
    }
    public function tambah()
    {   
        $model = new UsersModel();
        helper(['form']);
        $session = session();
        $rules = [
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[6]',
        ];
        if(!$this->validate($rules)) {
            $session->setFlashdata('msg', 'Username must contain a unique value and Password must be at least 6 characters in length.');
            return redirect()->to('/register');
        }
        $password = $this->request->getVar('password');
        $pw = openssl_encrypt($password, "aes-256-cbc", "https://bara.co.id/", 0, md5("RaihanMP","GumelarGR"));
        $key = getenv('TOKEN_SECRET');
        $payload = array(
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "uid" => $this->request->getVar('username'),
            "password" => $pw
        );
        $token = base64_encode(JWT::encode($payload, $key, 'HS256'));
        $data = [
            'id'           => '',
            'nama'         => $this->request->getVar('nama'),
            'notelepon'    => $this->request->getVar('notelepon'),
            'email'        => $this->request->getVar('email'),
            'username'     => $this->request->getVar('username'),
            'password'     => $token,
            'role'         => $this->request->getVar('role')
        ];
        $save = $model->insert($data);
        if($save){
            $session->setFlashdata('msg', 'Registration Successful !');
            return redirect()->to('/register');
        }
    }
    public function profil(){
        return view('admin/pages/reset');
    }
    public function edit(){
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
    public function ngedit(){
        helper(['form']);
        $session = session();
        $model = new UsersModel();
        $id = $this->request->getVar('id');
        $password = $this->request->getVar('password');
        $pw = openssl_encrypt($password, "aes-256-cbc", "https://bara.co.id/", 0, md5("RaihanMP","GumelarGR"));
        $key = getenv('TOKEN_SECRET');
        $payload = array(
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "uid" => $this->request->getVar('username'),
            "password" => $pw
        );
        $token = base64_encode(JWT::encode($payload, $key, 'HS256'));
        $save = $model->update($id, [
            'nama'         => $this->request->getVar('nama'),
            'notelepon'    => $this->request->getVar('notelepon'),
            'email'        => $this->request->getVar('email'),
            'username'     => $this->request->getVar('username'),
            'password'     => $token,
        ]);
        if($save){
            //$session = session();
            $log = $session->get('role');
            if($log == "ADMIN"){
                $session->setFlashdata('msg', 'Edit User Successful !');
                return redirect()->to('/datauser');
            }else{
                $session->setFlashdata('msg', 'Edit User Successful !');
                return redirect()->to('/reset');
            }
           
        }
    }
    public function ubah(){
        if(! session()->get('logged_in')){
            return "<div style='text-align: center;'>".
                        "<h1 style='border-bottom: 1px solid black;'>".'403 Forbidden'."</h1>"
                        ."<a href='home'>".
                            "Go to Homepage"
                        ."</a>"
                   ."</div>";
        }else{
            return view('admin/pages/ganti_pass');
        }
    }
    public function hapus(){
        $model = new UsersModel();
        $id = $this->request->getPost('id');
        $model->delete($id);
        $session = session();
        $session->setFlashdata('msg', 'Pelamar Berhasil Dihapus !');
        return redirect()->to('/datauser');
    }
    public function login(){
        $session = session();
        $model = new UsersModel();
        $user = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $pw = openssl_encrypt($password, "aes-256-cbc", "https://bara.co.id/", 0, md5("RaihanMP","GumelarGR"));
        $data = $model->where('username', $user)->first();
        $key = getenv('TOKEN_SECRET');
        $payload = array(
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "uid" => $user,
            "password" => $pw
        );
        $token = JWT::encode($payload, $key, 'HS256');
        if($data){
            $pass = base64_decode($data['password']);
            if($pass == $token){
                $ses_data = [
                    'role'          => $data['role'],
                    'username'      => $data['username'],
                    'nama'          => $data['nama'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/datapelamar');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/admin');
            }
        }else{
            $session->setFlashdata('msg', 'Username not Found');
            return redirect()->to('/admin');
        }
    }
    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/admin');
    }
    public function view(){
        $pager = \Config\Services::pager();
        $model = new UsersModel();
        $db = \Config\Database::connect();
        $kunci = $this->request->getVar('cari');

        if ($kunci!="") {
            $query = $model->pencarian($kunci);
            $hasil = "Pencarian dengan nama <B>$kunci</B> ditemukan ".$query->affectedRows()." Data";
        } else {
            $query = $model;
            $hasil = "";
        }

        $data['user'] = $model->paginate(5);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['hasil'] = $hasil;
        if(! session()->get('logged_in')){
            return "<div style='text-align: center;'>".
                        "<h1 style='border-bottom: 1px solid black;'>".'403 Forbidden'."</h1>"
                        ."<a href='home'>".
                            "Go to Homepage"
                        ."</a>"
                   ."</div>";
        }else{
            echo view('admin/pages/datauser',$data);
        }
    }
}