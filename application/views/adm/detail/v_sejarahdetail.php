<?php
    foreach($tabelDetail as $det){
        $judul=$det->judul_sejarah;
        $deskripsi=$det->deskripsi;
    }
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="gridSystemModalLabel"><?php echo $judul;?></h4>
</div>
        
<div class="modal-body">
    <?php
    echo $deskripsi;
    ?>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
</div>