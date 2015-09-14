<head>
<link rel="icon" href="favicon.ico"/>
<!-- Bootstrap core CSS -->
<link href="<?php echo base_url();?>dist/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/css/dataTables.bootstrap.css"/>
<!-- Bootstrap theme -->
<link href="<?php echo base_url();?>dist/css/bootstrap-theme.min.css" rel="stylesheet"/>


<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="<?php echo base_url();?>assets/js/ie-emulation-modes-warning.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bootstrap332/dist/css/datepicker.css"/>

<!-- CHART -->
<link rel="stylesheet" href="<?php echo base_url();?>librari/chart/morris/morris051.css">
<link rel="stylesheet" href="<?php echo base_url();?>librari/chart/morris/my.css">

<!-- MULTISELECT -->
<link rel="stylesheet" href="<?php echo base_url();?>librari/selection/bootstrapMultiselect/bootstrap-multiselect.css">

<!-- FOOTER -->
<link href="<?php echo base_url();?>dist/css/footer/sticky-footer.css" rel="stylesheet"/>

<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

<style>
    //body { padding-top: 70px;}
</style>
</head>
<body>
<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
    <!--<nav id="navbar-example" class="navbar navbar-default navbar-static">-->
    
    
      <div class="container">
      
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand active" href="<?php echo site_url();?>/administrator/c_main">Admin</a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <!--<li class="active"><a href="#">Beranda</a></li>-->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" >Abank<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url();?>/administrator/c_mutasi/mutasi">Mutasi</a></li>
                <li><a href="<?php echo site_url();?>/administrator/c_mutasi/mutasiHarian">Mutasi Harian</a></li>
                <li><a href="<?php echo site_url();?>/administrator/c_mutasi/utangku">Mutasi Utang</a></li>
                <li><a href="<?php echo site_url();?>/administrator/c_mutasi/utangkuHarian">Mutasi Utang Harian</a></li>
              </ul>
            </li> 
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" >Asoka<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url();?>/administrator/c_asoka/mutasi">Mutasi</a></li>
                <li><a href="<?php echo site_url();?>/administrator/c_asoka/mutasiHarian">Mutasi Harian</a></li>
              </ul>
            </li> 
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" >Laporan<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url();?>/administrator/c_report/mutasi">Mutasi Bulanan</a></li>
                <li><a href="<?php echo site_url();?>/administrator/c_report/utang">Utang Bulanan</a></li>
                <li><a href="<?php echo site_url();?>/administrator/c_report/asoka">Asoka Bulanan</a></li>
              </ul>
            </li>
            <li><a href="<?php echo site_url();?>/administrator/c_login/logout"><i>Logout</i></a></li>
          </ul>
        </div><!--/.nav-collapse -->
        
      </div>
    </nav>
    

</body>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>dist/js/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo base_url();?>dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/docs.min.js"></script>
    <script src="<?php echo base_url();?>dist/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>dist/js/dataTables.bootstrap.js"></script>
        
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url();?>assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-------CKEDITORFINDER---->
    <!--<link href="<?php echo base_url();?>ckeditor/ckeditor.css" rel="stylesheet" type="text/css" />-->
    <script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>ckfinder24/ckfinder.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>dist/js/bootstrap-datepicker.js"></script>
    

<script src="<?php echo base_url();?>librari/chart/morris/raphael212-min.js"></script>
<script src="<?php echo base_url();?>librari/chart/morris/morris051.js"></script>
<script src="<?php echo base_url();?>librari/selection/bootstrapMultiselect/bootstrap-multiselect.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>jssorSlider/js/jssor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>jssorSlider/js/jssor.slider.js"></script>