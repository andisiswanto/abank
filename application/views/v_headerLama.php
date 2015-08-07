<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css"/>
    <!--
<link rel="icon" href="favicon.ico"/>
    <link href="<?php echo base_url();?>dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/css/dataTables.bootstrap.css"/>
    <link href="<?php echo base_url();?>dist/css/bootstrap-theme.min.css" rel="stylesheet"/>


    <script src="<?php echo base_url();?>assets/js/ie-emulation-modes-warning.js"></script>
-->

		



<nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
      <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="col-xs-2">
      <a href="<?php echo site_url();?>/c_main" >
        <img class="img-responsive img-rounded" style="height: 50; width: 60;" src="<?php echo base_url();?>img/bappenas.png" alt=""/>
      </a>
      
      </div>
      <div class="col-xs-9">
      <label style="color: white; outline-color: white;">
      Direktorat Sumber Daya Energi,<br />
      Mineral Dan Pertambangan<br />
      </label>
      
      </div>
    </div>
        <!-- Collection of nav links and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo site_url();?>/c_main">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Berita <span class="fa fa-angle-down"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url();?>/c_berita/bHarianView">Berita Harian</a></li>
            <!--<li><a href="<?php echo site_url();?>/c_berita/bInternalView">Berita Intenal</a></li>-->
            <li><a href="<?php echo site_url();?>/c_berita/agendaView">Agenda</a></li>
            <li><a href="<?php echo site_url();?>/c_berita/kegiatanView">Kegiatan Utama</a></li>
          </ul>
        </li>
        <!--<li><a href="<?php echo site_url();?>/c_gallery/galleryView">Galeri</a></li>-->
        
        <li><a href="<?php echo site_url();?>/c_dokumen/dataView">Data &amp; Informasi</a></li>
        <li><a href="<?php echo site_url();?>/c_dokumen/publikasiView">Publikasi</a></li>
        <!--
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Dokumen <span class="fa fa-angle-down"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url();?>/c_dokumen/pidatoView">Dokumen Pidato</a></li>
            <li><a href="<?php echo site_url();?>/c_dokumen/sopView">Dokumen SOP</a></li>
          </ul>
        </li>
        -->
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Profil <span class="fa fa-angle-down"></span></a>
          <ul class="dropdown-menu">
            <!--<li><a href="<?php echo site_url();?>/c_profile/sejarahView">Sejarah</a></li>-->
            <li><a href="<?php echo site_url();?>/c_profile/visiView">Visi &amp; Misi</a></li>
            <li><a href="<?php echo site_url();?>/c_profile/tupoksiView">Tupoksi</a></li>
            <li><a href="<?php echo site_url();?>/c_profile/strukturView">Struktur Organisasi</a></li>
            <li><a href="<?php echo site_url();?>/c_profile/pDaerahView">Profil Daerah</a></li>
          </ul>
        </li>
        <li><a href="<?php echo site_url();?>/c_profile/kontakForm">Hubungi kami</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Aplikasi <span class="fa fa-angle-down"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://bankithouse.com/esimiga/">E-Simiga</a></li>
            <li><a href="http://geothermal.bappenas.go.id/">Geothermal</a></li>
            <!--<li><a href="<?php echo site_url();?>/c_internal/dataInternal">Link Internal</a></li>-->
            <li><a href="<?php echo site_url();?>/c_login/logon">Link Internal</a></li>
          </ul>
        </li>
        <?php
        if(isset($_SESSION['usernameD']) && isset($_SESSION['isadminD'])){ 
        ?>
            <li>
            <a href="<?php echo site_url();?>/c_login/logout">logout</a>
            </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>













<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>-->
<!--<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.js"><\/script>')</script>-->
<script src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.js"></script>


 <!-- Bootstrap core JavaScript
    <script src="<?php echo base_url();?>dist/js/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo base_url();?>dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/docs.min.js"></script>
    <script src="<?php echo base_url();?>dist/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>dist/js/dataTables.bootstrap.js"></script>
        
    <script src="<?php echo base_url();?>assets/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>ckfinder24/ckfinder.js"></script>

-->