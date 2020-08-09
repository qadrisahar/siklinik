<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<!-- <link rel="shortcut icon" href="assets/images/favicon.png"> -->
<title>Admin - Siklinik</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
<meta name="description" content="This is an example dashboard created using build-in elements and components.">
<meta name="msapplication-tap-highlight" content="no">
<link href="<?=base_url();?>assets/vendor/architectui/css/main.css" rel="stylesheet">
<link href="<?=base_url();?>assets/vendor/architectui/css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url();?>assets/vendor/architectui/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" href="<?=base_url();?>assets/vendor/architectui/css/responsive.bootstrap4.min.css"/>
<link rel="stylesheet" href="<?=base_url();?>assets/vendor/architectui/css/sweetalert2.min.css"/>
<link rel="stylesheet" href="<?=base_url();?>assets/vendor/select2/bootstrap4-select2-theme.css">
<link rel="stylesheet" href="<?=base_url();?>assets/vendor/select2/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url();?>assets/vendor/bootstrapdp/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url();?>assets/vendor/taginput/tagsinput.css" rel="stylesheet" />
<!-- Include Editor style. -->
<link href='<?=base_url();?>assets/vendor/froala-editor/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
<script src='https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.css' rel='stylesheet' />
<script type="text/javascript" src="<?=base_url();?>assets/vendor/architectui/scripts/popper.min.js"></script>  
<script type="text/javascript" src="<?=base_url();?>assets/vendor/jquery/jquery-3.3.1.min.js"></script> 
<script type="text/javascript" src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?=base_url();?>assets/vendor/architectui/scripts/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="<?=base_url();?>assets/vendor/architectui/scripts/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendor/architectui/scripts/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendor/architectui/scripts/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendor/bootstrapdp/moment.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendor/bootstrapdp/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendor/architectui/scripts/parsley.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendor/architectui/scripts/id.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendor/architectui/scripts/sweetalert2.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendor/architectui/scripts/metismenu.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendor/select2/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendor/taginput/tagsinput.js"></script>

<script type="text/javascript" src="<?=base_url();?>assets/vendor/highchart/code/highcharts.js"></script>  
<script type="text/javascript" src="<?=base_url();?>assets/vendor/highchart/code/modules/exporting.js"></script>  
<script type="text/javascript" src="<?=base_url();?>assets/vendor/highchart/code/modules/export-data.js"></script>  
<script type="text/javascript" src="<?=base_url();?>assets/vendor/architectui/scripts/custom.js"></script>

</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow bg-grow-dark-gradient header-text-light">
    <?php $this->load->view('header'); ?>
    </div>        
    <div class="app-main">
                <!-- Sidebar  -->
                <?php $this->load->view('nav'); ?>
                <!-- End Sidebar -->
                <div class="app-main__outer">
                <!-- Content -->
                <div class="app-main__inner">
                        <div id="loading" class="buttonload load">
                        <i class="pe-7s-refresh-2 fa-spin load-spinner"></i>
                        </div>
                        <div id="content">
                            <?=$this->load->view($content);?>
                        </div>
                </div>
                <!-- End Content -->
                </div>
    </div>

    <div class="app-wrapper-footer">
        <div class="app-footer">
            <div class="app-footer__inner">
                <div class="app-footer-right">
                    <ul class="nav">
                        <li class="nav-item">
                            Copyright@<a href="#" style="color: #8dc73d;">BidanAndalan_Ta</a> 
                        </li>                                        
                    </ul>
                </div>
            </div>
        </div>
    </div>    
</div>

</body>
</html>
