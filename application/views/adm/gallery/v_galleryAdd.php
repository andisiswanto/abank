<div class="container theme-showcase" role="main">
<br /><br /><br />

<form method="POST" action="<?php echo site_url();?>/c_gallery/galleryAddSave">
<div class="row">
    <div class="col-md-7">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Folder</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-3">
                        Folder Baru
                    </div>
                    <div class="col-xs-9">
                        <input class="form-control" type="text" name="judul_gallery" required=""/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        File :
                    </div>
                </div>
                <?php 
                for($x=0;$x<10;$x++){
                ?>
                    <div class="row">
                        <div class="col-xs-3">
                            <?php echo $x+1;?>
                        </div>
                        <div class="col-xs-9">
                            <input type="file" name="file<?php echo $x;?>" required=""/>
                        </div>
                    </div>
                <?php    
                }
                ?>
                
            </div>
            
        </div>
    </div>
    <div class="col-md-5">
                <button class="btn btn-lg btn-danger pull-right" type="submit" name="pSubmit">SIMPAN</button>
    </div>
</div>


</form>
</div>

