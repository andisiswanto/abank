<div class="container theme-showcase" role="main">
<br /><br /><br />

<form method="POST" action="<?php echo site_url();?>/administrator/c_profile/sejarahAddSave">
<div class="row">
    <div class="col-md-7">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Judul</h3>
            </div>
            <div class="panel-body">
                <input class="form-control" type="text" name="pJudul" required=""/>
            </div>
        </div>
    </div>
    <div class="col-md-5">
                <button class="btn btn-lg btn-danger pull-right" type="submit" name="pSubmit">SIMPAN</button>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <!--<div class="panel-heading">
                <h3 class="panel-title">PANEL</h3>
            </div>-->
            <div class="panel-body">
                <textarea class="form-control" id="editor1" name="pDeskripsi" required=""></textarea>
            </div>
        </div>
    </div>
</div>

</form>
</div>

<script type="text/javascript">
		
 //CKFINDER
// This is a check for the CKEditor class. If not defined, the paths must be checked.
if ( typeof CKEDITOR == 'undefined' )
{
	document.write(
		'<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
		'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
		'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
		'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
		'value (line 32).' ) ;
}
else
{
	var editor = CKEDITOR.replace( 'editor1' );
	//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );

	// Just call CKFinder.setupCKEditor and pass the CKEditor instance as the first argument.
	// The second parameter (optional), is the path for the CKFinder installation (default = "/ckfinder/").
	//CKFinder.setupCKEditor( editor, '../library/ckfinder24/' ) ;
    CKFinder.setupCKEditor( editor, '<?php echo base_url(); ?>ckfinder24/' ) ;

	// It is also possible to pass an object with selected CKFinder properties as a second argument.
	// CKFinder.setupCKEditor( editor, { basePath : '../', skin : 'v1' } ) ;
}
</script>