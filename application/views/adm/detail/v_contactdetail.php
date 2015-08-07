<?php
    foreach($tabelDetail as $det){
        $ctcname=$det->ctcname;
        $ctcaddress=$det->ctcaddress;
        $ctcphone=$det->ctcphone;
        $ctcemail=$det->ctcemail;
        $ctcfax=$det->ctcfax;
        $ctczip=$det->ctczip;
        $ctcdeskripsi=$det->ctcdeskripsi;
    }
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="gridSystemModalLabel"><?php echo $ctcname;?></h4>
</div>
        
<div class="modal-body">
    <div class="row">
        <div class="col-xs-2">Alamat Lengkap</div>
        <div class="col-xs-10">: <?php echo $ctcaddress;?></div>
    </div>
    <div class="row">
        <div class="col-xs-2">No. Telp</div>
        <div class="col-xs-10">: <?php echo $ctcphone;?></div>
    </div>
    <div class="row">
        <div class="col-xs-2">No. Fax</div>
        <div class="col-xs-10">: <?php echo $ctcfax;?></div>
    </div>
    <div class="row">
        <div class="col-xs-2">Email</div>
        <div class="col-xs-10">: <?php echo $ctcemail;?></div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
</div>