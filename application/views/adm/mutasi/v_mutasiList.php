
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
                <div class="panel panel-default">
                    <div class="panel-heading"><button class="btn btn-success" id="add" onclick="add()">ADD</button></div>
                </div>
                
                
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
                            <table class="table table-bordered table-hover" id="dataTables-example">
                            <!--<table id="example" class="display" cellspacing="0" width="100%">-->
                                <thead>
                                    <th>Kode</th>
                                    <th>Tipe</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                    <th>ACTION / Pengeluaran</th>
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
                                            <td><?php echo $type;?></td>
                                            <td><?php echo tgl_indo($date);?></td>
                                            <td align="right"><?php echo "Rp. ".rupiah($jumlah);?></td>
                                            <td><?php echo $description;?></td>
                                            <td width="15%">
                                                <button class="btn btn-warning" id="edit" onclick="edit('<?php echo $kode;?>')">EDIT</button>
                                                <button class="btn btn-info" id="detail" onclick="detailPengeluaran('<?php echo $kode;?>','<?php echo $jumlah;?>')">Detail</button>
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

                
                <br><br><br>
                
                
                    
            </div>
        </div>
            
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#dataTables-example').dataTable({
                    "aaSorting": [] 
                    ,"pageLength": 25
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
            function detailPengeluaran(kode,total){
                $.post("<?= site_url() ?>/administrator/c_mutasi/detailPengeluaran", {
                    kode : kode,
                    total : total
                }
                ,
                function(data) {
                    //$('#isiModal').html(data);
                    //$('#detailModal').modal('show');
                    $('#page').html(data);
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
            
            //**CHART**//
            new Morris.Bar({
                element: 'myfirstchart',
                data: [
                    <?php
                        foreach($tabel as $dt){
                            ?>
                            { deskripsi : "<?php echo rtrim(ltrim($dt->description," ")," ");?>", value : <?php echo $dt->amount;?> },
                            <?php
                        }
                    ?>
//                  { tahun: 'tes', value: -20 },
//                  { tahun: 'tos', value: 10 },
//                  { tahun: '2010', value: 5 },
//                  { tahun: '2011', value: 5 },
//                  { tahun: '2012', value: 20 }
                ],
                xkey: 'deskripsi',
                ykeys: ['value'],
                labels: ['Value'],
                xLabelAngle: 50,
                barColors: 
                        function (row, series, type) {
//                    console.log(row);
//                    if(row.y <= '2000'){
//                        return 'rgb(0,255,0)'; 
//                    }
//                    else{
//                        return 'rgb(255,0,0)';
//                    }
                    //if (type === 'bar') {
                        var red = Math.ceil(255 * row.y / this.ymax);
                        return 'rgb('+red+',0,0)';
                    //}
                    //else {
                    //    return '#000';
                   // }
                }
              });
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
