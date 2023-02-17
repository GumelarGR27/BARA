<?php
    $db = \Config\Database::connect();
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

        <title>Admin</title>
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
            td, img{
                width: 40px;
                height: 40px;
                margin-right: 10px;
                margin-left: 10px;
            }
            embed{
                margin-left: 20%;
            }
            .sidebar{
                background-color: #222 !important;
            }
            .a{
                color: white !important;
            }
            a:hover{
                color: #000 !important;
            }
            #saidbar{
                height: 1000px;
                background-color: #222;
            }
            .pdfobject-container {
                height: 118rem;
                border: 1rem solid rgba(0,0,0,.1);
            }
            embed{
                margin-left: 0px !important;
            }
            th {
                border: 1px solid #222 !important;
                background-color: #222;
                color: white;
            }
            td{
                border: 1px solid #222 !important;
            }
            .logout{
                background-color: #222 !important; 
                color: white !important;
            }
            .logout:hover{
                background-color: #fff !important; 
                color: black !important;
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.8/pdfobject.js" integrity="sha512-aqpxRD4NwJUXN742KSiIr4zARkh+WTeaWwx0DYuy+9eARX/glcCFtHSeETrIc6V+1BwYfMwvPz5KWlVtRyXikQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                        <div class="col-lg-12" style="text-align: center;">
                            <h1 class="page-header">Curriculum Vitae</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <?php
                        $db = \Config\Database::connect();
                        $request = \Config\Services::request();
                        $query   = $db->query('SELECT * FROM pelamar WHERE id_pelamar = "'.$request->getVar('id').'"');
                        $results = $query->getResult();

                        foreach ($results as $row) {
                            $cv = $row->cv;
                            $desk = $row->deskripsi;
                            $nama = $row->nama;
                            $divisi = $row->id_divisi;
                        }
                        $queryy   = $db->query('SELECT * FROM porto WHERE id_pelamar = "'.$request->getVar('id').'"');
                        $resultss = $queryy->getResult();
                        foreach ($resultss as $row) {
                            $porto = $row->porto;
                        }
                        $kueri   = $db->query('SELECT * FROM divisi WHERE id_divisi = "'.$divisi.'"');
                        $risult = $kueri->getResult();

                        foreach ($risult as $row) {
                            $dipisi = $row->Nama;
                        }
                    ?>
                    <table class="table table-bordered" style="width:90%; margin-left:5%;">
                                    <tr>
                                        <th style="text-align: center; border-right: 1px solid white !important;">Nama Pelamar</th>
                                        <th style="text-align: center; border-right: 1px solid white !important;">NIK</th>
                                        <th style="text-align: center; border-right: 1px solid white !important;">Alamat</th>
                                        <th style="text-align: center;">Divisi</th>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"> <?php echo $nama;?></td>
                                        <td style="text-align: center;"> <?php echo $desk;?></td>
                                        <td style="text-align: center;"> <?php echo $porto;?></td>
                                        <td style="text-align: center;"> <?php echo $dipisi;?></td>                    
                                    </tr>
                    </Table>
                    <div id="cv"></div>
        <!-- /#wrapper -->
        
        <script src="/js/pdfobject.js"></script>
        <script>PDFObject.embed("<?= base_url()."/uploads/".$cv; ?>", "#cv");
            //PDFObject.embed(createPDF(), "#cv");    
            // function createPDF() {
            //   var doc = new jsPDF();
          
            //   doc.setFont("helvetica");
            //   doc.setFontStyle("bold");
                          
            //   doc.setFontSize(20);
            //   doc.text('TEST PDF...', 105, 20, 'center');
          
            //   return doc.output('datauristring');    
            // }
        </script>

        <!-- jQuery -->
        <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url('assets/js/metisMenu.min.js'); ?>"></script>

        <!-- Morris Charts JavaScript -->
        <script src="<?php echo base_url('assets/js/raphael.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/morris.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/morris-data.js'); ?>"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url('assets/js/startmin.js'); ?>"></script>

    </body>
</html>
