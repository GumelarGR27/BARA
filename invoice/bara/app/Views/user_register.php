
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous"> -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
    <script type="text/javascript">
    var minDate, maxDate;
 
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[4] );
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);
 
$(document).ready(function() {
    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
    });
 
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
body{
    background:#efefef;
}
.form-body{
    background:#fff;
    padding:20px;
}
.login-form{
    background:rgba(255,255,255,0.8);
    padding:20px;
    border-top:3px solid#3e4043;
}
.innter-form{
    padding-top:20px;
}
.final-login li{
    width:50%;
}

.nav-tabs {
    border-bottom: none !important;
}

.nav-tabs>li{
    color:#222 !important;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
    color: #fff;
    background-color: #d14d42;
    border: none !important;
    border-bottom-color: transparent;
    border-radius:none !important;
}
.nav-tabs>li>a {
    margin-right: 2px;
    line-height: 1.428571429;
    border: none !important;
    border-radius:none !important;
    text-transform:uppercase;
    font-size:16px;
}

.social-login{
    text-align:center;
    font-size:12px;
}
.social-login p{
    margin:15px 0;
}
.social-login ul{
    margin:0;
    padding:0;
    list-style-type:none;
}
.social-login ul li{
    width:33%;
    float:left;
    clear:fix;
}
.social-login ul li a{
    font-size:13px;
    color:#fff;
    text-decoration:none;
    padding:10px 0;
    display:block;
}
.social-login ul li:nth-child(1) a{
    background:#3b5998;
}
.social-login ul li:nth-child(2) a{
    background:#e74c3d;
}
.social-login ul li:nth-child(3) a{
    background:#3698d9;
}
.sa-innate-form input[type=text], input[type=email], input[type=number], input[type=dropdown-menu], input[type=password],textarea, select, email{
    font-size:13px;
    padding:10px;
    border:1px solid#ccc;
    outline:none;
    width:100%;
    margin:8px 0;
    
}
.sa-innate-form input[type=submit]{
    border:1px solid#e64b3b;
    background:#e64b3b;
    color:#fff;
    padding:10px 25px;
    font-size:14px;
    margin-top:5px;
}
    .sa-innate-form input[type=submit]:hover{
    border:1px solid#db3b2b;
    background:#db3b2b;
    color:#fff;
}
    .sa-innate-form button{
    border:1px solid#e64b3b;
    background:#e64b3b;
    color:#fff;
    padding:10px 25px;
    font-size:14px;
    margin-top:5px;
}
    .sa-innate-form button:hover{
    border:1px solid#db3b2b;
    background:#db3b2b;
    color:#fff;
}
    .sa-innate-form p{
        font-size:13px;
        padding-top:10px;
}
</style>
</head>
<body>
    <div class="container">
    <div class="row">
        <h2>Registrasi</h2>
    </div>
</div>
<br>
<br>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="form-body">
    <!-- <ul class="nav nav-tabs final-login">
        <li class="active"><a data-toggle="tab" href="#sectionA" style="background-color: #fecb00 !important; color: #3b4155 !important;">Masuk</a></li>
    </ul> -->
    <div class="tab-content">
        <div id="sectionA" class="tab-pane fade in active">
        <div class="innter-form">
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif;?>
            <form class="sa-innate-form" method="post" action="<?php echo base_url('register'); ?>">
            <label>Nama</label>
            <input type="text" name="nama">
            <label>Email</label>
            <input type="email" name="email"><br>
            <label>Telepon</label>
            <input type="number" name="telepon">
            <label>Jabatan</label>
            <select name="jabatan" id="cars" >
                <option>Admin</option>
                <option>Manager</option>
                <option>Sekertaris</option>  
            </select>
            <label>Password</label>
            <input type="password" name="password">
            <button type="submit" style="background-color: #fecb00 !important; color: #3b4155 !important;">Register</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
<script src="https://kit.fontawesome.com/ca21bdd1c1.js" crossorigin="anonymous"></script>

<script>
            $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
            });
            
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>