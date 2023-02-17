<?php
    $session = session();
    $jabatan = $session->get('jabatan');
?>

<html lang="en-US"  class="supernova"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PT Bara Prima Multi Teknovasi</title>
<link rel="stylesheet" type="text/css" href="https://bara.co.id/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://bara.co.id/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="https://bara.co.id/assets/css/style.css">
<link href="https://cdn01.jotfor.ms/static/formCss.css?3.3.34522" rel="stylesheet" type="text/css" />
<style type="text/css">@media print{.form-section{display:inline!important}.form-pagebreak{display:none!important}.form-section-closed{height:auto!important}.page-section{position:initial!important}}</style>
<link type="text/css" rel="stylesheet" href="https://cdn02.jotfor.ms/css/styles/nova.css?3.3.34522" />
<link type="text/css" rel="stylesheet" href="https://cdn03.jotfor.ms/themes/CSS/5ca4930530899c64ff77cfa1.css?"/>
<link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/css/styles/payment/payment_styles.css?3.3.34522" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://cdn02.jotfor.ms/css/styles/payment/payment_feature.css?3.3.34522" />
<link rel="shortcut icon" href="https://bara.co.id/assets/images/icon_bara.png" type="image/x-icon">
<script type="text/javascript">
    <!--
    function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        if (curr_hour < 12) {
            a_p = "AM";
        } else {
            a_p = "PM";
        }
        if (curr_hour == 0) {
            curr_hour = 12;
        }
        if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
        }
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);

         var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
      var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
      var date = new Date();
      var day = date.getDate();
      var month = date.getMonth();
      var thisDay = date.getDay(),
          thisDay = myDays[thisDay];
      var yy = date.getYear();
      var year = (yy < 1000) ? yy + 1900 : yy;

     document.getElementById('clock').innerHTML=thisDay + ", " + day + " " + months[month] + " " + year + " " + curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
        }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);
    </script>
    <script type='text/javascript'>
      <!--
      var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
      var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
      var date = new Date();
      var day = date.getDate();
      var month = date.getMonth();
      var thisDay = date.getDay(),
          thisDay = myDays[thisDay];
      var yy = date.getYear();
      var year = (yy < 1000) ? yy + 1900 : yy;
      document.getElementById('tgl').innerHTML=thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
    </script>
<style type="text/css">
@import 'https://fonts.googleapis.com/css?family=Roboto:light,lightitalic,normal,italic,bold,bolditalic';
@import (css) '@{buttonFontLink}';

    .form-label-left{
        width:600px;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:600px;
    }
    body, html{
        margin:0;
        padding:0;
        background-color:#fff !important;
    }

    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:700px;
        color:rgb(28, 38, 67) !important;
        font-family:'Roboto';
        font-size:15px;
    }
    .radio{
      width: 10%;
      float: left;
      margin-top: 27px;
    }
    .bank{
      float: left;
    }
    .
</style>

