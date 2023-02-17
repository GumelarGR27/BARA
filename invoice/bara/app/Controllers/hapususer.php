<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class hapususer extends Controller
{
    public function index()
    {
                        $id = $this->request->getPost('id');
                        $reminder = new UserModel();
                        $no = $reminder->select('id_user')->where('email', $id)->first();
                        $reminder->where('id_user', $no)->delete();
                        return redirect('datausers');
}
}