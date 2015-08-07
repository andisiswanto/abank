<?php
    foreach($tabelDetail as $tbl){
        $id_pub=$tbl->id_pub;
        $judul_pub=$tbl->judul_pub;
        $isi_pub=$tbl->isi_pub;
        $fileurl=$tbl->fileurl;
    }
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="gridSystemModalLabel">DETAIL DATA & INFORMASI</h4>
</div>
        
<div class="modal-body">
    <div class="row">
        <div class="col-xs-2">ID</div>
        <div class="col-xs-10">: <?php echo $id_pub;?></div>
    </div>
    <div class="row">
        <div class="col-xs-2">Publikasi</div>
        <div class="col-xs-10">: <?php echo $judul_pub;?></div>
    </div>
    <div class="row">
        <div class="col-xs-2">Deskripsi</div>
        <div class="col-xs-10">: <?php echo $isi_pub;?></div>
    </div>
    <div class="row">
        <div class="col-xs-2">Link Download</div>
        <div class="col-xs-10">: <?php echo base_url().$fileurl;?></div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
</div>