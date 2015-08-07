<script>
    $('#detailModal').on('shown.bs.modal', function () {
        $('#pFileName').focus();
    })
</script>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="gridSystemModalLabel">Tambah Data & Informasi Baru</h4>
</div>
<form method="POST" action="<?php echo site_url();?>/administrator/c_info/infoAddSave" enctype="multipart/form-data"> 
<div class="modal-body">
    
    <div class="row">
                    <div class="col-xs-3">
                        Nama File
                    </div>    
                    <div class="col-xs-6">
                        <input class="form-control" type="text" id="pFileName" name="pFileName" placeholder="Masukkan nama File" required="" autofocus="autofocus" />
                    </div>
    </div>
    <br>
    <div class="row">
                    <div class="col-xs-3">
                        Deskripsi
                    </div>    
                    <div class="col-xs-6">
                        <textarea rows="10" class="form-control" type="text" id="pFileDeskripsi" name="pFileDeskripsi" placeholder="Masukkan deskripsi" required=""></textarea>
                    </div>
    </div>
    <br>
    <div class="row">
                    <div class="col-xs-3">
                        Upload File
                    </div> 
                    <div class="col-xs-6">
                        <input class="file" type="file" id="pFileUpload" name="pFileUpload" />
                    </div>
    </div>
</div>

<div class="modal-footer">
    <button class="btn btn-success" type="submit" name="pSubmit">SIMPAN</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
</div>
</form>