<style type="text/css" id="form-designer-style">
    .form-all {
      font-family: Roboto, sans-serif;
    }
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-family: Roboto, sans-serif;
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-family: Roboto, sans-serif;
    }
    .form-header-group {
      font-family: Roboto, sans-serif;
    }
    .form-label {
      font-family: Roboto, sans-serif;
    }
  
    .form-label.form-label-auto {
      
    display: block;
    float: none;
    text-align: left;
    width: 100%;
  
    }
    .table-bordered{
    border: 1px solid black !important;
}
  
    .form-line {
      margin-top: 12px;
      margin-bottom: 12px;
    }
  
    .form-all {
      max-width: 700px;
      width: 100%;
    }
  
    .form-label.form-label-left,
    .form-label.form-label-right,
    .form-label.form-label-left.form-label-auto,
    .form-label.form-label-right.form-label-auto {
      width: 600px;
    }
  
    .form-all {
      font-size: 15px
    }
    .form-all .qq-upload-button,
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-size: 15px
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-size: 15px
    }
  
    .supernova .form-all, .form-all {
      background-color: #fff;
      border: 1px solid transparent;
    }
  
    .form-all {
      color: rgb(28, 38, 67);
    }
    .form-header-group .form-header {
      color: rgb(42, 57, 99);
    }
    .form-header-group .form-subHeader {
      color: rgb(28, 38, 67);
    }
    .form-label-top,
    .form-label-left,
    .form-label-right,
    .form-html,
    .form-checkbox-item label,
    .form-radio-item label {
      color: rgb(28, 38, 67);
    }
    .form-sub-label {
      color: 1a1a1a;
    }
  
    .supernova {
      background-color: rgb(238, 239, 241);
    }
    .supernova body {
      background: transparent;
    }
  
    .form-textbox,
    .form-textarea,
    .form-radio-other-input,
    .form-checkbox-other-input,
    .form-captcha input,
    .form-spinner input {
      background-color: #fff;
    }
  
    .supernova {
      background-image: none;
    }
    #stage {
      background-image: none;
    }
  
    .form-all {
      background-image: none;
    }
  

    .form-all {
      position: relative;
    }
    .form-all:before {
      display: inline-block;
      height: 140px;
      position: absolute;
      background-size: 340px 140px;
      background-repeat: no-repeat;
      width: 100%;
    }
    .form-all {
      margin-top: 150px !important;
    }
    .form-all:before {
      top: -150px;
      background-position: top center;
    }
           
  .ie-8 .form-all:before { display: none; }
  .ie-8 {
    margin-top: auto;
    margin-top: initial;
  }
  button {
    margin-right: 10px; 
}
#nav {
    border-radius: 0px !important;
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
                                                echo '<li><a href="profile">Data User</a></li>';
                                            }
                                          ?>
                                          <li ><a href="<?php echo base_url('/profile') ?>">User Profile</a></li>
                                          <li><a href="<?php echo base_url('/logout') ?>">Log Out</a></li>
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
    <a href="<?php echo base_url('reminder'); ?>"><button type="button" class="btn btn-info" style="margin-left: 70%;margin-bottom: 20px;"  type="button" >Buat Reminder</button></a>
    
<table class="table table-striped" style = "width:80%; margin-bottom: 100px;" > 
  <tr>
    <th class="table-bordered">No</th>
    <th class="table-bordered">Company</th>
    <th class="table-bordered">Reminder</th>
    <th class="table-bordered">Action</th>
  </tr>
  <?php
                    $no = 1;
                    foreach ($client as $row):
                ?>
  <?php
    $db = \Config\Database::connect();
        $query   = $db->query('SELECT nama_perusahaan FROM client WHERE id_klien="'.$row['id_klien'].'"');
        $results = $query->getResult();
         
    ?>    
      <?php 
        if(!empty($results)){
      ?>
  <tr>
    <td class="table-bordered">
    
      <?= $no++; ?>
    </td>

    <td class="table-bordered">
    <?php 
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT nama_perusahaan FROM client WHERE id_klien="'.$row['id_klien'].'"');
        $results = $query->getResult();
        foreach ($results as $roww) {
            echo $roww->nama_perusahaan;
        }
        //$row['nama_perusahaan']; 
    ?>    
    </td>
    <td class="table-bordered">
      
       <?= $row['due_date']; ?>
        <!-- //$row['nama_perusahaan']; --> 
        
    </td>
    <td class="table-bordered">
      <a href="<?php echo base_url('invoice?noinv='.$row['no_invoice']); ?>"><button type="button" class="btn btn-info">View</button></a>
        <a href="<?php echo base_url('Edit_Reminder?nama='.$roww->nama_perusahaan); ?>"><button type="button" class="btn btn-warning">Edit</button></a>
        <button type="button" class="btn btn-info btn-danger delete" data-id="<?= $row['no']; ?>" data-toggle="modal" data-target="#myModal">Delete</button>
    </td>
    

  </tr>
  <?php
      }
      ?> 
  <?php endforeach;?>
</table>

<form action="<?php echo base_url('hapusreminder'); ?>" method="post">
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
  </tr>
    </table>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
            $(document).ready(function(){
                $('.delete').on('click',function(){
                    // get data from button edit
                    const id = $(this).data('id');
                    // Set data to Form Edit
                    $('.aidi').val(id);
                    // Call Modal Edit
                    $('#myModal').modal('show');
                });
            });
        </script>
</body>
</html>