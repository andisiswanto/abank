<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <title>Direktorat ESDM</title>


    </head>
    <body>
        <div  id="page" class="container theme-showcase" role="main">
            <br /><br /><br />

            <div class="container">
            <button class="btn btn-success" id="add" onclick="add()">ADD</button>
            <button class="btn btn-info" id="back" onclick="back();"> BACK </button>
                <table id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                        <th>KODE</th>
                        <th>KOTA</th>
                        <th>ACTION</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($tabel as $tbl){
                            $id_kota=$tbl->ID_KOTA;
                            $nama_kota=$tbl->NAMA_KOTA;
                            ?>
                            <tr>
                                <td><?php echo $id_kota;?></td>
                                <td><?php echo $nama_kota;?></td>
                                <td>
                                    <button class="btn btn-info" id="detail" onclick="cekDetail('<?php echo $id_kota;?>')">DETAIL</button>
                                    <button class="btn btn-warning" id="edit" onclick="edit('<?php echo $id_kota;?>')">EDIT</button>
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
                    $('#example').dataTable();
            } );
        </script>
        <script>
            function back(parentId){
                var url="<?php echo site_url();?>";
                window.location=url+"/administrator/c_global/province";
            }
            function cekDetail(kode){
                $.post("<?= site_url() ?>/administrator/c_global/cityDetail", {
                    kode : kode
                },
                function(data) {
                    $('#isiModal').html(data);
                    $('#detailModal').modal('show');
                }
                );
            }
            function edit(kode){
                $.post("<?= site_url() ?>/administrator/c_global/cityEdit", {
                    kode : kode
                },
                function(data) {
                    $('#page').html(data);
                    //$('#detailModal').modal('show');
                }
                );
            }
            function add(){
                $.post("<?= site_url() ?>/administrator/c_global/cityAdd", {
                },
                function(data) {
                    $('#page').html(data);
                    //$('#detailModal').modal('show');
                }
                );
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
