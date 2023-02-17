<?php
    $db = \Config\Database::connect();
    
    $data = $db->table('pelamar');
    $total = $data->countAll();
    $jumlahh = $data->where('id_divisi', 'DIV02');
    $jumlah = $jumlahh->countAllResults();
    $array = array('id_divisi' => 'DIV02', 'status' => 'Sedang Interview');
    $sedangg = $data->where($array);
    $sedang = $sedangg->countAllResults();
    $arrayy = array('id_divisi' => 'DIV02', 'status' => 'Belum Interview');
    $belumm = $data->where($arrayy);
    $belum = $belumm->countAllResults();

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
            td, img{
                width: 23px;
                height: 22px;
                margin-right: 10px;
                margin-left: 10px;
            }
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
            .gambar{
                width:85px; 
                height:80px;
                margin-left: 0px !important;
            }
            .panel-heading{
                border: 0px !important; 
                background-color: #fff !important;
            }
            .tooltip {
                position: absolute;
                display: inline-block;
                border-bottom: 1px dotted black;
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
            .logout{
                background-color: #222 !important; 
                color: white !important;
            }
            a.logout:hover{
                background-color: #eee !important; 
                color: #222 !important;
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
                            <h1 class="page-header">Tolak Pelamar</h1>
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
                                        <div class="col-xs-3">
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
                                        <div class="col-xs-3">
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
                            <div class="panel-heading" style="width:40% !important; float:left; margin-top: 5px; margin-bottom: 10px; margin-left: 5%;">
                                    <!-- <a href="<?php base_url('tambahdivisi') ?>"><button type="button" class="btn btn-default hover">Tambah Pesan</button></a> -->
                                </div>
                                <!-- <div class="input-group"style="width:50% !important; float:left;">
                                    <div class="form-outline">
                                        <input type="search" id="form1" class="form-control" style="width:50%; margin-top: 10px; margin-bottom: 10px; margin-left: 38%;"/>
                                    </div>
                                    <button type="button" class="btn btn-primary" id="btn" style="margin-top: 10px; margin-bottom: 10px;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div> -->
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                <table class="table table-bordered" style="width:90%; margin-left:5%;">
		        <tr>
		            <th style="text-align: center;">Subjek</th>
		            <th style="text-align: center;">Isi</th>
                    <th colspan="3" style="text-align: center;">Aksi</th>
		        </tr>
                
		        <?php
                    foreach($pesan as $row):
                ?>
                <form action="<?php $request = \Config\Services::request(); echo base_url('menolak?id='.$request->getVar('id').'&sub='.$row['subjek'].'&isi='.$row['isi']); ?>" method="post">
		        <tr>
		            <td style="text-align: center;" name="sub"><?= $row['subjek']; ?></td>
		            <td name="isi"><?= $row['isi']; ?></td>
                    <!-- <td style="width:8%; text-align: center;">
                        <a href="" data-toggle="tooltip" style="text-decoration: none;" title="Edit Pesan"><img src="<?php echo base_url('assets/img/pensil.png') ?>"></a>
                    </td> -->
                    <td style="width:8%; text-align: center;">
                        <button type="submit" data-toggle="tooltip" style="background: transparent; border: 0px solid white;" title="Kirim Pesan"><i class="fa fa-light fa-paper-plane"></i></button>
                    </td>
                </tr>
                <?php endforeach; ?>
                </form>
		    </table>
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
        <!-- <script>
            function konpirm(){
            var userPreference;

            if (confirm("Yakin akan menerima pelamar ini?") == true) {
                userPreference = "Anda Telah Menerima Pelamar";
            } else {
                userPreference = "Lamaran Ditolak";
            }
            return document.getElementById("msg").innerHTML = userPreference; 
            }
            $(function () {
            $("#jsGrid1").jsGrid({
                height: "100%",
                width: "100%",

                sorting: true,
                paging: true,

                data: db.clients,

                fields: [
                    { name: "Name", type: "text", width: 150 },
                    { name: "Age", type: "number", width: 50 },
                    { name: "Address", type: "text", width: 200 },
                    { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
                    { name: "Married", type: "checkbox", title: "Is Married" }
                ]
            });
        });
        </script> -->
        <script src="<?php echo base_url('assets/jsgrid/jsgrid.min.js'); ?>"></script>
        <script>
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>
         <script>
            $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
    </body>
</html>
