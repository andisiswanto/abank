<?php
    foreach($tabelDetail as $tbl){
        $id_data=$tbl->id_data;
        $judul_data=$tbl->judul_data;
        $isi_data=$tbl->isi_data;
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
        <div class="col-xs-10">: <?php echo $id_data;?></div>
    </div>
    <div class="row">
        <div class="col-xs-2">Data & Informasi</div>
        <div class="col-xs-10">: <?php echo $judul_data;?></div>
    </div>
    <div class="row">
        <div class="col-xs-2">Deskripsi</div>
        <div class="col-xs-10">: <?php echo $isi_data;?></div>
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