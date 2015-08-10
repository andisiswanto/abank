<!-- USE THIS STYLE TO ACTIVATE DATEPICKER WITHIN MODAL --> 
<style> 
    .datepicker{z-index:9999 !important;}
</style>



<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="gridSystemModalLabel">Mutasi Baru</h4>
</div>

<form method="POST" action="<?php echo site_url();?>/administrator/c_mutasi/mutasiAddSave">
    <input type="hidden" id="pAmountHidden" name="pAmountHidden"/>
    <div class="modal-body">
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Tanggal</label>
                    <input class="form-control" type="text" id="pDate" name="pDate" required="" readonly="true"/>
                </div>
                <div class="form-group">
                    <label> Tipe Mutasi </label> 
                    <select class="form-control" id="pTipe" name="pTipe">
                        <option value="in">MASUK</option>
                        <option value="out">KELUAR</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input class="form-control" type="text" id="pAmount" name="pAmount" required="" onkeyup="convertToCommas(this.value,'pAmount','pAmountHidden');"/>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea rows="8" id="pDesc" name="pDesc" class="form-control" required=""></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="bsubmit" name="pSubmit" class="btn btn-primary">Simpan</button>
    </div>

</form>

<script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#example').dataTable(
//                        'pSort' => true;
                );
                $('#pDate').datepicker({
                    format: "yyyy-mm-dd"
                });
                $("#pDate").on('changeDate', function(ev){
                    $(this).datepicker('hide');
                });
            } );
            
            
            function convertToCommas(nStr, pField, pHidden){
                var num = $("#"+pField).val();
                var comma = /,/g;
                num = num.replace(comma,'');
                $("#"+pHidden).val(num);
                var isNumber = isNaN(num); //Cek apakah number atau text
                if(isNumber===false){ //jika number
                    var numCommas = addCommas(num);
                    $("#"+pField).val(numCommas);
                }
                else{
                    $("#"+pHidden).val("");
                    $("#"+pField).val("");
                }
            }
            function addCommas(nStr) {
                nStr += '';
                var comma = /,/g;
                nStr = nStr.replace(comma,'');
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                  x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2;
            }
        </script>

