<?php
    foreach($tabelDetail as $det){
        $judul=$det->judul_struktur;
        $picurl=$det->picurl;
    }
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="gridSystemModalLabel"><?php echo $judul;?></h4>
</div>
        
<div class="modal-body">
    <div class="col-xs-12">
            <img class="img-responsive img-rounded" style="width: 100%;" src="<?php echo base_url();?><?php echo $picurl;?>" alt=""/>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
</div>