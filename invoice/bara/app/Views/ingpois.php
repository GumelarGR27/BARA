<?php
    $db = \Config\Database::connect();
    $request = \Config\Services::request();
    $nama = $request->getVar('noinv');
    $query   = $db->query('SELECT * FROM tagihan WHERE no_invoice="'.$nama.'"');
    $results = $query->getResult();
    foreach ($results as $row) {
        $idtag = $row->id_tagihan;
        $comp = $row->nama_perusahaan;
    }

    $queryy   = $db->query('SELECT * FROM client WHERE nama_perusahaan="'.$comp.'"');
    $resultss = $queryy->getResult();
    foreach ($resultss as $roww) {
        $idklien = $roww->id_klien;
        $bank = $roww->bank;
    }

    $queryyy   = $db->query('SELECT * FROM remainder WHERE id_klien="'.$idklien.'"');
    $resultsss = $queryyy->getResult();
    $kueri   = $db->query('SELECT * FROM bank WHERE id_bank="'.$bank.'"');
    $risalt = $kueri->getResult();
    
                            foreach ($results as $row) {
                                $row->nama_perusahaan;
                            }
    $kweri   = $db->query('SELECT sum(total) as total FROM detail_tagihan WHERE nama_perusahaan="'.$comp.'"');
    $risult = $kweri->getResult();
    // $builder   = $db->table('detail_tagihan');
    // $notal = $builder->select('SELECT SUM(total) FROM detail_tagihan WHERE nama_perusahaan="'.$nama.'"');
    // $totall = $notal->findAll();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $row->nama_perusahaan; ?></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" href="https://bara.co.id/assets/images/icon_bara.png" type="image/x-icon">
	<style type="text/css">
		.invoice-title h2, .invoice-title h3 {
            display: inline-block;
        }

        .table > tbody > tr > .no-line {
            border-top: none;
        }

        .table > thead > tr > .no-line {
            border-bottom: none;
        }

        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
        }
        .body{
            background-color: lightgrey;
            padding: 2% 15% 2% 15%;
        }
        .container{
            width: 90%;
            background-color: white;
        }
	</style>
</head>
<body>

    <div class="body">
        <div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>INVOICE<br>No <?php 
                            foreach ($results as $row) {
                                $row->no_invoice;
                            }
                        ?>
                        <?= $row->no_invoice; ?></h2><h3 class="pull-right"><img src="<?php echo base_url('logo_bara.png'); ?>"style="width: 150px;"></h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                    <?php
                            foreach ($resultss as $roww) {
                                $roww->nama;
                                $roww->kota;
                                $roww->telepon;
                            }
                            foreach ($results as $row) {
                                $row->nama_perusahaan;
                            }
                        ?>
                    <strong>Invoice To:</strong><br>
                        <?=
                            $roww->nama;
                        ?>
                        <br>
                        <?= 
                            $row->nama_perusahaan;
                        ?><br>
                        <?=
                            $roww->kota;
                        ?><br>
                        <?=
                            $roww->telepon;
                        ?><br>
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                    <strong>Pay To:</strong><br>
                        <?php
                            foreach ($risalt as $rou) {
                               echo $rou->nama_bank."<br>";
                               echo $rou->kantor."<br>";
                               echo $rou->rek."<br>";
                               echo $rou->nama."<br>";
                            }
                        ?>
                        <!-- PT. Bank Central Asia (BCA) Tbk<br>
                        KCP Setiabudi<br>
                        No. Rek. 233 003 31 96 <br>
                        a/n Moch Gani Setiawan -->
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <?php 
                            foreach ($results as $ing) {
                                $row->tanggal_invoice;
                            }
                            foreach ($resultsss as $rowww) {
                                $rowww->due_date;
                            }
                        ?>
                    <address>
                        <strong>Invoice Date:</strong>
                        <?= 
                            $row->tanggal_invoice;
                        ?>                       
                       <br>
                        <strong>Due Date:</strong>
                        <?= 
                            $rowww->due_date;
                        ?><br>
                    </address>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Deskripsi</strong></td>
                                    <td class="text-center"><strong>Unit</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Subtotal</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($tagihan as $ing):
                                ?> 
                                <tr>
                                    <td> <?=
                                        $ing['deskripsi'];
                                        ?></td>
                                    <td class="text-center"> <?=
                                        $ing['unit'];
                                        ?></td>
                                    <td class="text-center"> <?=
                                        $ing['quantity'];
                                        ?></td>
                                    <td class="text-right">
                                    <?php 
                                    $id = $ing['id_tagihan'];
                                      $total = $ing['total'];
                                      $qty = $ing['quantity']; 
                                      $sub = $total / $qty;
                                      echo  "Rp.".number_format($sub,0,',','.');
                                    ?>
                                    </td>
                                    <td class="text-right"> <?=
                                        "Rp.".number_format($ing['total'],0,',','.');
                                        ?></td>
                                </tr>
                            <?php
                                
                                if($row->nama_perusahaan>=2){
                                    echo $totall = $total + $total;
                                }
                                endforeach; 
                            ?>
                            </tbody>
                        </table>
                        <table class="table table-condensed">
                            <tbody>
                                <tr>
                                    <!-- <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong></strong></td>
                                    <td class="thick-line text-right"><strong></strong></td>
                                    <td class="thick-line text-right"><strong> 
                                        </strong></td>-->
                                    <td colspan="5" style="text-align:right;">
                                        <?php 
                                echo "Rp. ".number_format($risult[0]->total,0,',','.');
                            ?>  
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div align="right">
                            
                        </div>
                        <p style="margin-left: 79%; margin-top: 30px;">Cimahi, &nbsp;&nbsp;&nbsp;<?php echo date("d-m-Y")?></p>
                        <img src="<?php echo base_url('/img/contoh_ttd.jpg'); ?>" style="margin-left: 81%; width: 100px; height: 100px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</body>
</html>