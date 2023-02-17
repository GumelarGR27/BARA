<?php
    $db = \Config\Database::connect();
    $results = $db->table('lowongan');
    $builder = $db->table('divisi');
    $pel     = $db->table('pelamar'); 
    $jumlah  = $builder->countAllResults();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="https://bara.co.id/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="https://bara.co.id/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/fontawesome.css'); ?>">
        <link rel="stylesheet" type="text/css" href="https://bara.co.id/assets/css/slick.css">
        <link rel="shortcut icon" href="https://bara.co.id/assets/images/icon_bara.png" type="image/x-icon">
        <title>Bara Enterprise</title>
        <style>
            .form{
                border: 2px lightgray solid;
                margin-top: 10%;
                margin-right: 2%;
                margin-bottom: 5%;
            }
            .card-header{
                background-color: #eeee44;
                height: 64px;
                text-align: center;
                padding-top: 1px;
                
            }
            form {
                padding: 5% 5% 5% 5%;
            }
            nav{
                border-radius: 0px !important;
            }
            .button{
                background-color: #111a2b;
                width: 90%;
                height: 40px;
                color: white;
                margin-top: 20px;
                margin-left: 5%;
                border:none;
                border-radius: 5px;
                font-size: medium;
                font-weight: 700;
            }
            .template_faq {
                background: #edf3fe none repeat scroll 0 0;
            }
            .panel-group {
                background: #fff none repeat scroll 0 0;
                border-radius: 3px;
                box-shadow: 0 0px 10px 0 rgba(0, 0, 0, 0.04);
                margin-bottom: 0;
                padding: 30px;
            }
            #accordion .panel {
                border: medium none;
                border-radius: 0;
                box-shadow: none;
                margin: 0 0 15px 10px;
            }
            #accordion .panel-heading {
                border-radius: 30px;
                padding: 0;
                margin-top: 15px;
            }
            #accordion .panel-title a {
                background: #eeee44 none repeat scroll 0 0;
                border: 1px solid transparent;
                border-radius: 30px;
                color: #000;
                display: block;
                font-size: 18px;
                font-weight: 600;
                padding: 12px 20px 12px 50px;
                position: relative;
                transition: all 0.3s ease 0s;
            }
            #accordion .panel-title a.collapsed {
                background: #fff none repeat scroll 0 0;
                border: 1px solid #ddd;
                color: #333;
            }
            #accordion .panel-title a::after, #accordion .panel-title a.collapsed::after {
                background: #eeee44 none repeat scroll 0 0;
                border: 1px solid transparent;
                border-radius: 50%;
                box-shadow: 0 0px 10px rgba(0, 0, 0, 0.5);
                color: #000;
                content: "";
                font-family: fontawesome;
                font-size: 25px;
                height: 55px;
                left: -20px;
                line-height: 55px;
                position: absolute;
                text-align: center;
                top: -5px;
                transition: all 0.3s ease 0s;
                width: 55px;
            }
            #accordion .panel-title a.collapsed::after {
                background: #fff none repeat scroll 0 0;
                border: 1px solid #ddd;
                box-shadow: none;
                color: #333;
                content: "";
            }
            #accordion .panel-body {
                background: transparent none repeat scroll 0 0;
                border-top: medium none;
                padding: 20px 25px 10px 9px;
                position: relative;
            }
            #accordion .panel-body p {
                border-left: 1px dashed #8c8c8c;
                padding-left: 25px;
                text-align: justify;
            }
            .gambar{
                width: 100%;
                margin-top: 35%;
                margin-bottom: 20%;
            }
            input[type=file] {
                display: block !important;
                right: 1px;
                top: 1px;
                height: 34px;
                opacity: 0;
                width: 100%;
                background: none;
                position: absolute;
                overflow: hidden;
                z-index: 2;
            }
            
            .control-fileupload {
                display: block;
                border: 1px solid #d6d7d6;
                background: #FFF;
                border-radius: 4px;
                width: 100%;
                height: 36px;
                line-height: 36px;
                padding: 0px 10px 2px 10px;
                overflow: hidden;
                position: relative;
                
                &:before, input, label {
                    cursor: pointer !important;
                }
                /* File upload button */
                &:before {
                    /* inherit from boostrap btn styles */
                    padding: 4px 12px;
                    margin-bottom: 0;
                    font-size: 14px;
                    line-height: 20px;
                    color: #333333;
                    text-align: center;
                    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
                    vertical-align: middle;
                    cursor: pointer;
                    background-color: #f5f5f5;
                    background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
                    background-repeat: repeat-x;
                    border: 1px solid #cccccc;
                    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
                    border-bottom-color: #b3b3b3;
                    border-radius: 4px;
                    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
                    transition: color 0.2s ease;

                    /* add more custom styles*/
                    content: 'Browse';
                    display: block;
                    position: absolute;
                    z-index: 1;
                    top: 2px;
                    right: 2px;
                    line-height: 20px;
                    text-align: center;
                }
                &:hover, &:focus {
                    &:before {
                    color: #333333;
                    background-color: #e6e6e6;
                    color: #333333;
                    text-decoration: none;
                    background-position: 0 -15px;
                    transition: background-position 0.2s ease-out;
                    }
                }
                
                label {
                    line-height: 24px;
                    color: lightgrey !important;
                    font-size: 10px !important;
                    font-weight: normal;
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    position: relative;
                    z-index: 1;
                    margin-right: 90px;
                    margin-bottom: 0px;
                    cursor: text;
                }
            }
        </style>
    </head>
    <body>
        <nav id="nav" class="navbar navbar-full">
            <div class="container-fluid">
                <div class="container container-nav">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <button aria-expanded="false" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="https://bara.co.id" style="padding-top: 15px;"><img src="https://bara.co.id/assets/images/logo.svg" alt="Hustbee"></a>
                            </div>
                            <div style="height: 1px;" role="main" aria-expanded="false" class="navbar-collapse collapse navbar-collapse-centered" id="bs">
                                <ul class="nav navbar-nav navbar-nav-centered">
                                    <li class="nav-item"><a class="nav-link" href="https://bara.co.id">Home</a></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Services</a>
                                        <div class="dropdown-menu custom-dropdown-menu">
                                            <div class="dropdown-items-holder">
                                                <div class="items-with-icon">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6">
                                                            <a href="https://bara.co.id/website" class="link-with-icon">
                                                                <span class="icon"><img src="https://bara.co.id/assets/images/server6.svg" alt=""></span>
                                                                <span class="text">Website</span>
                                                            </a>
                                                            <a href="" class="link-with-icon">
                                                                <span class="icon"><img src="https://bara.co.id/assets/images/mobile.svg" alt=""></span>
                                                                <span class="text">Mobile Apps</span>
                                                            </a>
                                                            <a href="https://bara.co.id/landingpage" class="link-with-icon">
                                                                <span class="icon"><img src="https://bara.co.id/assets/images/uiux.svg" alt=""></span>
                                                                <span class="text">Landing Page</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://bara.co.id/portofolio">Portofolio</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="https://bara.co.id/about">About Us</a></li>
                                    <li class="nav-item"><a class="nav-link" href="https://bara.co.id/blog">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="https://bara.co.id/contact">Contact Us</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Join Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="row" style="width:98%; margin-left:2% !important;margin-top: 60px;">
            <div class="jumbotron" style="width:98%; background-color:#fff !important; border-radius: 10px; box-shadow:0 2px 6px 0 rgba(0, 0, 0, 0.5);">
            <h2 style="margin-left:40px; text-align: center;">Lowongan Pekerjaan: </h2>
            <div class="row" style="background-color:#fff !important; width:95%; margin-left:2.5%;">				
				<div class="col-md-12">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
                            <?php
                                foreach($lowongan as $low): 
                            ?>
							<div class="panel-heading" role="tab" id="headingTwo" >
								<h4 class="panel-title">
									<a class="collapsed" data-toggle="collapse" href="#<?= $low['id_divisi'] ?>">
                                    <?php
                                        //$db = \Config\Database::connect();
                                        $query   = $db->query('SELECT * FROM divisi WHERE id_divisi="'.$low['id_divisi'].'"');
                                        $results = $query->getResult();
                                        foreach ($results as $row) {
                                            echo $row->Nama;
                                        }
                                    ?>    
									</a>
								</h4>
							</div>
							<div id="<?= $low['id_divisi'] ?>" class="panel-collapse collapse">
								<div class="panel-body">
									<p>
                                        <?=
                                            $low['kriteria'];
                                        ?>
                                    </p>
								</div>
							</div>
                            <?php endforeach; ?>
						</div>		
					</div>
				</div><!--- END COL -->		
			</div>
            
            </div>
        </div>
        <div class="container" style="width:100% !important; border-radius: 5px; margin-bottom: 80px; margin-top: 50px; box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.5); " id="form">
            <div class="row">
                <div class="col-xs-6" >
                    <img class="gambar" src="<?php echo base_url('assets/img/interview.png'); ?>">
                </div>
                <div class="col-xs-6">
                    <div class="form">
                        <div class="card card-primary">
                            <div class="card-header">
                            <h3 class="card-title"><b>Submit Lamaran Kerja</b></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="<?php echo base_url('/lamar'); ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Lengkap</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" id="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">NIK</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Nomor Induk Kependudukan" name="desk" id="desk">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat</label>
                                        <textarea class="form-control" placeholder="Masukkan Alamat Anda" name="porto" id="porto"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" class="form-control" placeholder="Masukkan Email" name="email" id="email" required> 
                                    </div>
                                    <label>Divisi Yang Dituju:</label>
                                    <select class="form-control" name="divisi">
                                        <?php
                                            $nama = $builder->get();
                                            foreach ($nama->getResult() as $row){
                                                echo "<option>".$row->Nama."</option>";
                                            }
                                        ?>
                                    </select>
                                    <div class="form-group" style="margin-top: 5px;">
                                        <label for="exampleInputFile" style="margin-top: 10px;">Masukkan CV Anda :</label>
                                        <div class="input-group">
                                            <div class="custom-file-upload">
                                                <span class="control-fileupload">
                                                    <label for="file">Pilih File</label>
                                                    <input type="file" id="file" onchange="" name="cv" accept="application/pdf">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: 5px;">
                                        <label>Jenis Lamaran:</label>
                                        <select class="form-control" id="jenis" name="jenis">
                                            <option>Karyawan</option>
                                            <option>Magang</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Lamaran</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Yakin ingin melamar?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="<?php echo base_url('/lamar'); ?>" class="btn btn-default y">Ya</a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="button">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer container-fluid" id="footer-home">
            <a class="btn-go-top" href="#"><i class="fa-solid fa-angle-down"></i></a>
            <div class="container">
                <div class="sub-footer" style="border: 0px;">
                    <div class="row">
                        <div class="col-md-6 footer-kiri">
                            <a class="logo-bara" href="https://bara.co.id"><img src="https://bara.co.id/assets/images/logo.svg" alt="Bara Enterprise" style="height: 50px;"></a>
                            <p class="bara-footer-title">PT Bara Prima Multi Teknovasi</p>
                            <p class="think-smart">Think Smart Solution</p>
                            <div class="sub-footer-menu">
                                <ul class="social">
                                    <li><a href="https://www.facebook.com/baraenterprise" target="blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.youtube.com/channel/UC-19_0tHD6eA9vY_ozCEGTQ" target="blank"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="https://www.tiktok.com/@bara.enterprise" target="blank"><img src="https://bara.co.id/assets/images/tik-tok.svg" alt="" style="width: 14px;"></a></li>
                                    <li><a href="https://www.instagram.com/baraenterprise/" target="blank"><i class="fab fa-instagram"></i></a></li>
                                </ul>      
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="kantor-utama">Kantor Utama</p>
                            <p class="alamat-utama">Jl. Jend. H. Amir Machmud No.260B, Sukaraja <br> Kec. Cicendo, Kota Bandung, Jawa Barat 40175</p>
                            <div class="contact-bawah">
                                <p><a href="tel:0816-593-922" style="text-decoration: none;color:white;">0816-593-922</a></p>
                                <p><a href="mailto:info@bara.co.id" style="text-decoration: none;color:white;">info@bara.co.id</a></p>
                            </div>
                            <div class="copyright">© Copyright 2021 Bara Enterprise, All Rights Reserved</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://bara.co.id/assets/js/jquery.min.js"></script>
        <script src="https://bara.co.id/assets/js/bootstrap.min.js"></script>
        <script src="https://bara.co.id/assets/js/slick.min.js"></script>
        <script src="https://bara.co.id/assets/js/main.js"></script>
        <script src="https://bara.co.id/assets/owl.carousel.min.js"></script>
        <script src="https://kit.fontawesome.com/ca21bdd1c1.js" crossorigin="anonymous"></script>
        <script>
            $(function() {
            $('input[type=file]').change(function(){
                var t = $(this).val();
                var labelText = '' + t.substr(12, t.length);
                $(this).prev('label').text(labelText);
            })
            });
            $(document).ready(function() {
                var form = $(".card-body");
                var jenis = $("#jenis");
                $($(jenis).on('change', function() {
                    if($(jenis).val() == 'Magang'){
                        $(form).append('<div class="form-group" id="magang"><label for="exampleInputEmail1">Durasi Magang:</label><br><label for="exampleInputEmail1">Mulai</label><input type="date" class="form-control" name="mulai" required><label for="exampleInputEmail1">Akhir</label><input type="date" class="form-control" name="akhir" required></div>');
                    } if($(jenis).val() == 'Karyawan'){
                        $("#magang").css("display", "none");
                    }
                }));
            });
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
    </html>
