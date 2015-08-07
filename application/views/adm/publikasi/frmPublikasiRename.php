<?php //You can use this variable from c_aplikasi
    // $id, $parentId, $folderName, $dirFolder
?>
<script>
    $('#detailModal').on('shown.bs.modal', function () {
        $('#pNewFolder').focus();
    })
</script>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="gridSystemModalLabel">Ubah Nama File Publikasi</h4>
</div>
<form method="POST" action="<?php echo site_url();?>/administrator/c_publikasi/publikasiRenameSave"> 
    <input type="hidden" name="pId" value="<?php echo $id;?>"/>
    <input type="hidden" name="pOldFile" value="<?php echo $fileName;?>"/>
    <div class="modal-body">
    
        <div class="row">
            <div class="col-xs-3"> Nama File Lama</div>    
            <div class="col-xs-6">
                <?php echo $fileName;?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3"> Nama File Baru</div>    
            <div class="col-xs-6">
                <input class="form-control" type="text" id="pNewFileName" name="pNewFileName" placeholder="Masukkan Nama File Baru" required="" autofocus="autofocus" />
            </div>
        </div>
        
    </div>

<div class="modal-footer">
    <button class="btn btn-success" type="submit" name="pSubmit">SIMPAN</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
</div>
</form>
