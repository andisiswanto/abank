
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
                
                <div class="panel panel-warning ">
                    <div class="panel-heading">
                      <h3 class="panel-title">Report Asoka Bulanan</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <th>Kode</th>
                                    <th>Debitur</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Terbayar</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($tabel as $tbl){
                                        $kode=$tbl->id_utang;
                                        $date=$tbl->date;
                                        $jumlah=$tbl->amount;
                                        $debitur=$tbl->debitur;
                                        $description=$tbl->description;
                                        $payment_status=$tbl->payment_status;
                                        $payment_amount=$tbl->payment_amount;
                                        if($payment_status==0){
                                            $paymentStatusW="OTW";
                                        }
                                        else{
                                            $paymentStatusW="LUNAS";
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $kode;?></td>
                                            <td><?php echo $debitur;?></td>
                                            <td><?php echo tgl_indo($date);?></td>
                                            <td align="right"><?php echo rupiah($jumlah);?></td>
                                            <td align="right"><?php echo rupiah($payment_amount);?></td>
                                            <td><?php echo $paymentStatusW;?></td>
                                            <td><?php echo $description;?></td>
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
                $('#dataTables-example').dataTable({
                    "aaSorting": [] 
                    ,"pageLength": 100
                });
                $('.datepicker').datepicker({
                    format: "yyyy-mm-dd"
                });
            } );
        </script>
        <script>
            function cekDetail(kode){
                $.post("<?= site_url() ?>/administrator/c_asoka/mutasiDetail", {
                    kode : kode
                },
                function(data) {
                    $('#isiModal').html(data);
                    $('#detailModal').modal('show');
                }
                );
            }       
        </script>
    </body>
</html>
