<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
.error-template {padding: 40px 15px;text-align: center;}
.error-actions {margin-top:15px;margin-bottom:15px;}
.error-actions .btn { margin-right:10px; }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
            <img class="gambar" src="<?php echo base_url('assets/img/bara.png'); ?>">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Error</h2>
                <div class="error-details">
                    We Can't find the page what you are lokking for
                </div>
                <div class="error-actions">
                    <a href="<?php echo base_url('/'); ?>" class="btn btn-primary">
                        Back To Home </a>
                </div>
            </div>
        </div>
    </div>
</div>
