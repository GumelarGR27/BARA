<?php
        $session = session();
    $jabatan = $session->get('jabatan');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Bara Enterprise</title>

    <link rel="stylesheet" type="text/css" href="https://bara.co.id/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://bara.co.id/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="https://bara.co.id/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="https://bara.co.id/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://bara.co.id/assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="https://bara.co.id/assets/css/gallery.css">
    <link rel="stylesheet" type="text/css" href="https://bara.co.id/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://bara.co.id/assets/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
    <link href="https://bara.co.id/landing/css/home-new.css" rel="stylesheet" />
    <link rel="shortcut icon" href="https://bara.co.id/assets/images/icon_bara.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
    <script type="text/javascript">
    var minDate, maxDate;
 
// Custom filtering function which will search data in column four between two values
// $.fn.dataTable.ext.search.push(
//     function( settings, data, dataIndex ) {
//         var min = minDate.val();
//         var max = maxDate.val();
//         var date = new Date( data[4] );
 
//         if (
//             ( min === null && max === null ) ||
//             ( min === null && date <= max ) ||
//             ( min <= date   && max === null ) ||
//             ( min <= date   && date <= max )
//         ) {
//             return true;
//         }
//         return false;
//     }
// );
 
$(document).ready(function() {
    // Create date inputs
    // minDate = new DateTime($('#min'), {
    //     format: 'YYYY-MM-DD'
    // });
    // maxDate = new DateTime($('#max'), {
    //     format: 'YYYY-MM-DD'
    // });
 
    // DataTables initialisation
    var table = $('#tabel').DataTable();
 
    // Refilter the table
    $('#min, #max').on('change', function () {
        table.draw();
    });
});
</script>
<style>
* {
  box-sizing: border-box;
}
#myInput {
  background-image: url('/css/search_icons.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 80%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #000;
  margin-bottom: 12px;
  margin-top: 50px;
  margin-left: 10%;
}
#tabel_length{
    display: none;
}
#tabel_filter{
    display: none;
}
#tabel_info{
    display: none;
}
#tabel_paginate{
    display: none;
}
.footer{
    margin-top: 20px;
}
#nav {
    border-radius: 0px !important;
}
.tooltip {
  position: relative;
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
.table-bordered{
    border: 1px solid black !important;
}
.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>
</head>
<body style="background-color: white !important;">
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
                        <div style="height: 1px; float: right;" role="main" aria-expanded="false" class="navbar-collapse collapse navbar-collapse-centered" id="bs">
                            <ul class="nav navbar-nav navbar-nav-centered">
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('/') ?>">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('/daftar') ?>">Client</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('/datainvoice') ?>">Invoice</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('/form_remainder') ?>">Add Reminder</a></li>
                                <li class="nav-item">
                                    <div class="dropdown" style="margin-right: 20px !important;">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: transparent; border: 0px; padding: 0px; margin: 0px;"><i class="fa-regular fa-user" style="color :white;"></i>
                                        </button>
                                        <ul class="dropdown-menu" style="min-width: 100px !important; ">
                                            <?php
                                            if($jabatan == "Admin"){
                                                echo '<li><a href="datausers">Data User</a></li>';
                                            }
                                          ?>
                                          <li ><a href="<?php echo base_url('/profile') ?>">User Profile</a></li>
                                          <li><a href="<?php echo base_url('/login') ?>">Log Out</a></li>
                                        </ul>
                                      </div>
                                </li>     
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
<a href="<?php echo base_url('register'); ?>"><button type="button" class="btn btn-info" style="margin-bottom: 20px; float: left; margin-left: 10%;" type="button">Tambah User</button></a>
<form method="POST" action="" class="form-group">
<input type="search" name="cari" id="form1" class="form-control" style="width:20%; margin-left: 43.5%; border:1.5px solid lightgrey; float: left; border-radius: 0px;"/>
                                <!-- </div> -->
                                <button type="Submit" class="btn btn-primary" id="btn" style="border-radius: 0px; float: left;">
                                    <i class="fas fa-search"></i>
                                </button>
</form>
<!-- <form method="POST"> -->
    <br>

<form action="<?php echo base_url('hapususer'); ?>" method="post">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style='text-align: center;'>Delete!</h4>
                </div>
                <div class="modal-body">
                    <p style='text-align: center;'>Are You Sure Dude?</p>
                </div>
                <div class="modal-footer">
                 <input type="hidden" name="id" class="aidi">
                 <button type="submit" class="btn btn-default">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
            </div>
        </div>

    </div>
</form>
<div style="padding-left: 0px !important;">
<table class="table table-striped" style = "width:85%; margin-bottom: 38px; margin-left: 7% !important;">
  <tr>
    <th class="table-bordered">No</th>
    <th class="table-bordered">Nama</th>
    <th class="table-bordered">Email</th>
    <th class="table-bordered">Jabatan</th>
    <th class="table-bordered">Telepon</th>
    <th class="table-bordered">Action</th>
  </tr>
  <?php
      $no = 1;
      foreach ($user as $row):
  ?>
  <tr>
    <td class="table-bordered"><?= $no++; ?></td>
    <td class="table-bordered"><?= $row['nama']; ?></td>
    <td class="table-bordered"><?= $row['email']; ?></td>
    <td class="table-bordered"><?= $row['jabatan']; ?></td>
    <td class="table-bordered"><?= $row['telepon']; ?></td>
    <!-- <form method="post"> -->
    <td class="table-bordered">
        <a href="<?php echo base_url('ubahpassword?id='.$row['id_user']); ?>"><button type="button" class="btn btn-warning">Edit</button></a>
        <button type="button" class="btn btn-info btn-danger delete" data-id="<?= $row['email']; ?>" data-toggle="modal" data-target="#myModal">Delete</button>
    </td>
    

  </tr>
  <?php endforeach;?>
</table>
</div>
<!-- </form> -->
<div style="padding-left:40%;"><?= $pager->Links() ?></div>
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
        <script src="https://kit.fontawesome.com/ca21bdd1c1.js" crossorigin="anonymous"></script>
</body>
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
</html>