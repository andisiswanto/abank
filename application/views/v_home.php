<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo base_url();?>img/1.jpg" alt="Gambar Pertama"/>
      <div class="container">
        <div class="carousel-caption hidden-xs">
      	  <h1>Judul Gambar</h1>
          <p>Keterangan gambar... wes pokoke keterangan teko gambar iki</p>
          <a href="#" class="btn btn-success">Telusuri</a>
        </div>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo base_url();?>img/2.jpg" alt="Gambar Ke Dua">
    </div>
    <div class="item">
      <img src="<?php echo base_url();?>img/3.jpg" alt="Gambar Ke Tiga">
    </div>
    <div class="item">
      <img src="<?php echo base_url();?>img/4.jpg" alt="Gambar Ke Empat">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
</div>




<!--
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header">Berita Harian</h1>
        
        <?php
        foreach($berita as $brt){
            $idBerita=$brt->id_berita;
            $judul=$brt->judul_berita;
            $tglPosting=$brt->tgl_posting;
                $tgl=substr($tglPosting,8,2);
                $bln=substr($tglPosting,5,2);
                $thn=substr($tglPosting,0,4);
            $isi=$brt->isi;
            $potongIsi=substr($isi,0,200)."...";
            $gambar=$brt->picurl;
        ?>
      	  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="col-xs-12">
              <a href="#">
              <b><?php echo $judul;?></b></a>
            </div>
            <div class="col-xs-12">
              <h5><small><?php echo tgl_indo($tgl."-".$bln."-".$thn);?></small></h5>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-3 col-xs-5 hidden-xs">
              <img class="img-responsive img-rounded" src="<?php echo base_url();?><?php echo $gambar;?>" alt=""/>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-9 col-xs-12">
              <p class="text-justify">
              <?php echo $potongIsi;?>
              <a href="#" class="btn btn-default pull-right">Detail &raquo;</a>
              </p>
            </div>
          </div>
         <?php
         }
         ?> 
      </div>
      
    </div>
    
    
    
  </div>
</div>
-->


<div class="container voffset2">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
      <div class="col-lg-12"><h1 class="page-header">Berita Harian</h1>
      	  <?php
            foreach($berita as $brt){
                $idBerita=$brt->id_berita;
                $judul=$brt->judul_berita;
                $tglPosting=$brt->tgl_posting;
                    $tgl=substr($tglPosting,8,2);
                    $bln=substr($tglPosting,5,2);
                    $thn=substr($tglPosting,0,4);
                $isi=$brt->isi;
                $potongIsi=substr($isi,0,200)."...";
                $gambar=$brt->picurl;
            ?>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 box">
            <div class="col-xs-12">
              <a href="#">
              <h3><?php echo $judul;?></h3></a>
            </div>
            <div class="col-xs-12">
              <h5><small><?php echo tgl_indo($tgl."-".$bln."-".$thn);?></small></h5>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-3 col-xs-5 hidden-xs">
              <img class="img-responsive img-rounded" src="<?php echo base_url();?><?php echo $gambar;?>" alt="">
            </div>
            <div class="col-lg-7 col-md-6 col-sm-9 col-xs-12">
              <p class="text-justify"><?php echo $potongIsi;?> 
                  <!--<a href="#" class="btn btn-default pull-right">Baca &raquo;</a>-->
                  <a class="btn btn-info pull-right" href="<?php echo site_url();?>/c_berita/bHarianViewDetail?kode=<?php echo $idBerita;?>" >BACA</a>
              </p>
            </div>
          </div>
          <?php
         }
         ?> 
      </div>
    </div>
    
    
    
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="list-group box voffset2">
            <a href="#" class="list-group-item active">Agenda</a>
            <?php
            foreach($agenda as $agn){
                $judulA=$agn->judul_agenda;
                $tglPostingA=$agn->inserttime;
                    $tglA=substr($tglPostingA,8,2);
                    $blnA=substr($tglPostingA,5,2);
                    $thnA=substr($tglPostingA,0,4);
    			$tglStartA=$agn->tgl_start;
                    $tglSA=substr($tglStartA,8,2);
                    $blnSA=substr($tglStartA,5,2);
                    $thnSA=substr($tglStartA,0,4);
                $isiA=$agn->isi;
                $potongIsiA=substr($isi,0,300)."...";
                $insertbyA=$agn->insertby;
    			$usrnameA=$agn->usrname;
    		?>  
            <a href="#" class="list-group-item"><em><small><?php echo $tglSA;?>/<?php echo $blnSA;?>/<?php echo $thnSA;?></small></em>
            &nbsp;&nbsp;<?php echo $judulA;?></a>
            <?php
            }
            ?>
            <a href="<?php echo site_url();?>/c_berita/agendaView" class="list-group-item"><em><small>Lebih Banyak</small></em></a>
      </div>
    </div>
    
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <ul class="list-group box voffset2">
        <li class="list-group-item list-group-item-heading"><a href="k_utama.html">Kegiatan Utama</a></li>
        <?php
        foreach($kegiatan as $kgt){
            $judulK=$kgt->judul_kegiatan;
            $tglPostingK=$kgt->tgl_posting;
                $tglK=substr($tglPostingK,8,2);
                $blnK=substr($tglPostingK,5,2);
                $thnK=substr($tglPostingK,0,4);
            $isiK=$kgt->isi;
            $potongIsiK=substr($isiK,0,60)."...";
            $gambarK=$kgt->picurl;
        ?>
        <li class="list-group-item">
        <div class="col-xs-4">
        <em><small><img class="img-responsive img-rounded" src="<?php echo base_url();?><?php echo $gambarK;?>" alt=""/></small></em>
        </div>
        
        &nbsp;&nbsp;<?php echo $potongIsiK;?></li>
        <?php
        }
        ?>
        <li class="list-group-item"><em><small><a href="<?php echo site_url();?>/c_berita/kegiatanView">Lebih Banyak</a></small></em></li>
      </ul>
    </div>
    
    
    
    <!--
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <ul class="list-group box voffset2">
        <li class="list-group-item list-group-item-heading"><a href="d_sop.html">Dokumen SOP</a></li>
        <?php
        foreach($sop as $sp){
            $judulSO=$sp->judul_sop;
			$inserttimeSO=$sp->inserttime;
                $tglSO=substr($inserttimeSO,8,2);
                $blnSO=substr($inserttimeSO,5,2);
                $thnSO=substr($inserttimeSO,0,4);
            $fileurlSO=$sp->fileurl;
		?>  
        
        <li class="list-group-item"><?php echo $judulSO;?></li>
        <?php
        }
        ?>
        <li class="list-group-item"><a href="<?php echo site_url();?>/c_dokumen/sopView"> Lebih Banyak</a></li>
      </ul>
    </div>
    -->
  </div>
</div>