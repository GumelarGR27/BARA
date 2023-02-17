<?php

namespace App\Controllers;
use App\Models\pelamarModel;
use App\Models\dokumen;
use App\Models\magangModel;
use App\Models\PortoModel;
use App\Models\DivisiModel;
use App\Models\logModel;
use CodeIgniter\Files\File;

class Pelamar extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    
    public function index(){
        $model = new pelamarModel();
        $kunci = $this->request->getPost('cari');
        $dipisi = $this->request->getPost('divisi');

        if ($kunci!="") {
            $query = $model->pencarian($kunci);
            $hasil = "Pencarian dengan nama <B>$kunci</B> ditemukan ".$query->affectedRows()." Data";
        } else if ($dipisi!="") {
            $query = $model->nyari($dipisi);
            $hasil = "Pencarian dengan divisi <B>$dipisi</B> ditemukan ".$query->affectedRows()." Data";
        } else {
            $query = $model;
            $hasil = "";
        }

        $data['pelamar'] = $model->where('status',  'Belum Interview')->where('jenis',  'Karyawan')->paginate(5);
        $data['magang'] = $model->where('status',  'Belum Interview')->where('jenis',  'Magang')->paginate(5);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['hasil'] = $hasil;

        if(! session()->get('logged_in')){
            return "<div style='text-align: center;'>".
                        "<img class='gambar' src='assets/img/bara.png'>".
                        "<h1 style='border-top: 1px solid black; padding-top: 30px;'>".'403 Forbidden'."</h1>"
                        ."<a href='home'>".
                            "Go to Homepage"
                        ."</a>"
                   ."</div>";
        }else{
            echo view('admin/pages/index',$data);
        }
    }
    public function lamar()
    {
        $difisi = new DivisiModel();
        $model = new pelamarModel();
        $modell = new dokumen();
        $modelll = new PortoModel();
             $divisi = $difisi->select('id_divisi')->where('Nama',$this->request->getPost('divisi'))->first();
             $file = $this->request->getFile('cv');
             $fileName = $file->getName();
             $fileijz = $this->request->getFile('ijazah');
             $ijazah = $fileijz->getName();
             $belum = "Belum Interview";
             $baru = rand();
             $data = array(
                 'id_pelamar'        => $baru,
                 'nama'              => $this->request->getPost('nama'),
                 'email'             => $this->request->getPost('email'),
                 'deskripsi'         => $this->request->getPost('desk'),
                 'id_divisi'         => $divisi,
                 'jenis'             => $this->request->getPost('jenis'),
                 'status'            => $belum,
                 'upload'            => date('d-m-Y'),
             );
             $model->insert($data);
             if($this->request->getPost('jenis') == "Magang"){
                $magang = new magangModel();
                $datamagang = array(
                    'id_magang'         => "",
                    'id_pelamar'        => $baru,
                    'durasi'            => $this->request->getPost('mulai')." - ".$this->request->getPost('akhir'),
                );
                $magang->insert($datamagang);
             }
             $datacv = array(
                'id_dokumen'        => "",
                'id_pelamar'        => $baru,
                'ijazah'            => $ijazah,
                'cv'                => $fileName,
            );
             $modell->insert($datacv);
             $dataporto = array(
                'no'        => "",
                'id_pelamar'      => $baru,
                'porto'           => $this->request->getPost('porto'),
            );
             $done = $modelll->insert($dataporto);
             $file->move(WRITEPATH . '../public/uploads', $fileName);
             $message = $this->request->getPost('nama')." dengan email ".$this->request->getPost('email')." mengirim lamaran untuk divisi ".$this->request->getPost('divisi');
             $email = \Config\Services::email();
             $email->setFrom('apply@bara.co.id', 'Admin Bara');
             $email->setTo('admin@bara.co.id');
             $email->setSubject('Pelamar Baru');
             $email->setMessage($message);
             $email->send();
             if($done){
            //     echo "<script>";
            //        echo "alert('Lamaran Terkirim !')";
            //     echo "</script>";
            //     return redirect()->route('/');
            echo '<script type="text/javascript">
                    alert("Lamaran Terkirim !");
                    window.location.href = "'.$_SERVER['HTTP_REFERER'].'"; ; 
                  </script>';
             }
             //return redirect()->to('/#form');
             

        // }
    }
    public function view(){
        if(! session()->get('logged_in')){
            return "<div style='text-align: center;'>".
                        "<img class='gambar' src='assets/img/bara.png'>".
                        "<h1 style='border-top: 1px solid black; padding-top: 30px;'>".'403 Forbidden'."</h1>"
                        ."<a href='home'>".
                            "Go to Homepage"
                        ."</a>"
                   ."</div>";
        }else{
            return view('admin/pages/cv');
        }
    }
    public function kirimemail(){
        //$model = new pelamarModel();
        $id = $this->request->getVar('id');
        $status = [
            'status' => 'Sedang Interview',
        ];
        $model->update($id, $status);
        $user = $request->getVar('nama');
        $model = new pelamarModel();
        $modell = new logModel();
        $imel = $model->select('email')->where('id_pelamar', $id)->first();
        $nama = $model->select('nama')->where('id_pelamar', $id)->first();
        //var_dump($nama);die();
        $data = [
            'id'            =>  '',
            'id_users'      =>  $id,
            'keterangan'    =>  "Pelamar dengan nama ".$nama['nama']." diterima oleh ".$user,
            'tanggal'       => date('d-m-Y'),
        ];
        $modell->insert($data);
        $session = session();
        $message = "Halo ".$nama['nama'].", lamaran kerja yang anda kirim sudah kami terima dan berdasarkan hasil review, kami memutuskan untuk mengundang saudara ".$nama['nama']." untuk melaksanakan proses wawancara dan tes keahlian. Untuk informasi waktu dan tempat, silahkan hubungi kami di 0816-593-922. Terima Kasih.";
        $email = \Config\Services::email();
        $email->setFrom('admin@bara.co.id', 'Admin Bara');
        $email->setTo($imel);
        $email->setSubject('Panggilan Interview');
        $email->setMessage($message);
        $email->send();
        $email->printDebugger(['headers']);
        if(! session()->get('logged_in')){
            return "<div style='text-align: center;'>".
                        "<img class='gambar' src='assets/img/bara.png'>".
                        "<h1 style='border-top: 1px solid black; padding-top: 30px;'>".'403 Forbidden'."</h1>"
                        ."<a href='home'>".
                            "Go to Homepage"
                        ."</a>"
                   ."</div>";
        }else{
            $session->setFlashdata('msg', 'Email Interview Terkirim !');
            return redirect()->to('interview');
        }
     }
    public function interview(){
        $model = new pelamarModel();

        $kunci = $this->request->getPost('cari');
        $dipisi = $this->request->getPost('divisi');

        if ($kunci!="") {
            $query = $model->pencarian($kunci);
            $hasil = "Pencarian dengan nama <B>$kunci</B> ditemukan ".$query->affectedRows()." Data";
        } else if ($dipisi!="") {
            $query = $model->nyari($dipisi);
            $hasil = "Pencarian dengan divisi <B>$dipisi</B> ditemukan ".$query->affectedRows()." Data";
        } else {
            $query = $model;
            $hasil = "";
        }
        $data['pelamar'] = $model->where('status',  'Sedang Interview')->paginate(5);
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
            echo view('admin/pages/interview',$data);
        }
    }
    public function acc(){
        $db = \Config\Database::connect();
        $request = \Config\Services::request();
        $id = $request->getVar('id');
        $user = $request->getVar('nama');
        $model = new pelamarModel();
        $modell = new logModel();
        $imel = $model->select('email')->where('id_pelamar', $id)->first();
        $nama = $model->select('nama')->where('id_pelamar', $id)->first();
        //var_dump($user);die();
        //$session = session();
        $message = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit odit nesciunt magni hic eveniet ex voluptatum accusamus eum temporibus illum! Explicabo quis odio nobis nam, ea mollitia reiciendis excepturi quaerat!";
        $email = \Config\Services::email();
        $email->setFrom('admin@bara.co.id', 'Admin Bara');
        $email->setTo($imel);
        $email->setSubject('Panggilan Interview');
        $email->setMessage($message);
        $email->send();
        $email->printDebugger(['headers']);
        $model->update($id, [
            'status'            => "Diterima"
        ]);
        $session = session();
        $data = [
            'id'            =>  '',
            'id_users'      =>  $id,
            'keterangan'    =>  "Pelamar dengan nama ".$nama['nama']." diterima oleh ".$user,
            'tanggal'       => date('d-m-Y'),
        ];
        $modell->insert($data);
        if(!session()->get('logged_in')){
            return "<div style='text-align: center;'>".
                        "<h1 style='border-bottom: 1px solid black;'>".'403 Forbidden'."</h1>"
                        ."<a href='home'>".
                            "Go to Homepage"
                        ."</a>"
                ."</div>";
        }else{
            $session->setFlashdata('msg', 'Pelamar Berhasil Diterima !');
            return redirect()->to('diterima');
        }
    }
    public function diterima(){
        $model = new pelamarModel();
        $pager = \Config\Services::pager();
        $kunci = $this->request->getPost('cari');
        $dipisi = $this->request->getPost('divisi');
        
        if ($kunci!="") {
            $query = $model->pencarian($kunci);
            $hasil = "Pencarian dengan nama <B>$kunci</B> ditemukan ".$query->affectedRows()." Data";
        } else if ($dipisi!="") {
            $query = $model->nyari($dipisi);
            $hasil = "Pencarian dengan divisi <B>$dipisi</B> ditemukan ".$query->affectedRows()." Data";
        } else {
            $query = $model;
            $hasil = "";
        }

        $data['pelamar'] = $model->where('status',  'Diterima')->paginate(5);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['hasil'] = $hasil;
        return view('admin/pages/diterima', $data);
    }
    public function tolak(){
        // $model = new pelamarModel();
        // $id = $this->request->getPost('id');
        $model = new pelamarModel();
        $id = $this->request->getVar('id');
        $user = $request->getVar('nama');
        //$model = new pelamarModel();
        $modell = new logModel();
        $imel = $model->select('email')->where('id_pelamar', $id)->first();
        $nama = $model->select('nama')->where('id_pelamar', $id)->first();
        
        //$session = session();
        $sub = $this->request->getVar('sub');
        $isi = $this->request->getVar('isi');
        //var_dump($sub);die();
        //$message = "Terima kasih atas ketertarikan Anda untuk melamar di perusahaan kami. Saat ini kami sedang mencari kandidat dengan pengalaman dan keterampilan yang tepat untuk posisi tersebut.";
        if($sub == null){
            $sub = "Tidak Lolos Interview";
        }if($isi == null){
            $isi = "Terima kasih atas ketertarikan Anda untuk melamar di perusahaan kami. Saat ini kami sedang mencari kandidat dengan pengalaman dan keterampilan yang tepat untuk posisi tersebut.";
        }
        $email = \Config\Services::email();
        $email->setFrom('admin@bara.co.id', 'Admin Bara');
        $email->setTo($imel);
        $email->setSubject(''.$sub);
        $email->setMessage(''.$isi);
        $email->send();
        $email->printDebugger(['headers']);
        $model->update($id, [
            'status'            => "Ditolak"
         ]);
         $data = [
            'id'            =>  '',
            'id_users'      =>  $id,
            'keterangan'    =>  "Pelamar dengan nama ".$nama['nama']." ditolak oleh ".$user,
            'tanggal'       => date('d-m-Y'),
        ];
        $modell->insert($data);
        $session = session();
        $session->setFlashdata('msg', 'Pelamar Berhasil Ditolak !');
        return redirect()->to('/ditolak');
        $model->update($id, [
            'status'            => "Ditolak"
         ]);
        $session = session();
        $session->setFlashdata('msg', 'Pelamar Berhasil Ditolak !');
        return redirect()->to('/ditolak');
    }
    public function ditolak(){
        $model = new pelamarModel();
        $pager = \Config\Services::pager();
        $kunci = $this->request->getPost('cari');
        $dipisi = $this->request->getPost('divisi');
        
        if ($kunci!="") {
            $query = $model->pencarian($kunci);
            $hasil = "Pencarian dengan nama <B>$kunci</B> ditemukan ".$query->affectedRows()." Data";
        } else if ($dipisi!="") {
            $query = $model->nyari($dipisi);
            $hasil = "Pencarian dengan divisi <B>$dipisi</B> ditemukan ".$query->affectedRows()." Data";
        } else {
            $query = $model;
            $hasil = "";
        }

        $data['pelamar'] = $model->where('status',  'Ditolak')->paginate(5);
        $data['pager'] = $model->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['hasil'] = $hasil;
        return view('admin/pages/ditolak', $data);
    }
    public function hapus(){
        $model = new pelamarModel();
        $cv = new CVModel();
        $porto = new PortoModel();
        $magang = new magangModel();
        $id = $this->request->getPost('id');
        $idcv = $cv->select('no')->where('id_pelamar', $id)->first();
        $idporto = $porto->select('no')->where('id_pelamar', $id)->first();
        $idmagang = $magang->select('id_magang')->where('id_pelamar', $id)->first();
        $cv->where("no", $idcv)->delete();
        $porto->where("no", $idporto)->delete();
        $magang->where("id_magang", $idmagang)->delete();
        $model->delete($id);
        $session = session();
        $session->setFlashdata('msg', 'Pelamar Berhasil Dihapus !');
        return redirect()->to('/ditolak');
    }
}