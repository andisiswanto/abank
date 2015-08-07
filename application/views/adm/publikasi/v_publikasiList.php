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
                        <th>PUBLIKASI</th>
                        <th>ACTION</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($tabel as $tbl){
                            $id_pub=$tbl->id_pub;
                            $judul_pub=$tbl->judul_pub;
                            $isi_pub=$tbl->isi_pub;
                            $fileurl=$tbl->fileurl;
                            ?>
                            <tr>
                                <td><?php echo $id_pub;?></td>
                                <td><?php echo $judul_pub;?></td>
                                <td width="30%">
                                    <button class="btn btn-success" id="download" onclick="download('<?php echo $fileurl;?>')">DOWNLOAD</button>
                                    <button class="btn btn-info" id="detail" onclick="cekDetail('<?php echo $id_pub;?>')">DETAIL</button>
                                    <!--<button class="btn btn-warning" id="edit" onclick="edit('<?php echo $id_pub;?>')">EDIT</button>-->
                                    <button class="btn btn-success" id="rename" onclick="rename('<?php echo $id_pub;?>','<?php echo $judul_pub;?>')">R</button>
                                    <button class="btn btn-danger" id="delete" onclick="removeFile('<?php echo $id_pub;?>','<?php echo $judul_pub;?>','<?php echo $fileurl; ?>')">X</button>
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
                $.post("<?= site_url() ?>/administrator/c_publikasi/publikasiDetail", {
                    kode : kode
                },
                function(data) {
                    $('#isiModal').html(data);
                    $('#detailModal').modal('show');
                }
                );
            }
            function edit(kode){
                $.post("<?= site_url() ?>/administrator/c_publikasi/publikasiEdit", {
                    kode : kode
                },
                function(data) {
                    $('#page').html(data);
                    //$('#detailModal').modal('show');
                }
                );
            }
            function add(){
                $.post("<?= site_url() ?>/administrator/c_publikasi/publikasiAdd", {
                },
                function(data) {
                    $('#isiModal').html(data);
                    $('#detailModal').modal('show');
                }
                );
            }
            function rename(id,fileName){
                $.post("<?= site_url() ?>/administrator/c_publikasi/publikasiRename", {
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
                    window.location = url+"/administrator/c_publikasi/publikasiDelete?id="+id+"&fileName="+fileName+"&fileUrl="+fileUrl;
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
