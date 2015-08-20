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
                
                <div class="panel panel-info">
                    <div class="panel-heading">Panel Chart</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div id="row">
                                <div class="col-lg-12">
                                    <div id="myfirstchart" class="myclassy"></div>    
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-warning ">
                    <div class="panel-heading">
                      <h3 class="panel-title">Panel Transaksi</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table  id="example" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <th>Tanggal</th>
                                    <th>MASUK</th>
                                    <th>KELUAR</th>
                                    <th>JUMLAH</th>
                                    <th>ACTION</th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($tabel as $tbl){
                                        $date=$tbl->date;
                                        $jumlahIn=$tbl->jumlahTotalIn;
                                        $jumlahOut=$tbl->jumlahTotalOut;
                                        $selisih=$tbl->selisih;
                                        $penandaMinus = substr($selisih,0,1);
                                            if($penandaMinus=="-"){
                                                $minus = "-";
                                            }
                                            else{
                                                $minus = "";
                                            }
                                        ?>
                                        <tr>
                                            <td align="right"><?php echo tgl_indo($date);?></td>
                                            <td align="right"><?php echo "Rp. ".rupiah($jumlahIn);?></td>
                                            <td align="right"><?php echo "Rp. ".rupiah($jumlahOut);?></td>
                                            <td align="right"><?php echo "Rp. ". $minus ." ".ltrim(rupiah($selisih),",");?></td>
                                            <td width="10%">
                                                <button class="btn btn-info" id="detail" onclick="cekDetail('<?php echo $date;?>')">DETAIL</button>
                                            </td>
                                        </tr>  
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
            
            //**CHART**//
            new Morris.Bar({
                element: 'myfirstchart',
                data: [
                    <?php
                        foreach($tabel as $dt){
                            ?>
                            { tahun : "<?php echo tgl_indo($dt->date);?>", value : <?php echo $dt->selisih;?> },
                            <?php
                        }
                    ?>
                ],
                xkey: 'tahun',
                ykeys: ['value'],
                labels: ['Value'],
                xLabelAngle: 50,
                barColors: 
                    function (row, series, type) {
                        var red = Math.ceil(255 * Math.abs(row.y) / this.ymax);
                        return 'rgb('+red+',0,0)';
                    }
              });
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
