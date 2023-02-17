<?php
    $db = \Config\Database::connect();
    
    $data = $db->table('pelamar');
    $jumlahh = $data->where('id_divisi', 'DIV01');
    $jumlah = $jumlahh->countAllResults();
    $array = array('status' => 'Sedang Interview');
    $sedangg = $data->where($array);
    $sedang = $sedangg->countAllResults();
    $arrayy = array('status' => 'Belum Interview');
    $belumm = $data->where($arrayy);
    $belum = $belumm->countAllResults();
    $total = $sedang + $belum;

    $session = session();
    $log = $session->get('role');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="https://bara.co.id/assets/images/icon_bara.png" type="image/x-icon">
        <title>Admin</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo base_url('assets/jsgrid/jsgrid.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/jsgrid/jsgrid-theme.min.css'); ?>">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/css/startmin.css'); ?>" rel="stylesheet">
        <script src="https://kit.fontawesome.com/ca21bdd1c1.js" crossorigin="anonymous"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .panel{
                border: 0px !important;
                box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2), 0 4px 18px 0 rgba(0, 0, 0, 0.19);
            }
            #side-menu{
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
            #btn{
                border-radius: 0px;
            }
            .panel-heading{
                border: 0px !important; 
                height: 110px;
                background-color: #fff !important;
            }
            .tooltip {
                position: absolute;
                display: inline-block;
                border-bottom: 1px dotted black;
            }
            .logout{
                background-color: #222 !important; 
                color: white !important;
            }
            a.logout:hover{
                background-color: #eee !important; 
                color: #222 !important;
            }
            .tooltip .tooltiptext {
                visibility: hidden;
                width: 120px;
                background-color: #555;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 5px 0;
                position: absolute;
                z-index: 1;
                bottom: 125%;
                left: 50%;
                margin-left: -60px;
                opacity: 0;
                transition: opacity 0.3s;
            }
            .col-xs-9{
                font-size: 13pt;
            }
            .tooltip .tooltiptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #555 transparent transparent transparent;
            }

            .tooltip:hover .tooltiptext {
                visibility: visible;
                opacity: 1;
            }
            .fa fa-user fa-fw{
                color: white !important;
            }
            .dialog-ovelay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.50);
                z-index: 999999
            }
            .dialog-ovelay .dialog {
                width: 400px;
                margin: 100px auto 0;
                background-color: #fff;
                box-shadow: 0 0 20px rgba(0,0,0,.2);
                border-radius: 3px;
                overflow: hidden
            }
            .dialog-ovelay .dialog header {
                padding: 10px 8px;
                background-color: #f6f7f9;
                border-bottom: 1px solid #e5e5e5
            }
            .dialog-ovelay .dialog header h3 {
                font-size: 14px;
                margin: 0;
                color: #555;
                display: inline-block
            }
            .dialog-ovelay .dialog header .fa-close {
                float: right;
                color: #c4c5c7;
                cursor: pointer;
                transition: all .5s ease;
                padding: 0 2px;
                border-radius: 1px    
            }
            .dialog-ovelay .dialog header .fa-close:hover {
                color: #b9b9b9
            }
            .dialog-ovelay .dialog header .fa-close:active {
                box-shadow: 0 0 5px #673AB7;
                color: #a2a2a2
            }
            .dialog-ovelay .dialog .dialog-msg {
                padding: 12px 10px
            }
            .dialog-ovelay .dialog .dialog-msg p{
                margin: 0;
                font-size: 15px;
                color: #333
            }
            .dialog-ovelay .dialog footer {
                border-top: 1px solid #e5e5e5;
                padding: 8px 10px
            }
            .dialog-ovelay .dialog footer .controls {
                direction: rtl
            }
            .dialog-ovelay .dialog footer .controls .button {
                padding: 5px 15px;
                border-radius: 3px
            }
            .button {
            cursor: pointer
            }
            .button-default {
                background-color: rgb(248, 248, 248);
                border: 1px solid rgba(204, 204, 204, 0.5);
                color: #5D5D5D;
            }
            .button-danger {
                background-color: #f44336;
                border: 1px solid #d32f2f;
                color: #f5f5f5
            }
            .link {
            padding: 5px 10px;
            cursor: pointer
            }
            a.y:hover{
                text-decoration: none;
                color: #000 !important;
            }
        </style>
        
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="color:white;"><?php echo $log; ?></a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
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
                            <?php
                                if($log == "ADMIN"){
                                    echo "<li>";
                                        echo '<a href="datauser" class="a"><i class="fas fa-users"  style="margin-right: 7px; margin-left: 2px;"></i> Data Users</a>';
                                    echo "</li>";
                                }
                            ?>
                            <li>
                                <a href="<?php echo base_url('/userprofil'); ?>" class="a"><i class="fa fa-user fa-fw"  style="margin-right: 9px; margin-left: 1px;"></i> User Profile</a>
                            </li>
                            <li>
                                <a href="" class="logout" data-toggle="modal" data-target="#myModal"><i class="fa-solid fa-arrow-right-from-bracket"  style="margin-right: 9px; margin-left: 4px;"></i> Keluar</a>
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
            <a href="<?php echo base_url('/logout'); ?>" class="btn btn-default y">Ya</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        </div>
      </div>
    </div>
  </div>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Pelamar</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                        <img style="width:100px; height: 80px; margin-top: 5px; margin-left: 5px;" src="<?php echo base_url('assets/img/totall.png'); ?>">
                                        </div>
                                        <div class="col-xs-9 text-right" style="color: #337ab7 !important;">
                                            <div>Total Pelamar</div>
                                            <div class="huge" style=""><?php echo $total; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3" style="padding: 0px;">
                                            <img style="width:130px; height: 95px;" src="<?php echo base_url('assets/img/interview.png'); ?>">
                                        </div>
                                        <div class="col-xs-9 text-right" style="color: #f0ad4e;">
                                            <div>Sedang Interview</div>
                                            <div class="huge"><?php echo $sedang; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3" style="padding: 0px;">
                                            <img style="width:150px; height: 95px;" src="<?php echo base_url('assets/img/antri.png'); ?>">
                                        </div>
                                        <div class="col-xs-9 text-right" style="color: #d9534f;">
                                            <div>Belum Interview</div>
                                            <div class="huge"><?php echo $belum; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="width:50% !important; float:left; height: 80px !important;">
                                    <form method="POST" action="<?php echo base_url('caridata'); ?>" class="form-group">
                                    
                                        <select class="form-control" name="divisi" style="width:50%;float:left;margin-top: 10px;" onchange="this.form.submit()">
                                        <option>Pilih Divisi</option>
                                            <?php
                                                $data = $db->table('divisi');
                                                $nama = $data->get();
                                                foreach ($nama->getResult() as $row){
                                                    echo "<option>".$row->Nama."</option>";
                                                }
                                            ?> </a>
                                        </select>
                                            
                                        </div>
                                        <div class="input-group"style="width:50% !important; float:left;">
                                            <div class="form-outline">
                                                <input type="search" name="cari" id="form1" class="form-control" style="width:40%; margin-top: 20px; margin-left: 47%; float:left;"/>
                                            </div>
                                            <button type="Submit" class="btn btn-primary" id="btn" style="margin-top: 20px;">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <?php if(session()->getFlashdata('msg')):?>
                                        <div class="alert alert-success" style="width: 100%; text-align: center; margin-top: 20px; float: left;"><?= session()->getFlashdata('msg') ?></div>
                                    <?php endif;?>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                <div id="result"></div>
                                <table class="table table-bordered" style="width:90%; margin-left:5%;">
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">Divisi</th>
                                        <th style="text-align: center;">Jenis Lamaran</th>
                                        <th style="text-align: center;">Durasi Magang</th>
                                        <th style="text-align: center;">Status</th>
                                        <th colspan="3" style="text-align: center;">Aksi</th>
                                    </tr>
                                    <form method="GET">
                                        <?php
                                            $nomor=1;  
                                            foreach($pelamar as $row):
                                        ?>
                                    <tr>
                                        <td style="text-align: center;"><?=$nomor++;?></td>
                                        <td><?=$row['nama'];?></td>
                                        <td name="email"><?=$row['email'];?></td>
                                        <td>
                                            <?php
                                                $db = \Config\Database::connect();
                                                $kueri  = $db->query('SELECT Nama FROM divisi WHERE id_divisi = "'.$row['id_divisi'].'"');
                                                $dipisi = $kueri->getResult();

                                                foreach ($dipisi as $roww) {
                                                   echo $roww->Nama;
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $db = \Config\Database::connect();
                                                $query   = $db->query('SELECT * FROM pelamar WHERE nama = "'.$row['nama'].'"');
                                                $results = $query->getResult();

                                                foreach ($results as $rowww) {
                                                    echo $jenis = $rowww->jenis;
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $db = \Config\Database::connect();
                                                $query   = $db->query('SELECT * FROM pelamar WHERE nama = "'.$row['nama'].'"');
                                                $results = $query->getResult();

                                                foreach ($results as $rowww) {
                                                    $id = $rowww->id_pelamar;
                                                }
                                                $kueri   = $db->query('SELECT * FROM magang WHERE id_pelamar = "'.$id.'"');
                                                $risult = $kueri->getResult();

                                                foreach ($risult as $hasil) {
                                                    $durasi = $hasil->durasi;
                                                }
                                                if($jenis == "Karyawan"){
                                                    echo "-";
                                                }if($jenis == "Magang"){
                                                    if($risult == null){
                                                        echo "kosong";
                                                    }else{
                                                        echo $durasi;
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $db = \Config\Database::connect();
                                                $query   = $db->query('SELECT * FROM pelamar WHERE nama = "'.$row['nama'].'"');
                                                $results = $query->getResult();

                                                foreach ($results as $rowww) {
                                                    echo $rowww->status;
                                                }
                                            ?>
                                        </td>
                                    <form method="post">
                                        <td style="text-align: center;">
                                        <?php
                                                $db = \Config\Database::connect();
                                                $query   = $db->query('SELECT * FROM pelamar WHERE nama = "'.$row['nama'].'"');
                                                $results = $query->getResult();

                                                foreach ($results as $rou) {
                                                    $id = $rou->id_pelamar;
                                                }
                                            ?>
                                            <a href="<?php echo base_url('cv?id=').$id ?>" data-toggle="tooltip" style="text-decoration: none;" title="Review CV"><img src="<?php echo base_url('assets/img/eye.png') ?>" style="width:26px;"></a>
                                        </td>
                                        <td style="width:8%; text-align: center;">
                                            <a href="<?php echo base_url('panggil?id=').$id ?>" data-toggle="tooltip" style="text-decoration: none;" title="Kirim Pesan Interview"><img src="<?php echo base_url('assets/img/terima.png') ?>" style="width:23px;"></a>
                                        </td>
                                        <td style="width:8%; text-align: center;">
                                        <a href="#" class="delete" data-toggle="tooltip" style="text-decoration: none;" title="Tolak Pelamar" data-id="<?php echo $id; ?>"><img src="<?php echo base_url('assets/img/cancel.png') ?>" style="width:20px;"></a>
                                        </td>
                                    </form>
                                    </tr>
                                    <form action="<?php echo base_url('tolak?id=').$id; ?>" method="post">
                                        <div class="modal fade" id="deletemodal" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Tolak Pelamar</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin ingin menolak pelamar ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" class="aidi">
                                                        <button type="submit" class="btn btn-default y">Yes</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php endforeach;?>
                                    </form>
                                </table>
                                
            <div style="padding-left:40%;"><?= $pager->Links() ?></div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        
        <!-- jQuery -->
        <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/metisMenu.min.js'); ?>"></script>

        <!-- Morris Charts JavaScript -->
        <script src="<?php echo base_url('assets/js/raphael.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/startmin.js'); ?>"></script>
        
        <script src="<?php echo base_url('assets/jsgrid/jsgrid.min.js'); ?>"></script>
        <script>
            $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.delete').on('click',function(){
                    // get data from button edit
                    const id = $(this).data('id');
                    // Set data to Form Edit
                    $('.aidi').val(id);
                    // Call Modal Edit
                    $('#deletemodal').modal('show');
                });
            });
        </script>
    </body>
</html>
