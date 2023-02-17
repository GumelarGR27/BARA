<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class lupas extends BaseController
{
    public function index()
    {
                        $id = $this->request->getVar('id');
                        $user = new UserModel();
                        //$no = $reminder->select('password')->where('id_user', $id)->first();
                        //$data = ['password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT)];
                        if($this->request->getPost('password') == $this->request->getPost('konpassword')){
                            $user->update($id, [
                                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                            ]);
                            return redirect('datausers');
                        }else{
                            return redirect('/');
                        }
                        
    }
}