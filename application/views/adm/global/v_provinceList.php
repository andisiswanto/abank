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
            <!--<button class="btn btn-success" id="add" onclick="add()">ADD</button>-->
                <table id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                        <th>KODE</th>
                        <th>PROVINSI</th>
                        <th>ACTION</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($tabel as $tbl){
                            $id_provinsi=$tbl->id_provinsi;
                            $nama_provinsi=$tbl->nama_provinsi;
                            ?>
                            <tr>
                                <td><?php echo $id_provinsi;?></td>
                                <td><?php echo $nama_provinsi;?></td>
                                <td>
                                    <button class="btn btn-info" id="detail" onclick="cekDetail('<?php echo $id_provinsi;?>')">DETAIL</button>
                                    <button class="btn btn-warning" id="edit" onclick="edit('<?php echo $id_provinsi;?>')">EDIT</button>
                                    <button class="btn btn-info" id="detail" onclick="showCityFromParent('<?php echo $id_provinsi;?>')"> LIST KOTA</button>
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
            function showCityFromParent(kode){
                $.post("<?= site_url() ?>/administrator/c_global/showCityFromParent", {
                    kode : kode
                },
                function(data) {
                    //$('#isiModal').html(data);
                    //$('#detailModal').modal('show');
                    $('#page').html(data);
                }
                );
            }
            function cekDetail(kode){
                $.post("<?= site_url() ?>/administrator/c_global/provinceDetail", {
                    kode : kode
                },
                function(data) {
                    $('#isiModal').html(data);
                    $('#detailModal').modal('show');
                }
                );
            }
            function edit(kode){
                $.post("<?= site_url() ?>/administrator/c_global/provinceEdit", {
                    kode : kode
                },
                function(data) {
                    $('#page').html(data);
                    //$('#detailModal').modal('show');
                }
                );
            }
            function add(){
                $.post("<?= site_url() ?>/administrator/c_global/provinceAdd", {
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
