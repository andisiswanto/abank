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
    <h4 class="modal-title" id="gridSystemModalLabel">Edit Kontak</h4>
</div>

<form method="POST" action="<?php echo site_url();?>/administrator/c_contact/kontakEditSave">
    <input type="hidden" value="<?php echo $kode;?>" name="pId" id="pId" />
    <div class="modal-body">
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label> Deskripsi </label> 
                    <input value="<?php echo $ctcname;?>" class="form-control" type="text" id="pName" name="pName" required=""  />
                </div>
                <div class="form-group">
                    <label>No. Telp</label>
                    <input value="<?php echo $ctcphone;?>" class="form-control" type="text" id="pPhone" name="pPhone" required=""/>
                </div>
                <div class="form-group">
                    <label>No. Fax</label>
                    <input value="<?php echo $ctcfax;?>" class="form-control" type="text" id="pFax" name="pFax" required=""/>
                </div>
                <div class="form-group">
                    <label>Alamat Email</label>
                    <input value="<?php echo $ctcemail;?>" class="form-control" type="text" id="pEmail" name="pEmail" required=""/>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea rows="8" id="pAddress" name="pAddress" class="form-control"><?php echo $ctcaddress;?></textarea>
                </div>
                <div class="form-group">
                    <label>Kode Pos</label>
                    <input value="<?php echo $ctczip;?>" class="form-control" type="text" id="pZip" name="pZip" required=""/>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="bsubmit" name="pSubmit" class="btn btn-primary">Simpan</button>
    </div>

</form>