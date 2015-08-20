
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
                
                <div class="panel panel-warning ">
                    <div class="panel-heading">
                      <h3 class="panel-title">Report Asoka Bulanan</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <th>Kode</th>
                                    <th>Tipe</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Dari / Ke</th>
                                    <th>Awal</th>
                                    <th>Akhir</th>
                                    <th>May</th>
                                    <th>Pepi</th>
                                    <th>Keterangan</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $may=0;
                                    $pepi=0;
                                    $akhir=0;
                                    $awal=0;
                                    foreach($tabel as $tbl){
                                        $kode=$tbl->id_asoka;
                                        $date=$tbl->date;
                                        $jumlah=$tbl->amount;
                                        $type=$tbl->type;
                                        $description=$tbl->description;
                                        $fromto=$tbl->fromto;
                                        
                                        if($type=="in"){
                                            $darike="ke";
                                            if($fromto=="pepi"){
                                                $pepi=$pepi+$jumlah;
                                            }
                                            else if($fromto=="may"){
                                                $may=$may+$jumlah;
                                            }
                                            $akhir=$akhir+$jumlah;
                                        }
                                        else{
                                            $darike="dari";
                                            if($fromto=="pepi"){
                                                $pepi=$pepi-$jumlah;
                                            }
                                            else if($fromto=="may"){
                                                $may=$may-$jumlah;
                                            }
                                            $akhir=$akhir-$jumlah;
                                        }
                                        
                                        
                                        $penandaMinusMay = substr($may,0,1);
                                        if($penandaMinusMay=="-"){
                                            $penandaMinusMay = "-";
                                        }
                                        else{
                                            $penandaMinusMay = "";
                                        }
                                        $penandaMinusPepi = substr($pepi,0,1);
                                        if($penandaMinusPepi=="-"){
                                            $penandaMinusPepi = "-";
                                        }
                                        else{
                                            $penandaMinusPepi = "";
                                        }
                                        $penandaMinusAkhir = substr($akhir,0,1);
                                        if($penandaMinusAkhir=="-"){
                                            $penandaMinusAkhir = "-";
                                        }
                                        else{
                                            $penandaMinusAkhir = "";
                                        }
                                        $penandaMinusAwal = substr($awal,0,1);
                                        if($penandaMinusAwal=="-"){
                                            $penandaMinusAwal = "-";
                                        }
                                        else{
                                            $penandaMinusAwal = "";
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $kode;?></td>
                                            <td><?php echo $type;?></td>
                                            <td><?php echo tgl_indo($date);?></td>
                                            <td align="right"><?php echo rupiah($jumlah);?></td>
                                            <td><?php echo $darike." ".$fromto;?></td>
                                            <td align="right"><?php echo $penandaMinusAwal ." ".ltrim(rupiah($awal),",");?></td>
                                            <td align="right"><?php echo $penandaMinusAkhir ." ".ltrim(rupiah($akhir),",");?></td>
                                            <td align="right"><?php echo $penandaMinusMay ." ".ltrim(rupiah($may),",");?></td>
                                            <td align="right"><?php echo $penandaMinusPepi ." ".ltrim(rupiah($pepi),",");?></td>
                                            <td><?php echo $description;?></td>
                                        </tr>  
                                        <?php
                                        $awal=$akhir;
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
