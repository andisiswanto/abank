
<?php
//$parentId=$parent_id;
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <title>Abank</title>


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
                        <th>Kode</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>ACTION</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($tabel as $tbl){
                            $kode=$tbl->id_mutasi;
                            $date=$tbl->date;
                            $jumlah=$tbl->amount;
                            $type=$tbl->type;
                            $description=$tbl->description;
                            ?>
                            <tr>
                                <td><?php echo $kode;?></td>
                                <td><?php echo tgl_indo($date);?></td>
                                <td align="right"><?php echo "Rp. ".rupiah($jumlah);?></td>
                                <td><?php echo $description;?></td>
                                <td width="30%">
                                    <button class="btn btn-warning" id="detail" onclick="edit('<?php echo $kode;?>')">EDIT</button>
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
                $('#example').dataTable({
                    "aaSorting": [] 
                });
                $('.datepicker').datepicker({
                    format: "yyyy-mm-dd"
                });
            } );
        </script>
        <script>
            function download(url){
                var base_url = "<?php echo base_url();?>";
                console.log(base_url);
                top.location.href = base_url+url;
            }
            function cekDetail(kode){
                $.post("<?= site_url() ?>/administrator/c_mutasi/mutasiDetail", {
                    kode : kode
                },
                function(data) {
                    $('#isiModal').html(data);
                    $('#detailModal').modal('show');
                }
                );
            }
            function edit(kode){
                $.post("<?= site_url() ?>/administrator/c_mutasi/mutasiEdit", {
                    kode : kode
                },
                function(data) {
                    $('#isiModal').html(data);
                    $('#detailModal').modal('show');
                }
                );
            }
            function add(){
                $.post("<?= site_url() ?>/administrator/c_mutasi/mutasiAdd", {
                },
                function(data) {
                    $('#isiModal').html(data);
                    $('#detailModal').modal('show');
                }
                );
            }
            function removeData(id,description){
                var url="<?php echo site_url();?>";
                var r=confirm("Yakin ingin menghapus file ["+description+"] ?");
                if (r==true)
                    window.location = url+"/administrator/c_mutasi/mutasiDelete?id="+id+"&desc="+description;
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
