<?php
    $db = \Config\Database::connect();
    $request = \Config\Services::request();
    
    $kueri   = $db->query('SELECT * FROM users WHERE id_users = "'.$request->getVar('id').'"');
    $result    = $kueri->getResult();
    foreach ($result as $row) {
        $nama = $row->nama;
        $telp = $row->notelepon;
        $user = $row->username;
        $pass = $row->password;
        $email = $row->email;
    }
    $pw = base64_decode($pass); 
    $pas = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $pw)[1]))));
    $pasw = (array) $pas;
    $password = openssl_decrypt($pasw['password'], "aes-256-cbc", "https://bara.co.id/", 0, md5("RaihanMP","GumelarGR"));
    $session = session();
    $role = $session->get('role');
    $nama = $session->get('nama');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Bara Enterprise</title>
        <link rel="shortcut icon" href="https://bara.co.id/assets/images/icon_bara.png" type="image/x-icon">
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('assets/css/metisMenu.min.css'); ?>" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo base_url('assets/css/timeline.css'); ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/css/startmin.css'); ?>" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url('assets/css/morris.css'); ?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <script src="https://kit.fontawesome.com/ca21bdd1c1.js" crossorigin="anonymous"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            form{
                width: 50%;
                margin-left: 25%;
                margin-top: 3%;
                margin-bottom: 10%;
                border: 2px lightgray solid;
                border-radius: 10px;
                padding: 5px 15px 15px 15px;  
                box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.2), 0 4px 18px 0 rgba(0, 0, 0, 0.19);              
            }
            .button{
                background-color: black;
                width: 90%;
                height: 40px;
                color: white;
                margin-left: 5%;
            }
            .sidebar{
                background-color: #222 !important;
            }
            #saidbar{
                height: 1000px;
                background-color: #222;
            }
            .a{
                color: white !important;
            }
            a.a:hover{
                color: #222 !important;
            }
            .active{
                color: #222 !important;
            }
            a:hover{
                color: #337ab7 !important;
            }
            .logout{
                background-color: #222 !important; 
                color: white !important;
            }
            a.logout:hover{
                background-color: #eee !important; 
                color: #222 !important;
            }
            .card-body{
                padding: 15px;
            }
        </style>
        
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div style="color:white; font-size: 13pt; float:left; width: 80%; padding-top: 15px; font-weight: 600; padding-left: 15px;">Kelola Lamaran Kerja</div>
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="color:white; float: left;"></a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $nama." (".$role.")"; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <?php
                                if($role == "ADMIN"){
                                    echo "<li>";
                                        echo '<a href="datauser"><i class="fas fa-users"  style="margin-right: 7px; margin-left: 2px;"></i> Data Users</a>';
                                    echo "</li>";
                                }
                            ?>
                            <li>
                                <a href="<?php echo base_url('/userprofil'); ?>" ><i class="fa fa-user fa-fw"  style="margin-right: 9px; margin-left: 1px;"></i> User Profile</a>
                            </li>
                            <li>
                                <a href="" data-toggle="modal" data-target="#myModal"><i class="fa-solid fa-arrow-right-from-bracket"  style="margin-right: 9px; margin-left: 4px;"></i> Keluar</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                
                <!-- /.navbar-top-links -->
                
                <div class="navbar-default sidebar" role="navigation" id="saidbar">
                    <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                            <li>
                                <a href="<?php echo base_url('/datapelamar'); ?>" class="a active"><i class="fa fa-light fa-folder-open" style="margin-right: 5px; margin-left: 2px;"></i> Data Pelamar</a>
                            </li>
                            <li>
                                <a href=<?php echo base_url('/interview'); ?> class="a"><i class="fa fad fa-hourglass-half" style="margin-right: 11px; margin-left: 2px;"></i> Interview</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('/diterima'); ?>" class="a"><i class="far fa-check-circle" style="margin-right: 9px; margin-left: 1px;"></i> Diterima</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('/ditolak'); ?>" class="a"><i class="fa-solid fa-circle-xmark" style="margin-right: 9px; margin-left: 2px;" ></i> Ditolak</a>
                            </li>
                            <li>
                                <a href=<?php echo base_url('/kelola'); ?> class="a"><i class="fa fa-edit fa-fw"  style="margin-right: 7px; margin-left: 1px;"></i> Kelola Lowongan</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Keluar</h4>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin keluar ?</p>
                        </div>
                        <div class="modal-footer">
                            <a href="<?php echo base_url('/admin'); ?>" class="btn btn-default y">Ya</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>
                    <!-- form -->
                    
                    <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                        <h1 style="margin-left:35%; padding-top:3%;">Edit Profil</h1>
                            <h1 class="page-header"style="margin-top:2% !important;"></h1>
                           
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    
                    <!-- form -->
                    <form action="<?php echo base_url('ngedit'); ?>" method="post">
                    <div class="card-body">
                    <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $request->getGet('id'); ?>">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Lengkap" value="<?php echo $nama; ?>" name="nama">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Username" value="<?php echo $user; ?>" name="username">
                    </div>
                    <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" class="form-control" id="pw" placeholder="Masukkan Password" value="<?php $password; ?>" name="password">
                    </div> -->
                    <div class="form-group">
                    <label for="exampleInputPassword1">Nomor Telepon</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Notelepon Baru" value="<?php echo $telp; ?>" name="notelepon">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Email Baru" value="<?php echo $email; ?>" name="email">
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="button">Simpan</button>
                    </div>
                    <div class="card-footer">
                    <a href="<?php echo base_url('ubah-password?user='.$user); ?>"><button type="button" class="button" style="margin-top:10px;">Edit Password</button></a>
                    </div>
                    </form>
                </div>
                </div>
            </div>        
    </div>
    </body>
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</html>
