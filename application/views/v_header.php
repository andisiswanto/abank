<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css"/>
    <!--<link rel="stylesheet" href="<?php echo base_url();?>dist/css/bootstrap.min.css"/>-->
    <link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>css/background.css"/>
    
<div class="container">
    <div class="header header-img">
      	<div class="kotak-judul">
       	  <div><a class="logo" href="<?php echo site_url();?>/c_main"><img src="<?php echo base_url();?>img/bappenas.png" class="img-logo" /></a></div>
       	  <div class="spasi"><a class="judul" href="<?php echo site_url();?>/c_main">Sumber Daya Energi, Mineral, Dan Pertambangan</a></div>
       	</div>
      </div>
      
    <nav role="navigation" class="container navbar navbar-inverse">
        <div class="container"> 
            
                
            <div id="navbarCollapse" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo site_url();?>/c_main">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Berita <span class="fa fa-angle-down"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url();?>/c_berita/bHarianView">Berita Harian</a></li>
                    <li><a href="<?php echo site_url();?>/c_berita/agendaView">Agenda</a></li>
                    <!--<li><a href="<?php echo site_url();?>/c_berita/kegiatanView">Kegiatan Utama</a></li>-->
                  </ul>
                </li>
                
                <li><a href="<?php echo site_url();?>/c_dokumen/dataView">Data &amp; Informasi</a></li>
                <li><a href="<?php echo site_url();?>/c_dokumen/publikasiView">Publikasi</a></li>
                
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Profil <span class="fa fa-angle-down"></span></a>
                  <ul class="dropdown-menu">
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
</div>
		


<!--
<nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
  
</nav>
-->













<script src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.js"></script>
