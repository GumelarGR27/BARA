<?php
    $db = \Config\Database::connect();
    $request = \Config\Services::request();
    
    $data = $db->table('pelamar');

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

        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo base_url('assets/jsgrid/jsgrid.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/jsgrid/jsgrid-theme.min.css'); ?>">
        <link href="<?php echo base_url('assets/css/startmin.css'); ?>" rel="stylesheet">
        <script src="https://kit.fontawesome.com/ca21bdd1c1.js" crossorigin="anonymous"></script>
        <style>
            td, img{
                width: 23px;
                height: 22px;
                margin-right: 10px;
                margin-left: 10px;
            }
            .panel{
                /* border: 0px !important;  */
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
            button.hover{
                font-weight: bold;
            }
            button.hover:hover{
                color: #fff;
                background-color: #337ab7 !important;
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
            .gambar{
                width:85px; 
                height:80px;
                margin-left: 0px !important;
            }
            .panel-heading{
                border: 0px !important; 
                background-color: #fff !important;
            }
            #btn{
                border-radius: 0px;
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
                                <a href="<?php echo base_url('/datapelamar'); ?>" class="a"><i class="fa fa-light fa-folder-open" style="margin-right: 5px; margin-left: 2px;"></i> Data Pelamar</a>
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
                                <a href=<?php echo base_url('/kelola'); ?> class="a active"><i class="fa fa-edit fa-fw"  style="margin-right: 7px; margin-left: 1px;"></i> Kelola Lowongan</a>
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
                            <a href="<?php echo base_url('/admin'); ?>" class="btn btn-default y">Ya</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Kelola Lowongan</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="width:50% !important; float:left; margin-top: 5px; margin-bottom: 10px;">
                                    <a href="<?php echo base_url('tambahdivisi') ?>"><button type="button" class="btn btn-default hover">Tambah Lowongan</button></a>
                                </div>
                                <div class="input-group"style="width:50% !important; float:left;">
                                    <div class="form-outline">
                                        <input type="search" id="form1" class="form-control" style="width:50%; margin-top: 10px; margin-bottom: 10px; margin-left: 40%;"/>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="btn" style="margin-top: 10px; margin-bottom: 10px;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                <?php if(session()->getFlashdata('msg')):?>
                                        <div class="alert alert-success" style="width: 100%; text-align: center; margin-top: 20px; float: left;"><?= session()->getFlashdata('msg') ?></div>
                                <?php endif;?>
                                <div class="panel-body">
                                <table class="table table-bordered" style="width:90%;margin-left:5%; text-align: justify;">
		        <tr>
		            <th style="text-align: center;">Divisi</th>
		            <th style="text-align: center;">Kriteria</th>
                    <th style="text-align: center;" colspan="2">Aksi</th>
		        </tr>
		        	<?php  
		        	foreach($kelola as $row):?>
		        <tr>
                <form method="POST">
		            <td style="text-align: center;" name="nama">
                        <?php 
                              $db = \Config\Database::connect();
                              $nama = $db->query('SELECT * FROM divisi WHERE id_divisi = "'.$row['id_divisi'].'"'); 
                              $results = $nama->getResult();
                              foreach ($results as $roww) {
                                echo $name = $roww->Nama;
                              }
                        ?>
                    </td>
		            <td name="kriteria"><?=$row['kriteria'];?></td>
                    <!-- <td style="width:18%; text-align: center; padding-top: 4%;"> -->
                    <td style="text-align: center;">
                        <a href="<?php echo base_url('edit?nama='.$name.'&kriteria='.$row['kriteria']) ?>" data-toggle="tooltip" title="Edit" style="text-decoration: none;" class="btn-edit"><img src="<?php echo base_url('assets/img/pensil.png') ?>"></a>
                    </td>    
                    <td style="text-align: center;">
                        <a href="#" class="delete" data-toggle="tooltip" title="Hapus" style="text-decoration: none;" data-id="<?php echo $name; ?>"><img src="<?php echo base_url('assets/img/cancel.png') ?>"></a>
                    </td>
                    <!-- </td> -->
		        </tr>
		        <?php endforeach;?>
                </form>
		    </table>
            <form action="<?php echo base_url('hapuslowongan'); ?>" method="post">
                                        <div class="modal fade" id="deletemodal" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Hapus</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin ingin menghapus lowongan kerja ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="nama" class="nama">
                                                        <button type="submit" class="btn btn-default y">Yes</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
        <script type="text/javascript">
            $(document).ready(function(){
                $('.delete').on('click',function(){
                    // get data from button edit
                    const id = $(this).data('id');
                    // Set data to Form Edit
                    $('.nama').val(id);
                    // Call Modal Edit
                    $('#deletemodal').modal('show');
                });
            });
        </script>
<script>
            $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
    </body>
</html>
