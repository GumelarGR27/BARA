<!DOCTYPE html>
<html>
<head>
  <link type="text/css" rel="stylesheet" href="https://cdn02.jotfor.ms/css/styles/nova.css?3.3.34522" />
<style>
body{
            background-color: lightgrey;
            padding: 2% 15% 2% 15%;
        }
        .container{
            width: 90%;
            padding: 2% 2% 2% 2%;
            background-color: white;
        }
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #000;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
  <?php 
        $request = \Config\Services::request();
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT * FROM tagihan WHERE nama_perusahaan="'.$request->getVar('nama').'"');
        $results = $query->getResult();
        $kueri   = $db->query('SELECT * FROM client WHERE nama_perusahaan="'.$request->getVar('nama').'"');
        $resultss = $kueri->getResult();
        
            foreach ($results as $row) {
                $no = $row->no_invoice;
             }
             foreach ($resultss as $roww) {
                $namap = $roww->nama_perusahaan;
             }
      ?>
<div class="container">
  <!-- <label class="form-label form-label-top form-label-auto" id="label_4" for="first_4">
      No Invoice
  </label>
  <div id="cid_4" class="form-input-wide jf-required">
      <div data-wrapper-react="true">
          <span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
            <input type="text" id="first_4" name="company" class="form-textbox validate[required]" data-defaultvalue="" autoComplete="section-input_4 given-name" size="20" value="<?php echo $no; ?>" data-component="first" aria-labelledby="label_4 sublabel_4_first" required="" style="width:450px;" readonly/>
          </span>
      </div>
  </div> -->
  <label class="form-label form-label-top form-label-auto" id="label_4" for="first_4">
      Nama Perusahaan
  </label>
  <div id="cid_4" class="form-input-wide jf-required">
      <div data-wrapper-react="true">
          <span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
            <input type="text" id="first_4" name="company" class="form-textbox validate[required]" data-defaultvalue="" autoComplete="section-input_4 given-name" size="20" value="<?php echo $namap; ?>" data-component="first" aria-labelledby="label_4 sublabel_4_first" required="" style="width:450px;" readonly/>
          </span>
      </div>
  </div>
  <label class="form-label form-label-top form-label-auto" id="label_4" for="first_4">
      Nama Client
  </label>
  <div id="cid_4" class="form-input-wide jf-required">
      <div data-wrapper-react="true">
          <span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
            <input type="text" id="first_4" name="company" class="form-textbox validate[required]" data-defaultvalue="" autoComplete="section-input_4 given-name" size="20" value="<?php echo $roww->nama; ?>" data-component="first" aria-labelledby="label_4 sublabel_4_first" required="" style="width:450px;" readonly/>
          </span>
      </div>
  </div>
  <label class="form-label form-label-top form-label-auto" id="label_4" for="first_4">
      No Telepon
  </label>
  <div id="cid_4" class="form-input-wide jf-required">
      <div data-wrapper-react="true">
          <span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
            <input type="text" id="first_4" name="company" class="form-textbox validate[required]" data-defaultvalue="" autoComplete="section-input_4 given-name" size="20" value="<?php echo $roww->telepon; ?>" data-component="first" aria-labelledby="label_4 sublabel_4_first" required="" style="width:450px;" readonly/>
          </span>
      </div>
  </div>
  <label class="form-label form-label-top form-label-auto" id="label_4" for="first_4">
      Email
  </label>
  <div id="cid_4" class="form-input-wide jf-required">
      <div data-wrapper-react="true">
          <span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
            <input type="text" id="first_4" name="company" class="form-textbox validate[required]" data-defaultvalue="" autoComplete="section-input_4 given-name" size="20" value="<?php echo $roww->email; ?>" data-component="first" aria-labelledby="label_4 sublabel_4_first" required="" style="width:450px;" readonly/>
          </span>
      </div>
  </div>
  <label class="form-label form-label-top form-label-auto" id="label_4" for="first_4">
      Kota
  </label>
  <div id="cid_4" class="form-input-wide jf-required">
      <div data-wrapper-react="true">
          <span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
            <input type="text" id="first_4" name="company" class="form-textbox validate[required]" data-defaultvalue="" autoComplete="section-input_4 given-name" size="20" value="<?php echo $roww->kota; ?>" data-component="first" aria-labelledby="label_4 sublabel_4_first" required="" style="width:450px;" readonly/>
          </span>
      </div>
  </div>
  <table class="table table-condensed" style="margin-top: 50px;">
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
                                   echo  $totall = $total + $total;
                                }
                                endforeach; 
                            ?>
                            </tbody>
                        </table>
                        <!-- <a href=""><button></button></a> -->
</div>
</body>
</html>

