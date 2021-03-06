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
    <h4 class="modal-title" id="gridSystemModalLabel">New Folder <?php echo $parentId;?></h4>
</div>
<form method="POST" action="<?php echo site_url();?>/administrator/c_aplikasi/renameFolderSave"> 
    <input type="hidden" name="pId" value="<?php echo $id;?>"/>
    <input type="hidden" name="pParentId" value="<?php echo $parentId;?>"/>
    <input type="hidden" name="pDirektori" value="<?php echo $direktori;?>"/>
    <input type="hidden" name="pOldFolder" value="<?php echo $folderName;?>"/>
    <input type="hidden" name="pDirFolder" value="<?php echo $dirFolder;?>"/>
    <div class="modal-body">
    
        <div class="row">
            <div class="col-xs-3"> Folder Lama</div>    
            <div class="col-xs-6">
                <?php echo $folderName;?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3"> Folder Baru</div>    
            <div class="col-xs-6">
                <input class="form-control" type="text" id="pNewFolder" name="pNewFolder" placeholder="Masukkan nama Folder Baru" required="" autofocus="autofocus" />
            </div>
        </div>
        
    </div>

<div class="modal-footer">
    <button class="btn btn-success" type="submit" name="pSubmit">SIMPAN</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
</div>
</form>
