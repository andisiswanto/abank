<style>
.custom-height-modal {
  height: 400px;
}
</style>
    
<script>
            function newFolder(parentId,direktori){
                $.post("<?= site_url() ?>/administrator/c_aplikasi/makeNewFolder", {
                    parentId : parentId,
                    direktori : direktori
                },
                function(data) {
                    $('#isiModal').html(data);
                    $('#detailModal').modal('show');
                }
                );
            }
            function newFile(parentId,direktori){
                $.post("<?= site_url() ?>/administrator/c_aplikasi/makeNewFile", {
                    parentId : parentId,
                    direktori : direktori
                },
                function(data) {
                    $('#isiModal').html(data);
                    $('#detailModal').modal('show');
                }
                );
            }
            function renameFolder(parentId,direktori,id,folderName,dirFolder){
                $.post("<?= site_url() ?>/administrator/c_aplikasi/renameFolder", {
                    id : id,
                    parentId : parentId,
                    direktori : direktori,
                    folderName : folderName,
                    dirFolder : dirFolder
                },
                function(data) {
                    $('#isiModal').html(data);
                    $('#detailModal').modal('show');
                }
                );
            }
            function renameFile(parentId,direktori,id,fileName,dirFolder){
                $.post("<?= site_url() ?>/administrator/c_aplikasi/renameFile", {
                    id : id,
                    parentId : parentId,
                    direktori : direktori,
                    fileName : fileName,
                    dirFolder : dirFolder
                },
                function(data) {
                    $('#isiModal').html(data);
                    $('#detailModal').modal('show');
                }
                );
            }
            function deleteFolder(parentId,id,folderName,dirFolder){
                var url="<?php echo site_url();?>";
                var r=confirm("Yakin ingin menghapus folder "+folderName+" ?");
                if (r==true)
                    window.location = url+"/administrator/c_aplikasi/deleteFolder?parentId="+parentId+"&id="+id+"&dirFolder="+dirFolder;
                else return false;
            }
            function deleteFile(parentId,id,fileName,fileNameExt,dirFolder){
                var url="<?php echo site_url();?>";
                var r=confirm("Yakin ingin menghapus file ["+fileName+"] ?");
                if (r==true)
                    window.location = url+"/administrator/c_aplikasi/deleteFile?parentId="+parentId+"&id="+id+"&dirFolder="+dirFolder+"&fileNameExt="+fileNameExt;
                else return false;
            }
            
            function back(parentId){
                var url="<?php echo site_url();?>";
                window.location=url+"/administrator/c_aplikasi/linkinternal?id="+parentId;
            }
</script>
</script>
<?php
$parentId=$parent_id;
?>
<div class="container theme-showcase" role="main"> 
    <br><br><br>

    <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <?php
            if(isset($_GET['alt'])){
                $alertCode=$_GET['alt'];
                if($alertCode==0){ $color="success"; }
                else{ $color="danger"; }
                ?>
                <div class="alert alert-<?php echo $color;?>" role="alert"><?php echo $_GET['msg'];?></div>
                <?php
            }
            ?>
                
            <button class="btn btn-warning" id="newFolder" onclick="newFolder('<?php echo $parentId;?>','<?php echo $direktori;?>')">NEW FOLDER</button>
            <button class="btn btn-default" id="newFile" onclick="newFile('<?php echo $parentId;?>','<?php echo $direktori;?>')">NEW FILE</button>
            <?php
            if(!empty($parentId) || $parentId!=0){
                ?>
                <button class="btn btn-info" id="back" onclick="back('<?php echo $backDir ;?>');"> BACK </button>
                <?php
            }
            ?>
        <div class="page-header">
            <h1>Link Internal</h1>
            <?php echo "Location : ".$direktori;?>
        </div>
        <?php
        foreach($internal as $i){
            $id=$i->id;
            $parent_id=$i->parent_id;
            $description=$i->description;
            $dir=$i->dir;
            $dirFolder=$dir.$description;
            $type=$i->type;
            $filelocation=$i->filelocation;
            $filename=$i->filename;
            
            $parentDir="doc/internal/";
	?>
        
       <?php
       if($type=='f'){
           ?>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <button class="btn btn-warning btn-lg">
                  <div class="text-center">
                    <?php echo strtoupper(substr($description,0,1));?><br/>
                  </div>
              </button>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
              <h4>
                <a href="<?php echo site_url();?>/administrator/c_aplikasi/linkinternal?id=<?php echo $id;?>">
                <?php echo $description;?></a>
                  <button class="btn btn-success btn-small" onclick="renameFolder('<?php echo $parent_id;?>','<?php echo $direktori;?>','<?php echo $id;?>','<?php echo $description;?>','<?php echo $dirFolder;?>');">R</button>
                  <button class="btn btn-danger btn-small" onclick="deleteFolder('<?php echo $parent_id;?>','<?php echo $id;?>','<?php echo $description;?>','<?php echo $dirFolder;?>');">X</button>
              </h4>
              <hr/>
              
            </div>
          </div>
          
        </div>
          
          <?php
       }
       else{
           ?>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
              <button class="btn btn-default btn-lg">
                  <div class="text-center">
                    <?php echo strtoupper(substr($description,0,1));?><br/>
                  </div>
              </button>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
              <h4>
                <a href="<?php echo base_url($parentDir.$filelocation);?>">
                <?php echo $description;?></a>
                  <button class="btn btn-success btn-small" onclick="renameFile('<?php echo $parent_id;?>','<?php echo $direktori;?>','<?php echo $id;?>','<?php echo $description;?>','<?php echo $dirFolder;?>');">R</button>
                  <button class="btn btn-danger btn-small" onclick="deleteFile('<?php echo $parent_id;?>','<?php echo $id;?>','<?php echo $description;?>','<?php echo $parentDir.$filelocation;?>','<?php echo $dirFolder;?>');">X</button>
              </h4>
              <hr/>
              
            </div>
          </div>
          
        </div>
          <?php
       }
       ?>
          
          
        
          
        <?php
        }
        ?>
        
      </div>
    </div>
  </div>
</div

<!-- DETAIL MODAL -->
<div id="detailModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div id="isiModal">
        </div>
    </div>
  </div>
</div>