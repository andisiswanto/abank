<?php
//$parentId=$parent_id;
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <title>Direktorat ESDM</title>


    </head>
    <body>
        <div  id="page" class="container theme-showcase" role="main">
            <br /><br /><br />

            <div class="container">
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
                <button class="btn btn-success" id="add" onclick="add()">ADD</button>
                <table id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                        <th>KODE</th>
                        <th>DATA / INFORMASI</th>
                        <th>ACTION</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($tabel as $tbl){
                            $id_data=$tbl->id_data;
                            $judul_data=$tbl->judul_data;
                            $isi_data=$tbl->isi_data;
                            $fileurl=$tbl->fileurl;
                            ?>
                            <tr>
                                <td><?php echo $id_data;?></td>
                                <td><?php echo $judul_data;?></td>
                                <td>
                                    <button class="btn btn-success" id="download" onclick="download('<?php echo $fileurl;?>')">DOWNLOAD</button>
                                    <button class="btn btn-info" id="detail" onclick="cekDetail('<?php echo $id_data;?>')">DETAIL</button>
                                    <!--<button class="btn btn-warning" id="edit" onclick="edit('<?php echo $id_data;?>')">EDIT</button>-->
                                    <button class="btn btn-success" id="rename" onclick="rename('<?php echo $id_data;?>','<?php echo $judul_data;?>')">R</button>
                                    <button class="btn btn-danger" id="delete" onclick="removeFile('<?php echo $id_data;?>','<?php echo $judul_data;?>','<?php echo $fileurl; ?>')">X</button>
                                </td>
                            </tr>  
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

            
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#example').dataTable(
//                        'pSort' => true;
                );
            } );
        </script>
        <script>
            function download(url){
                var base_url = "<?php echo base_url();?>";
                console.log(base_url);
                top.location.href = base_url+url;
            }
            function cekDetail(kode){
                $.post("<?= site_url() ?>/administrator/c_info/infoDetail", {
                    kode : kode
                },
                function(data) {
                    $('#isiModal').html(data);
                    $('#detailModal').modal('show');
                }
                );
            }
            function edit(kode){
                $.post("<?= site_url() ?>/administrator/c_info/infoEdit", {
                    kode : kode
                },
                function(data) {
                    $('#page').html(data);
                    //$('#detailModal').modal('show');
                }
                );
            }
            function add(){
                $.post("<?= site_url() ?>/administrator/c_info/infoAdd", {
                },
                function(data) {
                    $('#isiModal').html(data);
                    $('#detailModal').modal('show');
                }
                );
            }
            function rename(id,fileName){
                $.post("<?= site_url() ?>/administrator/c_info/infoRename", {
                    id : id,
                    fileName : fileName
                },
                function(data) {
                    $('#isiModal').html(data);
                    $('#detailModal').modal('show');
                }
                );
            }
            function removeFile(id,fileName,fileUrl){
                var url="<?php echo site_url();?>";
                var r=confirm("Yakin ingin menghapus file ["+fileName+"] ?");
                if (r==true)
                    window.location = url+"/administrator/c_info/infoDelete?id="+id+"&fileName="+fileName+"&fileUrl="+fileUrl;
                else return false;
            }
        </script>            

        <script type="text/javascript">
            // For demo to fit into DataTables site builder...
            $('#example')
                    .removeClass( 'display' )
                    .addClass('table table-striped table-bordered');
        </script>
    </body>
</html>



<!-- DETAIL MODAL -->
<div id="detailModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div id="isiModal">
        </div>
    </div>
  </div>
</div>
