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


<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
    <!--<nav id="navbar-example" class="navbar navbar-default navbar-static">-->
    
    
      <div class="container">
      
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin</a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <!--<li class="active"><a href="#">Beranda</a></li>-->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" >Transaksi<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url();?>/administrator/c_mutasi/mutasi">List Mutasi</a></li>
              </ul>
            </li>            
          </ul>
        </div><!--/.nav-collapse -->
        
      </div>
    </nav>
    
















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